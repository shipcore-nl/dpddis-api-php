<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class ProductAndServiceData extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $orderType = 'consignment';
    
    /**
     * @Accessible()
     * @var boolean
     */
    protected $saturdayDelivery;

    /**
     * @Accessible()
     * @var boolean
     */
    protected $tyres;
    
    /**
     * @Accessible()
     * @var ParcelShopDelivery
     */
    protected $parcelShopDelivery;

    /**
     * @Accessible()
     * @var Predict
     */
    protected $predict;
}
