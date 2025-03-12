<?php

require './vendor/autoload.php';

use Tecgdcs\Validator;

session_start();
$_SESSION['errors'] = null;
$_SESSION['old'] = null;

$countries = require './config/countries.php';
$messages = require './lang/fr/validation.php';
/*
 * Valider les deux champs
 */
$email = '';
$vemail = '';

Validator::check([
    'email' => 'required|email',
    'vemail' => 'required|same:email',
    'phone' => 'phone',
    'country' => 'in_collection:countries',
]);

/*
* S’il y a des erreurs, on redirige vers la page du formulaire, en mémorisant le temps d'une requête les erreurs et les anciennes données
*/
{

}


/*
 * Assurer le rendu récapitulatif des données soumises
 */

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description"
              content="Récapitulatif de votre déclaration de perte de votre animal">
        <meta name="keywords"
              content="animal, animal perdu, déclaration">
        <meta name="author"
              content="Dominique Vilain">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>Récupitulatif de votre déclaration de perte d’un animal</title>
        <link rel="apple-touch-icon"
              sizes="180x180"
              href="/apple-touch-icon.png">
        <link rel="icon"
              type="image/png"
              sizes="32x32"
              href="/favicon-32x32.png">
        <link rel="icon"
              type="image/png"
              sizes="16x16"
              href="/favicon-16x16.png">
        <link rel="manifest"
              href="/site.webmanifest">
        <link rel="stylesheet"
              href="/css/main.css">
    </head>
    <body>
        <h1>Récapitulatif des données soumises</h1>
        <dl>
            <div>
                <dt>Email&nbsp;:</dt>
                <dd><?= $email ?></dd>
            </div>
        </dl>
    </body>
</html>
