<?php
namespace ShipCore\DPDDis\Entity\ParcelShop\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class ParcelShop extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $parcelShopId;

    /**
     * @Accessible()
     * @var string
     */
    protected $company;
    
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
     * @var integer
     */
    protected $countryN;
    /**
     * @Accessible()
     * @var string
     */
    protected $isoAlpha2;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $isoAlpha3;
    
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
    protected $homepage;
    
    /**
     * @Accessible()
     * @var \ShipCore\DPDDis\Entity\ParcelShop\Response\OpeningHours[]
     */
    protected $openingHours;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $extraInfo;
                
    /**
     * @Accessible()
     * @var boolean
     */
    protected $pickupByConsigneeAllowed;
    
    /**
     * @Accessible()
     * @var boolean
     */
    protected $returnAllowed;
    
    /**
     * @Accessible()
     * @var boolean
     */
    protected $expressAllowed;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $expressPickupTime;
    
    /**
     * @Accessible()
     * @var boolean
     */
    protected $prepaidAllowed;
    
    /**
     * @Accessible()
     * @var boolean
     */
    protected $cashOnDeliveryAllowed;
    
    /**
     * @Accessible()
     * @var integer
     */
    protected $cashOnDeliveryPayment;
    
    /**
     * @Accessible()
     * @var float
     */
    protected $distance;
    
    /**
     * @Accessible()
     * @var float
     */
    protected $longitude;
    
    /**
     * @Accessible()
     * @var float
     */
    protected $latitude;
    
    /**
     * @Accessible()
     * @var float
     */
    protected $coordinateX;
    
    /**
     * @Accessible()
     * @var float
     */
    protected $coordinateY;

    /**
     * @Accessible()
     * @var float
     */
    protected $coordinateZ;
}
