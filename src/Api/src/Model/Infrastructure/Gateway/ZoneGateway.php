<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Model\Infrastructure\Gateway;

use Api\Hydrator\Strategy\IntegerStrategy;
use Api\Model\Domain\Zone\Zone;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\NamingStrategy\MapNamingStrategy;
use Zend\Hydrator\ObjectProperty;

class ZoneGateway extends Gateway
{
    /**
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->innerGateway = new TableGateway('Zone', $adapter);
        $this->objectPrototype = new Zone();
        
        $this->hydrator = new ObjectProperty();
        $this->hydrator->setNamingStrategy(new MapNamingStrategy([
            'idZone' => 'id',
            'name' => 'name',
            'description' => 'description',
            'idZoneParent' => 'parentId',
            'type' => 'zoneTypeId',
            'idUser' => 'tenantId',
        ]));
        $integerStrategy = new IntegerStrategy();
        $this->hydrator->addStrategy('idZone', $integerStrategy);
        $this->hydrator->addStrategy('id', $integerStrategy);
        $this->hydrator->addStrategy('idZoneParent', $integerStrategy);
        $this->hydrator->addStrategy('parentId', $integerStrategy);
        $this->hydrator->addStrategy('type', $integerStrategy);
        $this->hydrator->addStrategy('zoneTypeId', $integerStrategy);
        $this->hydrator->addStrategy('idUser', $integerStrategy);
        $this->hydrator->addStrategy('tenantId', $integerStrategy);
    }

    public function insert($set)
    {
        if ($set instanceof Zone) {
            throw InvalidArgumentException::expected(Zone::class, $set);
        }
        $data = $this->hydrator->extract($set);
        unset($data['idZone']);
        return $this->innerGateway->insert($data);
    }

    public function update($set, $where = null)
    {
        if ($set instanceof Zone) {
            throw InvalidArgumentException::expected(Zone::class, $set);
        }
        
        if ($where === null) {
            $where = new PredicateSet();
        }
        
        if ($where instanceof PredicateSet) {
            throw InvalidArgumentException::expected(PredicateSet::class, $where);
        }
        
        $this->mapPredicates($where);
        $data = $this->hydrator->extract($set);
        unset($data['idZone']);
        return $this->innerGateway->update($data);
    }
}
