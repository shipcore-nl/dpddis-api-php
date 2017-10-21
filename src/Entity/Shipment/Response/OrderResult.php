<?php
namespace ShipCore\DPDDis\Entity\Shipment\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class OrderResult extends DataObject
{
    /**
     * @Accessible()
     */
    protected $parcellabelsPDF;
    
    /**
     * @Accessible()
     * @var ShipmentResponse
     */
    protected $shipmentResponses;
}
