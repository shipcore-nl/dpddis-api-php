<?php
namespace ShipCore\DPDDis\Entity\ParcelShop\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;
use ShipCore\DataObject\Annotation\Required;

class GeoData extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $availabilityDate;

    /**
     * @Accessible()
     * @var boolean
     */
    protected $consigneePickupAllowed;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $countryISO;
    
    /**
     * @Accessible()
     * @var float
     */
    protected $latitude;

    /**
     * @Accessible()
     * @var float
     */
    protected $longitude;
    

    /**
     * @Accessible()
     * @var boolean
     */
    protected $prepaidAllowed;

    /**
     * @Accessible()
     * @var boolean
     */
    protected $returnAllowed;
    
    /**
     * @Accessible()
     * @var integer
     */
    protected $limit;
}
