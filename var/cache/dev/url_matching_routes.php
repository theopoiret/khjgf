<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'image', '_controller' => 'App\\Controller\\ImageController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/client/prenom/(?'
                    .'|php/([A-Za-z]+(?:-?[A-Za-z]+)+)(*:91)'
                    .'|([A-Za-z]+(?:-?[A-Za-z]+)+)(*:125)'
                    .'|yaml/([A-Za-z]+(?:-?[A-Za-z]+)+)(*:165)'
                .')'
                .'|/images/([^/]++)(*:190)'
                .'|/photo/([^/]++)(*:213)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        91 => [[['_route' => 'client_php', '_controller' => ['App\\Controller\\ClientController', 'info']], ['nom'], null, null, false, true, null]],
        125 => [[['_route' => 'app_client_info', '_controller' => 'App\\Controller\\ClientController::info'], ['nom'], null, null, false, true, null]],
        165 => [[['_route' => 'client_yaml', '_controller' => 'App\\Controller\\ClientController::info'], ['nom'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        190 => [[['_route' => 'image_show', '_controller' => 'App\\Controller\\ImageController::image'], ['img'], null, null, false, true, null]],
        213 => [
            [['_route' => 'client_photo', '_controller' => 'App\\Controller\\ImageController::imageShow'], ['img'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
