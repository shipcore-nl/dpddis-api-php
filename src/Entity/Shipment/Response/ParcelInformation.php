<?php
namespace ShipCore\DPDDis\Entity\Shipment\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class ParcelInformation extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $parcelLabelNumber;
}
