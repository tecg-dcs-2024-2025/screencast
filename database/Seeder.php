<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../core/database/connection.php';
$countries = require __DIR__ . '/../config/countries.php';
$pet_types = require __DIR__ . '/../config/pet_types.php';

use Animal\Models\Country;
use Animal\Models\PetType;

use Illuminate\Database\Capsule\Manager as Capsule;

Country::query()->truncate();
foreach ($countries as $code){
    Country::create(compact('code'));
}

Country::query()->truncate();
foreach ($pet_types as $code){
    Country::create(compact('code'));
}
