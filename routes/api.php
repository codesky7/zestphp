<?php
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CorsMiddleware;

return function ($router) {
    $router->addRoute('GET', '/api/home', [HomeController::class, 'index'])->middleware([CorsMiddleware::class]);
    $router->addRoute('OPTIONS', '/api/home', [CorsMiddleware::class, 'handle']);
};
