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
                    Action\IndexAction::class => Service\ContainerAwareActionFactory::class,
                    \Zend\Expressive\Helper\ServerUrlMiddleware::class => \Zend\Expressive\Helper\ServerUrlMiddlewareFactory::class,
                    \Zend\Expressive\Router\RouterInterface::class => \Zend\Expressive\Router\FastRouteRouterFactory::class,
                ],
            ],
        ];
    }
}
