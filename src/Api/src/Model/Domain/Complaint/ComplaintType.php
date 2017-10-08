<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Domain\Complaint;

class ComplaintType
{
    /** @var int */
    public $id;
    /** @var string */
    public $label;
   
   /**
    * @param int $id
    * @param string $label
    */
   public function __construct($id, $label)
   {
       $this->id = $id;
       $this->label = $label;
   }
}
