<?php
namespace App\Http\Controllers;

class UserController {
    public function profile() {
        return json_encode(['id' => 1, 'name' => 'John Doe']);
    }
}
