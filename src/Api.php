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
    
    const SOAPHEADER_NS = 'http://dpd.com/common/service/types/Authentication/2.0';
    
    const TOKEN_EXPIRATION = 24*60*60 - 60; // 24h - 1min offset
    
    protected $delisId;
    protected $password;
    protected $messageLanguage;
    protected $token;
    protected $staging;
    
    protected $isTokenChanged = false;
    
    protected $customerUid;
    protected $depot;
    
    public function __construct(
        $delisId,
        $password,
        $messageLanguage = 'en_EN',
        $token = null,
        $staging = false
    ) {
        $this->delisId = $delisId;
        $this->password = $password;
        $this->messageLanguage = $messageLanguage;
        $this->token = $token;
        $this->staging = $staging;
        
        $this->authenticate();
        
        echo "Authenticated\n";
        echo "customerUid {$this->customerUid}\n";
        echo "depot {$this->depot}\n";
        echo "authToken {$this->token->getAuthToken()}\n";
        echo "authTokenExpiration {$this->token->getAuthTokenExpiration()}\n";
    }
    
    protected function getUrl($path)
    {
        return ($this->staging ? self::BASE_URL_STAGING : self::BASE_URL) . $path;
    }
    
    protected function getSoapService($path, $setAuthHeader = true)
    {
        echo $this->getUrl($path) . "\n";
        $client = new \SoapClient($this->getUrl($path), [
            'cache_wsdl' => WSDL_CACHE_NONE,
            'trace' => 1
        ]);
        
        if ($setAuthHeader) {
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
    
    protected function getShipmentService()
    {
        return $this->getSoapService(self::SHIPMENT_SERVICE);
    }
    
    protected function authenticate()
    {
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
        } catch (\SoapFault $e) {
            if (isset($client)) {
                $this->logLastRequest($client);
            }

            throw $e;
        }
    }
    
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
            if (isset($client)) {
                $this->logLastRequest($client);
            }

            throw $e;
        }
    }
    
    protected function logLastRequest(\SoapClient $client)
    {
        echo $client->__getLastRequestHeaders();
        echo $client->__getLastRequest();
        
        echo $client->__getLastResponseHeaders();
        echo $client->__getLastResponse();
    }
}
