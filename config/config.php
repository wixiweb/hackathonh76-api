<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

$configCachePath = 'cache/config-cache.php';

if (is_file($configCachePath)) {
    return require $configCachePath;
}

$configProviders = [
    ['type' => 'callable', 'target' => function() { return ['version' => file_get_contents('VERSION')]; }],
    ['type' => 'callable', 'target' => Api\ConfigProvider::class],
    ['type' => 'file', 'target' => 'config/global.php'],
    ['type' => 'file', 'target' => 'config/local.php'],
];
$mergedConfig = array_reduce(
    $configProviders,
    function($carry, $item) {
        switch ($item['type']) {
            case 'file' :
                $partialConfig = require $item['target'];
            break;
            case 'callable' :
                if (is_string($item['target'])) {
                    $callable = new $item['target'];
                }
                else {
                    $callable = $item['target'];
                }
                $partialConfig = $callable();
            break;
            default :
                $partialConfig = [];
        }
        
        return \Zend\Stdlib\ArrayUtils::merge(
            $carry,
            $partialConfig
        );
    },
    []    
);
    
if ($mergedConfig['config_cache_enabled']) {
    file_put_contents(
        $configCachePath,
        sprintf(
            "<?php\n// Generated at %s\n\nreturn %s;",
            date('c'),
            var_export($mergedConfig, true)
        )
    );
}

return $mergedConfig;
