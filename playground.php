<?php
/**
 * Un bac à sable pour tester le fonctionnement de certaines fonctions PHP
 */

/*$to_call = 'say_hello';
$to_call();*/

$messages = ['morning'=>'hello', 'evening'=>'goodbye'];
foreach ($messages as $moment => $call_to) {
    ('say_'.$call_to)($moment);
}

function say_hello($moment)
{
    echo "Hello World, it's the ".$moment.PHP_EOL;
}

function say_goodbye($moment){
    echo "Goodbye, it's the ".$moment.PHP_EOL;
}

/*function parse_constraints(array $rules): false
{
    // Analyser les $rules
    $rules = explode('|', $rules);
    echo $rules[0];
    echo $rules[1];
    return false;
}

parse_constraints($rules);*/


$bytes = random_bytes(64);
echo bin2hex($bytes);

