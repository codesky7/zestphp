<?php
require __DIR__ . '/../bootstrap/app.php';

use FastRoute\Dispatcher;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Middleware\CorsMiddleware;

$request = Request::createFromGlobals();
$dispatcher = FastRoute\simpleDispatcher(function ($router) {
    $apiRoutes = require __DIR__ . '/../routes/api.php';
    $apiRoutes($router);
});

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response = new \Symfony\Component\HttpFoundation\JsonResponse(['message' => 'Not Found'], 404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response = new \Symfony\Component\HttpFoundation\JsonResponse(['message' => 'Method Not Allowed'], 405);
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        
        $middleware = $handler['middleware'] ?? [];
        $next = function ($req) use ($handler, $vars) {
            if (is_array($handler)) {
                $controller = new $handler[0]();
                return $controller->{$handler[1]}(...array_values($vars));
            }
            return $handler(...array_values($vars));
        };
        
        foreach ($middleware as $m) {
            $middlewareInstance = new $m();
            $next = fn($req) => $middlewareInstance->handle($req, $next);
        }
        
        $response = $next($request);
        break;
}

$response->send();
