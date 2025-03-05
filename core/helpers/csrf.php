<?php

function generate_hidden_input_element(){
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;

    echo '<input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">';
}

function csrf_validator(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_REQUEST['csrf_token'] === $_SESSION['csrf_token']) {
        return true;
    } else {
        echo "Ce type de requête n’est pas valide !";
        die();
    }
}