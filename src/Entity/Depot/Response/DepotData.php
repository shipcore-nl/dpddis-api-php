<?php
namespace ShipCore\DPDDis\Entity\Depot\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class DepotData extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $depot;

    /**
     * @Accessible()
     * @var string
     */
    protected $name;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $street;
             
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
    protected $country;
    
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
}
