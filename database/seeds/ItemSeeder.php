<?php
namespace Database\Seeds;

use App\Models\Item;
use Illuminate\Database\Capsule\Manager as Capsule;

class ItemSeeder {
    public static function run() {
        Item::create([
            'title' => 'Welcome to ZestPHP',
            'description' => 'A high-performance PHP framework.'
        ]);
        Item::create([
            'title' => 'React Frontend',
            'description' => 'Built with modern React and Vite.'
        ]);
        Item::create([
            'title' => 'API Driven',
            'description' => 'Seamless backend-frontend integration.'
        ]);
    }
}
