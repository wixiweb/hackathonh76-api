<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Domain\Zone;

class Zone
{
   public $id;
   public $name;
   public $description;
   public $parentId;
   public $chidren;
   public $zoneTypeId;
   public $tenantId;
   public $attributes;
   
   static public function building($id, $children)
   {
       $instance = new self();
       $instance->id = $id;
       $instance->zoneTypeId = ZoneType::BUILDING_ID;
       $instance->chidren = $children;
       return $instance;
   }
   
   static public function housing($id, $children, $parent)
   {
       $instance = new self();
       $instance->id = $id;
       $instance->zoneTypeId = ZoneType::HOUSING_ID;
       $instance->chidren = $children;
       $instance->parent = $parent;
       return $instance;
   }
   
   static public function room($id, $parent)
   {
       $instance = new self();
       $instance->id = $id;
       $instance->zoneTypeId = ZoneType::ROOM_ID;
       $instance->parentId = $parent;
       return $instance;
   }
   
   static public function commonPart($id, $parent)
   {
       $instance = new self();
       $instance->id = $id;
       $instance->zoneTypeId = ZoneType::COMMON_PART_ID;
       $instance->parentId = $parent;
       return $instance;
   }
   
   public function __construct()
   {
       $this->parentId = 0;
       $this->tenantId = 0;
       $this->chidren = [];
       $this->attributes = [];
   }
}
