<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Infrastructure\Gateway;

use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\AbstractHydrator;

abstract class Gateway implements TableGatewayInterface
{
    /** @var TableGateway */
    protected $innerGateway;
    /** @var AbstractHydrator */
    protected $hydrator;
    /** @var object */
    protected $objectPrototype;
    
    public function getTable()
    {
        return $this->innerGateway->getTable();
    }
    
    public function select($where = null)
    {
        if ($where !== null) {
            if (! $where instanceof PredicateSet) {
                throw InvalidArgumentException::expected(PredicateSet::class, $where);
            }
            $this->mapPredicates($where);
        }
        
        $resultSet = $this->innerGateway->select($where);

        $objects = [];
        foreach ($resultSet as $result) {
            $object = clone $this->objectPrototype;
            $this->hydrator->hydrate((array)$result, $object);
            $objects[] = $object;
        }
        
        return $objects;
    }
    
    public function delete($where)
    {
        if ($where instanceof PredicateSet) {
            throw InvalidArgumentException::expected(PredicateSet::class, $where);
        }
        
        $this->mapPredicates($where);
        
        $this->innerGateway->delete($where);
    }
    
    protected function mapPredicates($predicateSet)
    {
        foreach ($predicateSet->getPredicates() as $predicate) {
            if (method_exists($predicate, 'getIdentifier')) {
                $predicate->setIdentifier($this->hydrator->extractName($predicate->getIdentifier()));
            }
            elseif (method_exists($predicate, 'getLeft')) {
                $predicate->setLeft($this->hydrator->extractName($predicate->getLeft()));
            }
        }
    }
}
