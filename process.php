<?php

session_start();

/*
 * Valider les deux champs
 */
$email = '';
$vemail = '';
if (array_key_exists('email', $_REQUEST)) {
    $email = trim($_REQUEST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être un email';
    }
} else {
    $_SESSION['errors']['email'] = 'L’email est requis';
}
if (array_key_exists('vemail', $_REQUEST)) {
    $vemail = trim($_REQUEST['vemail']);
    if ($email !== $vemail) {
        $_SESSION['errors']['vemail'] = 'L’email doit être confirmé';
    }
} else {
    $_SESSION['errors']['vemail'] = 'L’email de confirmation est requis';
}

/*
 * S’il y a des erreurs, on redirige vers la page du formulaire, en mémorisant le temps d'une requête les erreurs et les anciennes données
 */

if (isset($_SESSION['errors'])) {
    $_SESSION['old'] = $_REQUEST;
    header('Location: /index.php');
    exit;
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
