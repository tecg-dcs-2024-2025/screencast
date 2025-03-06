<?php
/**
 * Un bac à sable pour tester le fonctionnement de certaines fonctions PHP
 */

$messages = ['day' => 'say_hello', 'night' => 'say_goodbye'];

foreach ($messages as $periode => $to_call){
    $to_call($periode);
}



function say_hello($periode): void
{
    echo 'hello, it’s the '.$periode.PHP_EOL;
}
function say_goodbye($periode):void
{
    echo 'goodbye it’s the '.$periode.PHP_EOL;
}