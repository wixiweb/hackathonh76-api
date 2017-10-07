<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

// Pipe middleware that execute on every request
$app->pipe(\Zend\Expressive\Helper\ServerUrlMiddleware::class);

// Register the routing middleware
$app->pipeRoutingMiddleware();

// Pipe middleware that needs to introspect the routing results


// Register the dispatch middleware
$app->pipeDispatchMiddleware();