<?php
namespace ShipCore\DPDDis\Entity\Tracking\Response;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;

class Description extends DataObject
{
    /**
     * @Accessible()
     * @var Phrase
     */
    protected $label;

    /**
     * @Accessible()
     * @var Phrase
     */
    protected $content;
    
    /**
     * @Accessible()
     * @var string
     */
    protected $linkTarget;
}
