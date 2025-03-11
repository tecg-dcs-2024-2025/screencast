<?php


global $csrf_token;

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    return $csrf_token;
}

function csrf()
{
    global $csrf_token;
    $csrf_token = $_SESSION['csrf_token'];
    if (isset($_SERVER['$_REQUEST_METHOD'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('Vérification du Token invalide');
            }
        }
    }
    echo '<input type="hidden" class="input" name="csrf_token" value="' . $csrf_token . '">';
    return true;
}

