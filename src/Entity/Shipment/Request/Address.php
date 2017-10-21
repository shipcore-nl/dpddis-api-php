<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Address extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $name1;

    /**
     * @Accessible()
     * @var string
     */
    protected $name2;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $street;

    /**
     * @Accessible()
     * @var string
     */
    protected $houseNo;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $state;

    /**
     * @Accessible()
     * @var string
     */
    protected $country;

    /**
     * @Accessible()
     * @var string
     */
    protected $zipCode;

    /**
     * @Accessible()
     * @var string
     */
    protected $city;

    /**
     * @Accessible()
     * @var long
     */
    protected $gln;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $customerNumber;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $contact;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $phone;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $fax;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $email;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $comment;
}
