<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Domain\Zone;

class ZoneType
{
    const BUILDING_ID = 1;
    const COMMON_PART_ID = 2;
    const HOUSING_ID = 3;
    const ROOM_ID = 4;
    
    /** @var int */
    public $id;
    /** @var string */
    public $label;
   
   /**
    * @param $id
    * @return ZoneType
    * @throws \UnexpectedValueException
    */
   public static function fromId($id)
   {
        switch ($id) {
           case self::BUILDING_ID :
               return new self(self::BUILDING_ID, 'building');
           case self::COMMON_PART_ID :
               return new self(self::COMMON_PART_ID, 'common part');
           case self::HOUSING_ID :
               return new self(self::HOUSING_ID, 'housing');
           case self::ROOM_ID :
               return new self(self::ROOM_ID, 'room');
        }
       
        throw new \UnexpectedValueException(sprintf(
            'Unknown zone type id: %d',
            $id
        ));
   }
   
   /**
    * @param int $id
    * @param string $label
    */
   private function __construct($id, $label)
   {
       $this->id = $id;
       $this->label = $label;
   }

}
