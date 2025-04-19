<?php
use App\Http\Controllers\UserController;

return function ($router) {
    $router->addRoute('GET', '/api/users', [UserController::class, 'index']);
    $router->addRoute('GET', '/api/users/{id:\d+}', [UserController::class, 'show']);
    $router->addRoute('POST', '/api/users', [UserController::class, 'store']);
    $router->addRoute('PUT', '/api/users/{id:\d+}', [UserController::class, 'update']);
    $router->addRoute('DELETE', '/api/users/{id:\d+}', [UserController::class, 'destroy']);
};
