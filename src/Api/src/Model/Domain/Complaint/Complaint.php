<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Domain\Complaint;

class Complaint
{
    public $id;
    public $tenantId;
    public $categoryId;
    public $typeId;
    public $zoneId;
    public $description;
}
