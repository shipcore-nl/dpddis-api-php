<?php
namespace ShipCore\DPDDis\Exception;

class ApiException extends \Exception
{
    /**
     * @var SoapClient
     */
    private $client;
    
    public function __construct($message, \SoapClient $client, \Throwable $previous = null)
    {
        echo $client->__getLastResponseHeaders();
        echo $client->__getLastResponse();
        
        $this->client = $client;
        parent::__construct($message, 0, $previous);
    }
    
    public function getSoapClient()
    {
        return $this->client;
    }
}
