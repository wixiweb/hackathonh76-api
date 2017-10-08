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

$app->route(
    '/categories',
    \Api\Action\Category\FetchAllAction::class,
    ['GET'],
    'categories/fetch-all'
);

$app->route(
    '/zones',
    \Api\Action\Zone\FetchAllAction::class,
    ['GET'],
    'zones/fetch-all'
);
