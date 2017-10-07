<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

return [
    'config_cache_enabled' => true,
    'debug' => false,
    'zend-expressive' => [
        'programmatic_pipeline' => true,
        'error_handler' => [
            'template_404' => 'error::404',
            'template_error' => 'error::error',
        ],
    ],
];