<?php

use Tecgdcs\Response;

if (!function_exists('csrf')) {
    function csrf()
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        echo <<<HTML
    <input type="hidden" name="_csrf" value="{$_SESSION['csrf_token']}">
HTML;
        echo PHP_EOL;
    }
}

if (!function_exists('csrf_validator')) {
    function csrf_validator()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $_SESSION['csrf_token'] !== $_REQUEST['_csrf']) {
            Response::abort(); // Class qui gère l'erreur
        }
        unset($_SESSION['csrf_token']); // Vider la variable de session une fois que le test est passé
    }
}

if (!function_exists('dd')) {
    function dd(mixed ...$vars): void // On ne connait pas le type de la variable donc on met "mixed"
    {
        foreach ($vars as $var) {
            var_dump($var);
        }
        die();
    }
}

if (!function_exists('info')) {
    function info(string $message = 'a random message'): void
    {
        $path = __DIR__ . '/../../storage/logs/log.txt';
        file_put_contents($path, $message . PHP_EOL, FILE_APPEND);
    }
}
