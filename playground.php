<?php
/**
 * Un bac à sable pour tester le fonctionnement de certaines fonctions PHP
 */
require './core/helpers/functions.php';
/*
// Application
say_hello();
say_bye();
$to_call = 'say_hello';
$to_call();
$messages = ['hello', 'bye'];
foreach ($messages as $to_call) {
    ('say_'.$to_call)();
}
$messages = ['morning' => 'hello', 'evening' => 'bye'];
foreach ($messages as $moment => $to_call) {
    ('say_'.$to_call)($moment);
}

// Core
function say_hello()
{
    echo 'hello'.PHP_EOL;
}

function say_bye()
{
    echo 'bye'.PHP_EOL;
}

function say_hello($moment)
{
    echo 'hello, it is the '.$moment.PHP_EOL;
}

function say_bye($moment)
{
    echo 'bye, it is the '.$moment.PHP_EOL;
}
*/

$bytes = random_bytes(32);
$token = bin2hex($bytes);
dd($token, $bytes);
/*$_SERVER['REQUEST_METHOD'];*/