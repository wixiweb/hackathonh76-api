<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Domain\Complaint;

class CategoryType
{
    const INDIVIDUAL_ID = 1;
    const COMMON_PART_ID = 2;
    
    /** @var int */
    public $id;
    /** @var string */
    public $label;
   
   /**
    * @param $id
    * @return CategoryType
    * @throws \UnexpectedValueException
    */
   public static function fromId($id)
   {
        switch ($id) {
           case self::INDIVIDUAL_ID :
               return new self(self::INDIVIDUAL_ID, 'individuelle');
           case self::COMMON_PART_ID :
               return new self(self::COMMON_PART_ID, 'partie commune');
        }
       
        throw new \UnexpectedValueException(sprintf(
            'Unknown category type id: %d',
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
