<?php
namespace ShipCore\DPDDis;

use ShipCore\DPDDis\Entity\Token;
use ShipCore\DPDDis\Entity\Shipment\Request\StoreOrders;
use ShipCore\DPDDis\Entity\Shipment\Response\OrderResult;
use ShipCore\DPDDis\Exception\ApiException;

class Api
{
    const BASE_URL = 'https://public-dis.dpd.nl/';
    const BASE_URL_STAGING = 'https://public-dis-stage.dpd.nl/';
    
    const LOGIN_SERVICE = 'Services/LoginService.svc?singlewsdl';
    const SHIPMENT_SERVICE = 'Services/ShipmentService.svc?singlewsdl';
    const DEPOTDATA_SERVICE = 'Services/DepotDataService.svc?singlewsdl';
    const PARCELSHOP_FINDER_SERVICE = 'Services/ParcelShopFinderService.svc?singlewsdl';
    const PARCELSHOP_LIFECYCLE_SERVICE = 'Services/ParcelLifeCycleService.svc?singlewsdl';
    
    const SOAPHEADER_NS = 'http://dpd.com/common/service/types/Authentication/2.0';
    
    const TOKEN_EXPIRATION = 24*60*60; // 24h
    
    /**
     * @var string
     */
    protected $delisId;
    
    /**
     * @var string
     */
    protected $password;
    
    /**
     * @var string
     */
    protected $messageLanguage;
    
    /**
     * @var Token
     */
    protected $token;
    
    /**
     * @var boolean
     */
    protected $staging;
    
    /**
     * @var boolean
     */
    protected $isTokenChanged = false;
    
    /**
     * @var string
     */
    protected $customerUid;
    
    /**
     * @var string
     */
    protected $depot;
    
    public function __construct(
        $delisId,
        $password,
        $messageLanguage = 'en_EN',
        Token $token = null,
        $staging = false
    ) {
        $this->delisId = $delisId;
        $this->password = $password;
        $this->messageLanguage = $messageLanguage;
        $this->token = $token;
        $this->staging = $staging;
        
        $this->authenticate();
    }
    
    protected function isTokenValid()
    {
        return $this->token && ($this->token->getAuthTokenExpiration() - 30 > time());
    }
    
    protected function getSoapUrl($path)
    {
        return ($this->staging ? self::BASE_URL_STAGING : self::BASE_URL) . $path;
    }
    
    protected function getSoapService($path, $setAuthHeader = true)
    {
        $client = new \SoapClient($this->getSoapUrl($path), [
            'cache_wsdl' => WSDL_CACHE_NONE,
            'trace' => 1
        ]);
        
        if ($setAuthHeader) {
            $this->authenticate(); // refresh token if expired
            $header = new \SoapHeader(self::SOAPHEADER_NS, 'authentication', [
                'delisId' => $this->delisId,
                'authToken' => $this->token->getAuthToken(),
                'messageLanguage' => $this->messageLanguage
            ]);
            $client->__setSoapHeaders($header);
        }
        
        return $client;
    }

    protected function getLoginService()
    {
        return $this->getSoapService(self::LOGIN_SERVICE, false);
    }
    
    protected function getParcelShopFinderService()
    {
        return $this->getSoapService(self::PARCELSHOP_FINDER_SERVICE);
    }
    
    protected function getShipmentService()
    {
        return $this->getSoapService(self::SHIPMENT_SERVICE);
    }
    
    protected function getDepotDataService()
    {
        return $this->getSoapService(self::DEPOTDATA_SERVICE);
    }
        
    protected function getParcelLifeCycleService()
    {
        return $this->getSoapService(self::PARCELSHOP_LIFECYCLE_SERVICE);
    }
    
    protected function authenticate()
    {
        if (!$this->isTokenValid()) {
            try {
                $client = $this->getLoginService();
            
                $response = $client->getAuth([
                'delisId' => $this->delisId,
                'password' => $this->password,
                'messageLanguage' => $this->messageLanguage
            ]);
        
                $this->customerUid = $response->return->customerUid;
                $this->depot = $response->return->depot;
                $this->token = Token::fromDataArray([
                'authToken' => $response->return->authToken,
                'authTokenExpiration' => time() + self::TOKEN_EXPIRATION
            ]);
            
                $this->isTokenChanged = true;
            } catch (\SoapFault $e) {
                throw new ApiException('getAuth failed', $client, $e);
            }
        }
    }
    
    /**
     *
     * @return Token|null
     */
    public function getNewToken()
    {
        return $this->isTokenChanged ? $this->token : null;
    }
    
    public function findParcelShopsByGeoData($geoData)
    {
        throw new \Exception('Not implemented');
    }
    
    /**
     *
     * @param StoreOrders $storeOrders
     * @return OrderResult
     */
    public function storeOrders(StoreOrders $storeOrders)
    {
        try {
            $client = $this->getShipmentService();
            $response = $client->storeOrders($storeOrders->toDataArray());
        
            if (isset($response->orderResult->shipmentResponses->faults)) {
                throw new ApiException($response->orderResult->shipmentResponses->faults->message, $client);
            }
            
            return OrderResult::fromStdClass($response->orderResult);
        } catch (\SoapFault $e) {
            throw new ApiException('storeOrders failed', $client, $e);
        }
    }
    
    public function getDepotData($depot, $country, $zipCode)
    {
        throw new \Exception('Not implemented');
    }
            
    public function getTrackingData($parcelLabelNumber)
    {
        throw new \Exception('Not implemented');
    }
}
