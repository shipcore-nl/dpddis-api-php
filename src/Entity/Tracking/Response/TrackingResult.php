<?php
namespace ShipCore\DPDDis\Entity\Tracking\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class TrackingResult extends DataObject
{
    /**
     * @Accessible()
     * @var ShipmentInfo
     */
    protected $shipmentInfo;

    /**
     * @Accessible()
     * @var ShipmentInfo[]
     */
    protected $statusInfo;
    
    /**
     * @Accessible()
     * @var Description[]
     */
    protected $contactInfo;
}
