<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Domain\Zone;

class ZoneAttribute
{
    const SURFACE_AREA_ID = 1;
    const FLOOR_ID = 2;
    const HOUSING_NATURE_ID = 3;
    
    public $id;
    public $name;
    public $value;
}
