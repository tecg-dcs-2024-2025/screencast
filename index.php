<?php

session_start() ?>
    <!DOCTYPE html>
    <html lang="fr">

        <head>
            <meta charset="utf-8">
            <meta name="description"
                  content="Vous avez perdu un animal ? Signalez-le nous via ce formulaire">
            <meta name="keywords"
                  content="animal, animal perdu, déclaration">
            <meta name="author"
                  content="Dominique Vilain">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible"
                  content="ie=edge">
            <title>J’ai perdu mon animal</title>
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
            <h1>Déclaration de perte d'animal</h1>
            <form action="/process.php"
                  method="post">
                <fieldset>
                    <legend>Vos coordonnées</legend>
                    <div>
                        <label for="email">*Email</label>
                        <input type="email"
                               name="email"
                               id="email"
                            <?php
                            if (isset($_SESSION['old']['email'])): ?>
                                value="<?= $_SESSION['old']['email'] ?>"
                            <?php
                            endif; ?>
                               required>
                    </div>
                    <?php
                    if (isset($_SESSION['errors']['email'])): ?>
                        <div><p><?= $_SESSION['errors']['email'] ?></p></div>
                    <?php
                    endif; ?>
                    <div>
                        <label for="vemail">*Retapez votre email une seconde fois</label>
                        <input type="email"
                               name="vemail"
                               id="vemail"
                            <?php
                            if (isset($_SESSION['old']['vemail'])): ?>
                                value="<?= $_SESSION['old']['vemail'] ?>"
                            <?php
                            endif; ?>
                               required>
                    </div>
                    <?php
                    if (isset($_SESSION['errors']['vemail'])): ?>
                        <div><p><?= $_SESSION['errors']['vemail'] ?></p></div>
                    <?php
                    endif; ?>
                </fieldset>
                <button type="submit">Déclarer mon animal</button>
            </form>
        </body>
    </html>
<?php
$_SESSION['errors'] = null;
$_SESSION['old'] = null;