<?php

$routes = require '../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = rtrim($uri, '/');

if ($uri === '') {
    $uri = '/';
}

if (!isset($routes[$uri])) {
    die('404 Not Found');
}

$route = $routes[$uri];

require '../app/Controllers/' .
        $route['controller'] .
        '.php';

$controller = new $route['controller'];

$controller->{$route['method']}();