<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

use Xtreamwayz\Pimple\Container;

// Instanciate container
$container = new Container();

// Inject config
$config = require __DIR__ . '/config.php';
$container['config'] = $config;

if (! isset($config['dependencies'])) {
    return $container;
}

// Inject services
if (! isset($config['dependencies']['services'])
    || ! is_array($config['dependencies']['services'])
) {
    $config['dependencies']['services'] = [];
}
foreach ($config['dependencies']['services'] as $name => $service) {
    $container[$name] = function ($c) use ($service) {
        return $service;
    };
}

// Inject factories
if (! isset($config['dependencies']['factories'])
    || ! is_array($config['dependencies']['factories'])
) {
    $config['dependencies']['factories'] = [];
}
foreach ($config['dependencies']['factories'] as $name => $object) {
    $container[$name] = function ($c) use ($object, $name) {
        if ($c->has($object)) {
            $factory = $c->get($object);
        } else {
            $factory = new $object();
            $c[$object] = $c->protect($factory);
        }

        return $factory($c, $name);
    };
}

// Inject invokables
if (! isset($config['dependencies']['invokables'])
    || ! is_array($config['dependencies']['invokables'])
) {
    $config['dependencies']['invokables'] = [];
}
foreach ($config['dependencies']['invokables'] as $name => $object) {
    $container[$name] = function ($c) use ($object) {
        return new $object();
    };
}

// Inject aliases
if (! isset($config['dependencies']['aliases'])
    || ! is_array($config['dependencies']['aliases'])
) {
    $config['dependencies']['aliases'] = [];
}
foreach ($config['dependencies']['aliases'] as $alias => $target) {
    $container[$alias] = function ($c) use ($target) {
        return $c->get($target);
    };
}

// Inject "pimple extend-style" factories
if (! isset($config['dependencies']['extensions'])
    || ! is_array($config['dependencies']['extensions'])
) {
    $config['dependencies']['extensions'] = [];
}
foreach ($config['dependencies']['extensions'] as $name => $extensions) {
    foreach ($extensions as $extension) {
        $container->extend($name, function ($service, $c) use ($extension, $name) {
            $factory = new $extension();
            return $factory($service, $c, $name); // passing extra parameter $name
        });
    }
}

// Inject "zend-servicemanager3 style" delegators as Pimple anonymous "extend" functions
if (! isset($config['dependencies']['delegators'])
    || ! is_array($config['dependencies']['delegators'])
) {
    $config['dependencies']['delegators'] = [];
}
foreach ($config['dependencies']['delegators'] as $name => $delegators) {
    foreach ($delegators as $delegator) {
        $container->extend($name, function ($service, $c) use ($delegator, $name) {
            $factory  = new $delegator();
            $callback = function () use ($service) {
                return $service;
            };

            return $factory($c, $name, $callback);
        });
    }
}

return $container;
