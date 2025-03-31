<?php

require __DIR__ . '/../vendor/autoload.php';
define('DATABASE_PATH', __DIR__ . '/../database.sqlite');
require __DIR__.'/../core/database/connection.php';
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists("countries");
Capsule::schema()->create('countries', function ($table) {
    $table->id();
    $table->string('code')->unique();
    $table->timestamps();
});


Capsule::schema()->dropIfExists("pet_types");
Capsule::schema()->create('pet_types', function ($table) {
    $table->id();
    $table->string('code')->unique();
    $table->timestamps();
});

Capsule::schema()->dropIfExists("pet_owner");
Capsule::schema()->create('pet_owner', function ($table) {
    $table->id();
    $table->string('first-name')->nullable();
    $table->string('last-name')->nullable();
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->timestamps();
});