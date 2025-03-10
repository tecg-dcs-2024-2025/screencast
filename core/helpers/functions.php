<?php

function generate_hidden_input():void{
    $token = bin2hex(random_bytes(32)); //ici, on génère le token.
    $_SESSION['csrf_token'] = $token;

    echo '<input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">';
}

function csrf_validator(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_REQUEST['csrf_token'] === $_SESSION['csrf_token']) { // si la méthode du form est post ET que les deux tokens (input hidden ET session) sont identiques alors c'est ok.
        return true;
    } else {
        echo "Ce type de requête n’est pas valide !"; //Sinon => erreur
        die();
    }
}
