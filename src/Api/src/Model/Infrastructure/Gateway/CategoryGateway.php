<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Infrastructure\Gateway;

use Api\Hydrator\Strategy\IntegerStrategy;
use Api\Model\Domain\Complaint\Category;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\NamingStrategy\MapNamingStrategy;
use Zend\Hydrator\ObjectProperty;

class CategoryGateway extends Gateway
{
    /**
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->innerGateway = new TableGateway('Category', $adapter);
        $this->objectPrototype = new Category();
        
        $this->hydrator = new ObjectProperty();
        $this->hydrator->setNamingStrategy(new MapNamingStrategy([
            'idCategory' => 'id',
            'name' => 'name',
            'idParentCategory' => 'parentId',
            'type' => 'categoryTypeId',
        ]));
        $integerStrategy = new IntegerStrategy();
        $this->hydrator->addStrategy('idCategory', $integerStrategy);
        $this->hydrator->addStrategy('id', $integerStrategy);
        $this->hydrator->addStrategy('idParentCategory', $integerStrategy);
        $this->hydrator->addStrategy('parentId', $integerStrategy);
        $this->hydrator->addStrategy('type', $integerStrategy);
        $this->hydrator->addStrategy('categoryTypeId', $integerStrategy);
    }

    public function insert($set)
    {
        if ($set instanceof Category) {
            throw InvalidArgumentException::expected(Category::class, $set);
        }
        $data = $this->hydrator->extract($set);
        unset($data['idCategory']);
        return $this->innerGateway->insert($data);
    }

    public function update($set, $where = null)
    {
        if ($set instanceof Category) {
            throw InvalidArgumentException::expected(Category::class, $set);
        }
        
        if ($where !== null) {
            if (! $where instanceof PredicateSet) {
                throw InvalidArgumentException::expected(PredicateSet::class, $where);
            }
            $this->mapPredicates($where);
        }
        
        $data = $this->hydrator->extract($set);
        unset($data['idCategory']);
        return $this->innerGateway->update($data, $where);
    }
}
