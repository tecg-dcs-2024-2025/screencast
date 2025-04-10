<?php

require __DIR__.'/../vendor/autoload.php';
define('DATABASE_PATH', __DIR__.'/../database.sqlite');
require __DIR__.'/../core/database/dbconnection.php';
$pet_types = array_keys(require __DIR__.'/../lang/fr/pet_types.php');

use Animal\Models\Country;
use Animal\Models\Loss;
use Animal\Models\Pet;
use Animal\Models\PetOwner;
use Animal\Models\PetType;

$faker = Faker\Factory::create();

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://restcountries.com/v3.1/all?fields=cca2');
$codes = json_decode($response->getBody()->getContents(), true);
$countries = array_map(fn($item) => $item['cca2'], $codes);


Country::query()->truncate();
foreach ($countries as $code) {
    Country::create(compact('code'));
}

PetType::query()->truncate();
foreach ($pet_types as $code) {
    PetType::create(compact('code'));
}

PetOwner::query()->truncate();
$belgium = Country::where('code', 'BE')->first();
$belgium->pet_owners()->create([
    'email' => 'dom@vil.be',
]);

for ($i = 1; $i <= 5; $i++) {
    PetOwner::create([
        'email' => $faker->email(),
        'country_id' => Country::all()->random()->id,
    ]);
}

Pet::query()->truncate();

$bird = PetType::where('code', 'bird')->first();
$bird->pets()->create([
    'name' => 'titi',
    'chip' => $faker->ean8(),
    'tatoo' => ['position' => 'ER', 'code' => $faker->ean8()]
]);

Pet::create([
    'name' => 'rocky',
    'chip' => $faker->ean8(),
    'pet_type_id' => PetType::where('code', 'dog')->first()->id,
]);

for ($i = 1; $i <= 5; $i++) {
    Pet::create([
        'name' => $faker->firstName(),
        'chip' => $faker->ean8(),
        'pet_type_id' => PetType::all()->random()->id,
    ]);
}

Loss::query()->truncate();

$rocky = Pet::where('name', 'rocky')->first();
$dominique = PetOwner::where('email', 'dom@vil.be')->first();
$not_dominique = PetOwner::where('email', '!=', 'dom@vil.be')->first();
$france = Country::where('code', 'FR')->first();
$lost_at_dom = \Carbon\Carbon::now()->subMonths(2);
$lost_at_not_dom = \Carbon\Carbon::now()->subMonths(1);
$postal_code = 75675;

Loss::create([
    'pet_id' => $rocky->id,
    'pet_owner_id' => $dominique->id,
    'country_id' => $france->id,
    'postal_code' => $postal_code,
    'lost_at' => $lost_at_dom,

]);

Loss::create([
    'pet_id' => $rocky->id,
    'pet_owner_id' => $not_dominique->id,
    'country_id' => $france->id,
    'postal_code' => $postal_code,
    'lost_at' => $lost_at_not_dom,
]);


