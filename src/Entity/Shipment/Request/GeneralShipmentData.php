<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class GeneralShipmentData extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $mpsId;

    /**
     * @Accessible()
     * @var string
     */
    protected $cUser;

    /**
     * @Accessible()
     * @var string
     */
    protected $mpsCustomerReferenceNumber1;

    /**
     * @Accessible()
     * @var string
     */
    protected $mpsCustomerReferenceNumber2;

    /**
     * @Accessible()
     * @var string
     */
    protected $mpsCustomerReferenceNumber3;

    /**
     * @Accessible()
     * @var string
     */
    protected $mpsCustomerReferenceNumber4;

    /**
     * @Accessible()
     * @var string
     */
    protected $identificationNumber;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $sendingDepot;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $product;

    /**
     * @Accessible()
     * @var Address
     */
    protected $sender;

    /**
     * @Accessible()
     * @var Address
     */
    protected $recipient;
}
