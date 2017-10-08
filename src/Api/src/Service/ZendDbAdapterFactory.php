<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Service;

use Interop\Container\ContainerInterface;

class ZendDbAdapterFactory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        return new \Zend\Db\Adapter\Adapter(
            $container->get('config')['db']
        );
    }
}