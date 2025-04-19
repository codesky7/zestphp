<?php
require __DIR__ . '/../vendor/autoload.php';
use FastRoute\Dispatcher;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
require __DIR__ . '/../bootstrap/app.php';
$dispatcher = FastRoute\simpleDispatcher(function ($router) {
    $apiRoutes = require __DIR__ . '/../routes/api.php';
    $apiRoutes($router);
});
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo json_encode(['message' => 'Not Found']);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: http://localhost:5173');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        $controller = new $handler[0]();
        echo $controller->{$handler[1]}(...array_values($vars));
        break;
}