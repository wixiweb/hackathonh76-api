<?php
/**
 * @package hackathon76api
 * @author Wixiweb <contact@wixiweb.fr>
 */

$app->route(
    '/',
    \Api\Action\IndexAction::class,
    ['GET'],
    'index'
);
