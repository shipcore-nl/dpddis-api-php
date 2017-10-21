<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Order extends DataObject
{
    /**
     * @Accessible()
     * @var GeneralShipmentData
     */
    protected $generalShipmentData;
    
    /**
     * @Accessible()
     * @var Parcel
     */
    protected $parcels;

    /**
     * @Accessible()
     * @var ProductAndServiceData
     */
    protected $productAndServiceData;
}
