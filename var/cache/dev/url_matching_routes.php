<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/index' => [[['_route' => 'news_index', '_controller' => ['App\\Infrastructure\\Http\\News\\Controller\\NewsIndexController', 'index']], null, ['GET' => 0], null, false, false, null]],
        '/api/generate_report' => [[['_route' => 'generate_report', '_controller' => ['App\\Infrastructure\\Http\\News\\Controller\\GenerateNewsController', 'generateReport']], null, ['POST' => 0], null, false, false, null]],
        '/api/create_news' => [[['_route' => 'news_create', '_controller' => ['App\\Infrastructure\\Http\\News\\Controller\\NewsCreateController', 'create']], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
