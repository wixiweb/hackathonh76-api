<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

namespace Api\Service;

use Interop\Container\ContainerInterface;

class ContainerAwareActionFactory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        return new $requestedName($container);
    }
}
