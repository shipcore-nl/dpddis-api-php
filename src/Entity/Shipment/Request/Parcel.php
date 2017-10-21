<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Parcel extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $customerReferenceNumber1;

    /**
     * @Accessible()
     * @var string
     */
    protected $customerReferenceNumber2;

    /**
     * @Accessible()
     * @var string
     */
    protected $customerReferenceNumber3;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $customerReferenceNumber4;
    
    /**
     * @Accessible()
     * @var int
     */
    protected $volume;

    /**
     * @Accessible()
     * @var int
     */
    protected $weight;

    /**
     * @Accessible()
     * @var boolean
     */
    protected $returns = false;
}
