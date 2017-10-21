<?php
namespace ShipCore\DPDDis\Entity;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Token extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $authToken;
    
    /**
     * @Accessible()
     * @var integer
     */
    protected $authTokenExpiration;
}
