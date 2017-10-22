<?php
namespace ShipCore\DPDDis\Entity\Tracking\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Phrase extends DataObject
{
    /**
     * @Accessible()
     * @var string
     */
    protected $content;

    /**
     * @Accessible()
     * @var boolean
     */
    protected $bold;
    
    /**
     * @Accessible()
     * @var boolean
     */
    protected $paragraph;
}
