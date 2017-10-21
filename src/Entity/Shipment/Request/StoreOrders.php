<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class StoreOrders extends DataObject
{
    /**
     * @Accessible()
     * @var PrintOption
     */
    protected $printOptions;
    
    /**
     * @Accessible()
     * @var Order
     */
    protected $order;
}
