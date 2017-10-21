<?php
namespace ShipCore\DPDDis\Entity\Shipment\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Predict extends DataObject
{
    const CHANNEL_EMAIL = 1;
    const CHANNEL_SMS = 3;
    /**
     * @Accessible()
     * @var int
     */
    protected $channel;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $value;

    /**
     * @Accessible()
     * @var string
     */
    protected $language = 'EN';
}
