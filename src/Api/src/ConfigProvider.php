<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api;

class ConfigProvider
{
    /**
     * Return module configuration
     * 
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'invokables' => [
                    \Zend\Expressive\Helper\ServerUrlHelper::class => \Zend\Expressive\Helper\ServerUrlHelper::class,
                ],
                'factories' => [
                    'db' => Service\ZendDbAdapterFactory::class,
                    Action\Category\FetchAllAction::class => Service\ContainerAwareActionFactory::class,
                    Action\Zone\FetchAllAction::class => Service\ContainerAwareActionFactory::class,
                    Action\IndexAction::class => Service\ContainerAwareActionFactory::class,
                    Model\Infrastructure\Gateway\CategoryGateway::class => Service\GatewayFactory::class,
                    Model\Infrastructure\Gateway\ZoneGateway::class => Service\GatewayFactory::class,
                    \Zend\Expressive\Helper\ServerUrlMiddleware::class => \Zend\Expressive\Helper\ServerUrlMiddlewareFactory::class,
                    \Zend\Expressive\Router\RouterInterface::class => \Zend\Expressive\Router\FastRouteRouterFactory::class,
                ],
            ],
        ];
    }
}
