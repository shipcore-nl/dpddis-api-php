<?php
namespace ShipCore\DPDDis\Entity\Depot\Request;

use ShipCore\DataObject\DataObject;
use ShipCore\DataObject\Annotation\Accessible;
use ShipCore\DataObject\Annotation\Required;

class DepotQuery extends DataObject
{
    /**
     * @Accessible()
     * @Required()
     * @var string
     */
    protected $depot;

    /**
     * @Accessible()
     * @var string
     */
    protected $zipCode;
    
    /**
     * @Accessible()
     * @Required()
     * @var string
     */
    protected $country;
}
