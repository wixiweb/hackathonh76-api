<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Action\Zone;

use Api\Model\Infrastructure\Gateway\ZoneGateway;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Db\Sql\Predicate\Operator;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Diactoros\Response\JsonResponse;

class FetchAllAction implements MiddlewareInterface
{
    /** @var ContainerInterface */
    private $container;
    
    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */ 
    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ): ResponseInterface {
        $tenant = filter_input(INPUT_GET, 'tenant', FILTER_VALIDATE_INT);
        if ( ! $tenant) {
            return new JsonResponse([], 400);
        }
        
        $gateway = $this->container->get(ZoneGateway::class);
        $predicates = new PredicateSet();
        $predicates->addPredicate(
            new Operator('tenantId', Operator::OPERATOR_EQUAL_TO, $tenant)
        );
        $zones = $gateway->select($predicates);
        
        return new JsonResponse($zones, 200);
    }
}
