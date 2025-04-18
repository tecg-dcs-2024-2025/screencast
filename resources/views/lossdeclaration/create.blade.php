@component('layouts.app',compact('title'))
    <h1>Déclaration de perte d'animal</h1>
    <form action="/loss-declaration"
          method="post">
        <?php
        csrf() ?>
        <fieldset>
            <legend>Vos coordonn&eacute;es</legend>
            <div class="fields">
                <!-- First Name -->
                @component('components.form.fields.input_text',
[
   'type' => 'text',
   'field_name' => 'first-name',
   'placeholder' => 'Jean'
])
                Prénom
                @endcomponent
                <!-- Last Name -->
                @component('components.form.fields.input_text',
[
'type' => 'text',
'field_name' => 'last-name',
'placeholder' => 'Valjean'
])
                Nom
                @endcomponent
                <!-- Email field -->
                @component('components.form.fields.input_text',
[
'type' => 'email',
'field_name' => 'email',
'placeholder' => 'jean.valjean@miserables.fr',
'required' => 'required'
])
                    <abbr title="requis">*</abbr>&nbsp;Email
                @endcomponent
                <!-- Email verification -->
                @component('components.form.fields.input_text',
[
'type' => 'email',
'field_name' => 'vemail',
'required' => 'required'
])
                    <abbr title="requis">*</abbr>&nbsp;Vérification de l’email
                @endcomponent
                <!-- Phone number -->
                @component('components.form.fields.input_text',
[
'type' => 'tel',
'field_name' => 'phone',
'placeholder' => '+32 (0)4 279 75 01',
])
                Numéro de téléphone
                @endcomponent
                <!-- Country -->
                @component('components.form.fields.select',
                [
                    'field_name' => 'country',
                    'collection' => $countries,
                    'key' => 'code',
                ])
                Pays
                @endcomponent
            </div>
        </fieldset>

        <fieldset>
            <legend>Description de l&rsquo;animal disparu</legend>
            <div class="fields">
                <!-- Pet Type -->
                <div class="field">
                    <label for="pet-type">Type d&rsquo;animal</label>
                    <select name="pet-type"
                            id="pet-type">
                        <?php
                        foreach ($pet_types as $type) : ?>
                        <option value="<?= $type->code ?>"
                                <?php
                                if (isset($_SESSION['old']['pet-type']) && $type->code === $_SESSION['old']['pet-type']) : ?>
                                selected
                            <?php
                            endif ?>
                        ><?= PET_TYPES[$type->code] ?></option>
                        <?php
                        endforeach ?>
                    </select>
                    <?php
                    if (isset($_SESSION['errors']['pet-type'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-type'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet Name -->
                <div class="field">
                    <label for="pet-name"><abbr title="requis">*</abbr>&nbsp;Nom de l&rsquo;animal</label>
                    <input type="text"
                           value="<?= $_SESSION['old']['pet-name'] ?? '' ?>"
                           name="pet-name"
                           id="pet-name"
                           placeholder="Rex"
                           required>
                    <?php
                    if (isset($_SESSION['errors']['pet-name'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-name'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet chip -->
                <div class="field">
                    <label for="pet-chip"><abbr title="requis">*</abbr>&nbsp;Puce</label>
                    <input type="text"
                           value="<?= $_SESSION['old']['pet-chip'] ?? '' ?>"
                           name="pet-chip"
                           id="pet-chip">
                    <?php
                    if (isset($_SESSION['errors']['pet-chip'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-chip'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet Gender -->
                <div class="field row-radio">
                    <p>Sexe</p>
                    <input type="radio"
                           name="pet-gender"
                           id="pet-gender-female"
                           value="female"
                           <?php
                           if (isset($_SESSION['old']['pet-gender']) && $_SESSION['old']['pet-gender'] === 'female') : ?>
                           checked
                        <?php
                        endif ?>
                    ><label for="pet-gender-female">Femelle</label>

                    <input type="radio"
                           name="pet-gender"
                           id="pet-gender-male"
                           value="male"
                           <?php
                           if (isset($_SESSION['old']['pet-gender']) && $_SESSION['old']['pet-gender'] === 'male') : ?>
                           checked
                        <?php
                        endif ?>
                    ><label for="pet-gender-male">Male</label>

                    <?php
                    if (isset($_SESSION['errors']['pet-gender'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-gender'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet Age -->
                <div class="field">
                    <label for="pet-age">&Acirc;ge de l&rsquo;animal
                        <br><small>Approximativement en ann&eacute;es</small></label>
                    <input type="number"
                           value="<?= $_SESSION['old']['pet-age'] ?? '' ?>"
                           name="pet-age"
                           id="pet-age"
                           placeholder="5">

                    <?php
                    if (isset($_SESSION['errors']['pet-age'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-age'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet Race -->
                <div class="field">
                    <label for="pet-race">Race de l&rsquo;animal</label>
                    <input type="text"
                           value="<?= $_SESSION['old']['pet-race'] ?? '' ?>"
                           name="pet-race"
                           id="pet-race"
                           placeholder="Caniche">
                    <?php
                    if (isset($_SESSION['errors']['pet-race'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-race'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet tatoo -->
                <div class="field row-radio">
                    <label for="pet-tatoo-location">Tatouage</label>
                    <select name="pet-tatoo-location"
                            id="pet-tatoo-location">
                        <option value="0">Pas de tatouage</option>
                        <option value="left-ear">Oreille gauche</option>
                        <option value="right-ear">Oreille droite</option>
                        <option value="mouth">Bouche</option>
                    </select>
                    <label for="pet-tatoo">Code</label>
                    <input type="text"
                           value="<?= $_SESSION['old']['pet-tatoo'] ?? '' ?>"
                           name="pet-tatoo"
                           id="pet-tatoo"
                           placeholder="898HH0">
                    <?php
                    if (isset($_SESSION['errors']['pet-tatoo'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-tatoo'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet Description -->
                <div class="field">
                    <label for="pet-description">Description / Signes particuliers</label>
                    <textarea name="pet-description"
                              id="pet-description"
                              rows="10"
                              placeholder="C’est un bon gamin"><?= $_SESSION['old']['pet-description'] ?? '' ?></textarea>
                    <?php
                    if (isset($_SESSION['errors']['pet-description'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['pet-description'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Pet Race -->
                <div class="field">
                    <label for="pet-picture">Photo de l&rsquo;animal</label>
                    <input type="file"
                           name="pet-picture"
                           id="pet-picture">
                    <?php
                    if (isset($_SESSION['errors']['pet-picture'])) : ?>
                    <div class="error">
                        <p><?= $_SESSION['errors']['pet-picture'] ?></p>
                    </div>
                    <?php
                    elseif (!empty($_SESSION['errors'])) : ?>
                    <div class="error">
                        <p>Il faut res&eacute;lectionner l&rsquo;image que vous aviez choisie, sinon, elle sera
                           perdue.</p>
                    </div>
                    <?php
                    endif ?>
                </div>
        </fieldset>

        <fieldset>
            <legend>Date et localit&eacute; de la disparition</legend>
            <div class="fields">
                <!-- Date field -->
                <div class="field">
                    <label for="disparition-date">Date de la disparition
                        <br><small>Ann&eacute;e/mois/jour ou s&eacute;lection dans le calendrier</small></label>
                    <input type="date"
                           value="<?= $_SESSION['old']['disparition-date'] ?? '' ?>"
                           name="disparition-date"
                           id="disparition-date"
                           required>
                    <?php
                    if (isset($_SESSION['errors']['disparition-date'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-date'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Disparition time -->
                <div class="field">
                    <label for="disparition-time">Heure
                        <br><small>Heures:minutes ou s&eacute;lection de l&rsquo;heure</small></label>
                    <input type="time"
                           name="disparition-time"
                           id="disparition-time"
                           value="<?= $_SESSION['old']['disparition-time'] ?? '' ?>">
                    <?php
                    if (isset($_SESSION['errors']['disparition-time'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-time'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Disparition postal code -->
                <div class="field">
                    <label for="disparition-postal-code">Code postal</label>
                    <input type="number"
                           value="<?= $_SESSION['old']['disparition-postal-code'] ?? '' ?>"
                           minlength="4"
                           maxlength="5"
                           name="disparition-postal-code"
                           id="disparition-postal-code"
                           placeholder="4000"
                           required>
                    <?php
                    if (isset($_SESSION['errors']['disparition-postal-code'])) : ?>
                    <div class="error"><p><?= $_SESSION['errors']['disparition-postal-code'] ?></p></div>
                    <?php
                    endif ?>
                </div>
                <!-- Disparition Country -->
                @component('components.form.fields.select',
                [
                    'field_name' => 'disparition-country',
                    'collection' => $countries,
                    'key' => 'code',
                ])
                Pays
                @endcomponent
            </div>
        </fieldset>
        @component('components.form.buttons.normal')
            D&eacute;clarer la perte de mon animal
        @endcomponent
    </form>
@endcomponent