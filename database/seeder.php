<?php

require __DIR__.'/../vendor/autoload.php';
define('DATABASE_PATH', __DIR__.'/../database.sqlite');
require __DIR__.'/../core/database/dbconnection.php';
$pet_types = array_keys(require __DIR__.'/../lang/fr/pet_types.php');
$countries_csv = __DIR__.'/countries.csv';

use Animal\Models\Country;
use Animal\Models\Loss;
use Animal\Models\Pet;
use Animal\Models\PetOwner;
use Animal\Models\PetType;
use Animal\Models\User;

$faker = Faker\Factory::create();

User::query()->truncate();
User::create([
    'email' => 'dominique.vilain@hepl.be',
    'password' => password_hash('change_this', PASSWORD_BCRYPT),
]);


$countries_csv = __DIR__.'/countries.csv';
$file_handle = fopen($countries_csv, 'rb');
// Récupérer les entêtes du CSV
$headers = fgetcsv($file_handle, 1000, escape: '');
// Mettre en lien les langues supportées par l'app avec les entêtes qui leur correspondent
$available_languages = ['EN' => 'name.common', 'FR' => 'translations.fra.common'];
// Récupérer l'indice de la colonne qui contient le code cca2
$cca2_index = array_find_key($headers, fn($item) => $item === 'cca2');
// Récupérer les indices des colonnes qui contiennent les traductions utiles dans notre app
$header_indexes = [];
foreach ($available_languages as $cca2 => $translation_header) {
    $header_indexes[$cca2] = array_find_key($headers, fn($item) => $item === $translation_header);
}


// Préparer les chaînes à écrire dans les fichiers php. On commence par le code qui définit un array
foreach (array_keys($available_languages) as $lang_code) {
    $$lang_code = '<?php return ['.PHP_EOL;
}
// Pour la db, on aura d'un besoin d'un array des cca2 qui sont dans le csv
$cca2s = [];
// On commence à parcourir le csv, une ligne à la fois
while ($country_row = fgetcsv($file_handle, 1000, escape: '')) {
    //Certains caractères peuvent casser l'analyse apparemment. Ce test est une petite précaution 🤞🍀
    if (count($country_row) === count($headers)) {
        // Pour chaque langue, on peut alors compléter l'array pour le pays en cours.
        foreach (array_keys($available_languages) as $lang_code) {
            $cca2 = $country_row[$cca2_index];
            $$lang_code .= '"'.$cca2.'" => "'.$country_row[$header_indexes[$lang_code]].'",'.PHP_EOL;
        }
        // Et on n'oublie pas d'ajouter le cca2 du pays en cours dans l'array des cca2 dont on aura besoin dans la db
        $cca2s[] = $country_row[$cca2_index];
    }
}
// On finalise le code php qu'on doit écrire dans les fichiers, et on l'écrit.
foreach (array_keys($available_languages) as $lang_code) {
    $$lang_code .= '];'.PHP_EOL;
    file_put_contents(__DIR__.'/../lang/'.$lang_code.'/countries.php', $$lang_code);
}


Country::query()->truncate();
foreach ($cca2s as $code) {
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


