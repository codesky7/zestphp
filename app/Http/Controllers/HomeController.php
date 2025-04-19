<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Item;

class HomeController {
    public function index() {
        $items = Item::all()->toArray();
        
        $response = new Response();
        $response->setContent(json_encode($items));
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
}
