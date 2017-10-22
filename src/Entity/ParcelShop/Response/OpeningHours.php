<?php
namespace ShipCore\DPDDis\Entity\ParcelShop\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class OpeningHours extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $weekday;

    /**
     * @Accessible()
     * @var string
     */
    protected $openMorning;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $closeMorning;

    /**
     * @Accessible()
     * @var string
     */
    protected $openAfternoon;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $closeAfternoon;
}
