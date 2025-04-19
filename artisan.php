<?php
require __DIR__ . '/bootstrap/app.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Database\Seeds\ItemSeeder;

if (in_array('--migrate', $argv)) {
    echo "Running migrations...\n";
    $migrations = glob(__DIR__ . '/database/migrations/*.php');
    foreach ($migrations as $migration) {
        require_once $migration;
    }
    echo "Migrations completed.\n";
}

if (in_array('--seed', $argv)) {
    echo "Running seeders...\n";
    ItemSeeder::run();
    echo "Seeding completed.\n";
}
