<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Action\Category;

use Api\Model\Infrastructure\Gateway\CategoryGateway;
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
        $type = filter_input(INPUT_GET, 'type', FILTER_VALIDATE_INT);
        if ( ! $type) {
            return new JsonResponse([], 400);
        }
        
        $gateway = $this->container->get(CategoryGateway::class);
        $predicates = new PredicateSet();
        $predicates->addPredicate(
            new Operator('type', Operator::OPERATOR_EQUAL_TO, $type)
        );
        $categories = $gateway->select($predicates);
        
        return new JsonResponse($categories, 200);
    }
}
