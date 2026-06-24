<?php
session_start();

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Config/App.php';
require BASE_PATH . '/app/Helpers/helpers.php';

$routes = require BASE_PATH . '/routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace('/fordas/public/index.php', '', $uri);
$uri = str_replace('/fordas/public', '', $uri);

$uri = rtrim($uri, '/');

if ($uri === '') {
    $uri = '/';
}

if (!isset($routes[$uri])) {
    die('404 Not Found');
}

$route = $routes[$uri];

require BASE_PATH . '/app/Controllers/' .
        $route['controller'] .
        '.php';

$controller = new $route['controller'];

$controller->{$route['method']}();