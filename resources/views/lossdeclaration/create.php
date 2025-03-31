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
    <link rel="stylesheet"
          href="/css/main.css">
</head>
<body>
<h1>Déclaration de perte d'animal</h1>
<form action="/loss-declaration"
      method="post">
    <?php
    csrf() ?>
    <fieldset>
        <legend>Vos coordonnées</legend>
        <div class="fields">
            <!-- Email field -->
            <div class="field">
                <label for="email"><abbr title="requis">*</abbr>&nbsp;Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       placeholder="jean@valjean.net"
                    <?php
                    if (isset($_SESSION['old']['email'])) { ?>
                        value="<?= $_SESSION['old']['email'] ?>"
                        <?php
                    } ?>
                       required>
                <?php
                if (isset($_SESSION['errors']['email'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['email'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Email verification -->
            <div class="field">
                <label for="vemail"><abbr title="requis">*</abbr>&nbsp;Vérification de l’email</label>
                <input type="email"
                       name="vemail"
                       id="vemail"
                    <?php
                    if (isset($_SESSION['old']['vemail'])) { ?>
                        value="<?= $_SESSION['old']['vemail'] ?>"
                        <?php
                    } ?>
                       required>
                <?php
                if (isset($_SESSION['errors']['vemail'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['vemail'] ?></p></div>
                    <?php
                } ?>

            </div>
            <!-- Phone number -->
            <div class="field">
                <label for="phone">Téléphone</label>
                <input type="tel"
                       name="phone"
                       id="phone"
                       placeholder="+32 (0)4 279 75 01"
                    <?php
                    if (isset($_SESSION['old']['phone'])) { ?>
                        value="<?= $_SESSION['old']['phone'] ?>"
                        <?php
                    } ?>
                >
                <?php
                if (isset($_SESSION['errors']['phone'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['phone'] ?></p></div>
                    <?php
                } ?>

            </div>
            <!-- Country -->
            <div class="field">
                <label for="country">Pays</label>
                <select name="country"
                        id="country">
                    <?php
                    foreach ($countries as $country) { ?>
                        <option value="<?= $country->code ?>"
                            <?php
                            if (isset($_SESSION['old']['country']) && $country->code === $_SESSION['old']['country']) { ?>
                                selected
                                <?php
                            } ?>
                        ><?= COUNTRIES[$country->code] ?></option>
                        <?php
                    } ?>
                </select>
                <?php
                if (isset($_SESSION['errors']['country'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['country'] ?></p></div>
                    <?php
                } ?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Description de l‘animal disparu</legend>
        <div class="fields">

            <!-- Pet Type -->
            <div class="field">
                <label for="pet-type">Type d’animal</label>
                <select name="pet-type"
                        id="pet-type">
                    <?php
                    foreach ($pet_types as $type) { ?>
                        <option value="<?= $type->code ?>"
                            <?php
                            if (isset($_SESSION['old']['pet-type']) && $type->code === $_SESSION['old']['pet-type']) { ?>
                                selected
                                <?php
                            } ?>
                        ><?= PET_TYPES[$type->code] ?></option>
                        <?php
                    } ?>
                </select>
                <?php
                if (isset($_SESSION['errors']['pet-type'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-type'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Pet Name -->
            <div class="field">
                <label for="pet-name"><abbr title="requis">*</abbr>&nbsp;Nom de l’animal</label>
                <input type="pet-name"
                       name="pet-name"
                       id="pet-name"
                       placeholder="Rex"
                    <?php
                    if (isset($_SESSION['old']['pet-name'])) { ?>
                        value="<?= $_SESSION['old']['pet-name'] ?>"
                        <?php
                    } ?>
                       required>
                <?php
                if (isset($_SESSION['errors']['pet-name'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-name'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Pet chip -->
            <div class="field">
                <label for="pet-chip">Puce
                    <br><small>Obligatoire pour les chiens</small>
                </label>
                <input type="text"
                       name="pet-chip"
                       id="pet-chip"
                    <?php
                    if (isset($_SESSION['old']['pet-chip'])) { ?>
                        value="<?= $_SESSION['old']['pet-chip'] ?>"
                        <?php
                    } ?>>
                <?php
                if (isset($_SESSION['errors']['pet-chip'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-chip'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Pet Gender -->
            <div class="field row-radio">
                <p>Sexe</p>
                <input type="radio"
                       name="pet-gender"
                       id="pet-gender-female"
                       value="female"
                    <?php
                    if (isset($_SESSION['old']['pet-gender']) && $_SESSION['old']['pet-gender'] === 'female') { ?>
                        checked
                        <?php
                    } ?>
                ><label for="pet-gender-female">Femelle</label>
                <?php
                if (isset($_SESSION['errors']['pet-gender'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-gender'] ?></p></div>
                    <?php
                } ?>
                <input type="radio"
                       name="pet-gender"
                       id="pet-gender-male"
                       value="male"
                    <?php
                    if (isset($_SESSION['old']['pet-gender']) && $_SESSION['old']['pet-gender'] === 'male') { ?>
                        checked
                        <?php
                    } ?>
                ><label for="pet-gender-male">Male</label>
                <?php
                if (isset($_SESSION['errors']['pet-gender'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-gender'] ?></p></div>
                    <?php
                } ?>

            </div>
            <!-- Pet Age -->
            <div class="field">
                <label for="pet-age">Âge de l’animal
                    <br><small>approximativement en années</small></label>
                <input type="number"
                       name="pet-age"
                       id="pet-age"
                       placeholder="5"
                    <?php
                    if (isset($_SESSION['old']['pet-age'])) { ?>
                        value="<?= $_SESSION['old']['pet-age'] ?>"
                        <?php
                    } ?>>
                <?php
                if (isset($_SESSION['errors']['pet-age'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-age'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Pet Race -->
            <div class="field">
                <label for="pet-race">Race de l’animal</label>
                <input type="text"
                       name="pet-race"
                       id="pet-race"
                       placeholder="Caniche"
                    <?php
                    if (isset($_SESSION['old']['pet-race'])) { ?>
                        value="<?= $_SESSION['old']['pet-race'] ?>"
                        <?php
                    } ?>>
                <?php
                if (isset($_SESSION['errors']['pet-race'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-race'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Pet tatoo -->
            <div class="field row-radio">
                <label for="pet-tatoo-location">Tatouage</label>
                <select name="pet-tatoo-location"
                        id="pet-tatoo-location">
                    <option value="left-ear">Oreille gauche</option>
                    <option value="right-ear">Oreille droite</option>
                    <option value="mouth">Bouche</option>
                </select>
                <label for="pet-tatoo">Code</label>
                <input type="text"
                       name="pet-tatoo"
                       id="pet-tatoo"
                       placeholder="898HH0">
            </div>

            <!-- Pet Description -->
            <div class="field">
                <label for="pet-description">Description / Signes particuliers</label>
                <textarea name="pet-description"
                          id="pet-description"
                          rows="10"
                          placeholder="C’est un bon gamin"><?php
                    if (isset($_SESSION['old']['pet-description'])) { ?><?= $_SESSION['old']['pet-description'] ?><?php
                    } ?></textarea>
                <?php
                if (isset($_SESSION['errors']['pet-description'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-description'] ?></p></div>
                    <?php
                } ?>
            </div>

            <!-- Pet Race -->
            <div class="field">
                <label for="pet-picture">Photo de l’animal</label>
                <input type="file"
                       name="pet-picture"
                       id="pet-picture">
                <?php
                if (isset($_SESSION['errors']['pet-picture'])) { ?>
                    <div class="error">
                        <p><?= $_SESSION['errors']['pet-picture'] ?></p>
                    </div>
                    <?php
                } elseif (!empty($_SESSION['errors'])) { ?>
                    <div class="error">
                        <p>Il faut resélectionner l’image que vous aviez choisie, sinon, elle sera
                            perdue.</p>
                    </div>
                    <?php
                } ?>
            </div>

    </fieldset>

    <fieldset>
        <legend>Date et localité de la disparition</legend>
        <div class="fields">
            <!-- Date field -->
            <div class="field">
                <label for="disparition-date">Date de la disparition<br><small>année/mois/jour ou sélection
                        dans le
                        calendrier</small></label>
                <input type="date"
                       name="disparition-date"
                       id="disparition-date"
                    <?php
                    if (isset($_SESSION['old']['disparition-date'])) { ?>
                        value="<?= $_SESSION['old']['disparition-date'] ?>"
                        <?php
                    } ?>
                       required>
                <?php
                if (isset($_SESSION['errors']['disparition-date'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-date'] ?></p></div>
                    <?php
                } ?>
            </div>


            <!-- Disparition time -->
            <div class="field">
                <label for="disparition-time">Heure
                    <br><small>heures:minutes ou sélection de l’heure</small></label>
                <input type="time"
                       name="disparition-time"
                       id="disparition-time"
                    <?php
                    if (isset($_SESSION['old']['disparition-time'])) { ?>
                        value="<?= $_SESSION['old']['disparition-time'] ?>"
                        <?php
                    } ?>
                >
                <?php
                if (isset($_SESSION['errors']['disparition-time'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-time'] ?></p></div>
                    <?php
                } ?>

            </div>
            <!-- Disparition postal code -->
            <div class="field">
                <label for="disparition-postal-code">Code postal</label>
                <input type="text"
                       name="disparition-postal-code"
                       id="disparition-postal-code"
                       placeholder="4000"
                    <?php
                    if (isset($_SESSION['old']['disparition-postal-code'])) { ?>
                        value="<?= $_SESSION['old']['disparition-postal-code'] ?>"
                        <?php
                    } ?>
                       required>
                <?php
                if (isset($_SESSION['errors']['disparition-postal-code'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-postal-code'] ?></p></div>
                    <?php
                } ?>

            </div>

            <!-- Disparition Country -->
            <div class="field">
                <label for="disparition-country">Pays</label>
                <select name="disparition-country"
                        id="disparition-country">
                    <?php
                    foreach ($countries as $country) { ?>
                        <option value="<?= $country->code ?>"
                            <?php
                            if (isset($_SESSION['old']['disparition-country']) && $country->code === $_SESSION['old']['disparition-country']) { ?>
                                selected
                                <?php
                            } ?>
                        ><?= COUNTRIES[$country->code] ?></option>
                        <?php
                    } ?>
                </select>
                <?php
                if (isset($_SESSION['errors']['disparition-country'])) { ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-country'] ?></p></div>
                    <?php
                } ?>
            </div>
        </div>
    </fieldset>
    <button type="submit">Déclarer la perte de mon animal</button>
</form>
</body>
</html>
<?php
$_SESSION['errors'] = null;
$_SESSION['old'] = null;