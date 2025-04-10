<?php

/**
 * Un bac à sable pour tester le fonctionnement de certaines fonctions PHP
 */

use Animal\Models\Country;
use Animal\Models\Pet;
use Animal\Models\PetOwner;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/core/helpers/functions.php';
define('DATABASE_PATH', __DIR__.'/database.sqlite');
require __DIR__.'/core/database/dbconnection.php';

$belgium = Country::where('code', 'BE')->first();
echo $belgian_pet_owners = $belgium->pet_owners->count();
echo PHP_EOL;
$dominique = PetOwner::where('email', 'dom@vil.be')->first();
echo $dominique->country?->code;
echo PHP_EOL;
$rocky = Pet::where('name', 'rocky')->first();
echo $rocky->pet_type?->code;
echo PHP_EOL;
echo $rocky->losses()->latest('lost_at')->first()->pet_owner->email;
echo PHP_EOL;
echo Pet::where('name', 'titi')->first()->tatoo['code'];
echo PHP_EOL;
