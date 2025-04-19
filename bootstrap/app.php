<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

(Dotenv::createImmutable(__DIR__ . '/..'))->load();

// Initialize Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection(require __DIR__ . '/../config/database.php')['connections']['sqlite']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $capsule;
