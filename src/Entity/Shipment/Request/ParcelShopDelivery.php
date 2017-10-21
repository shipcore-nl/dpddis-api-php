<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class ParcelShopDelivery extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $parcelShopId;
}
