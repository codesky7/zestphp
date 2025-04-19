<?php
namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware {
    public function handle(Request $request, \Closure $next) {
        $response = $next($request);
        
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        
        if ($request->getMethod() === 'OPTIONS') {
            return new Response('', 200, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
            ]);
        }
        
        return $response;
    }
}
