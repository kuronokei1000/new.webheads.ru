<?php

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = trim($requestUri, '/');

$routes = [
    [
        'pattern' => '#^news/([a-zA-Z0-9_-]+)/?$#',
        'path' => '/news/detail/index.php',
        'params' => [
            'url' => 1,
        ],
    ],

    [
        'pattern' => '#^portfolio/([a-zA-Z0-9_-]+)/?$#',
        'path' => '/portfolio/detail/index.php',
        'params' => [
            'url' => 1,
        ],
    ],

    // Образец для хардкода следующих обработчиков:
    /*
    [
        'pattern' => '#^portfolio/([a-zA-Z0-9_-]+)/?$#',
        'path' => '/portfolio/detail/index.php',
        'params' => [
            'url' => 1,
        ],
    ],
    */
];

foreach ($routes as $route) {
    if (preg_match($route['pattern'], $requestUri, $matches)) {
        foreach ($route['params'] as $key => $matchIndex) {
            $_GET[$key] = $matches[$matchIndex] ?? null;
            $_REQUEST[$key] = $_GET[$key];
        }

        require $_SERVER['DOCUMENT_ROOT'] . $route['path'];
        exit;
    }
}

http_response_code(404);

require $_SERVER['DOCUMENT_ROOT'] . '/404.php';
exit;