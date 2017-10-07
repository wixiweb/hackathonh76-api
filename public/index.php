<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

use Zend\Expressive\AppFactory;
use Zend\Expressive\Router\RouterInterface;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$container = require 'config/container.php';
$app = AppFactory::create(
    $container,
    $container->get(RouterInterface::class)
);

require 'config/pipeline.php';
require 'config/routes.php';

$app->run();