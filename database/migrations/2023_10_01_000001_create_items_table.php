<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('items', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->timestamps();
});
