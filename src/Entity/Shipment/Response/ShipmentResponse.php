<?php
namespace ShipCore\DPDDis\Entity\Shipment\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class ShipmentResponse extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $mpsId;
    
    /**
     * @Accessible()
     * @var ParcelInformation
     */
    protected $parcelInformation;
}
