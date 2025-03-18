<?php

use Tecgdcs\Response;

function csrf()
{
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    echo <<<HTML
<input type="hidden" name="_csrf" value="{$_SESSION['csrf_token']}">
HTML;
    echo PHP_EOL;
}

function dd(mixed...$vars): void
{
    foreach ($vars as $var) {
        var_dump($var);
    }
    die();
}

function info(string $message): void
{
    $path = __DIR__ . '/../../storage/logs/log.txt';

    file_put_contents($path, $message . PHP_EOL, FILE_APPEND);
}

function back() {
    Response::back();
}

function redirect(string $url) {
    Response::redirect($url);
}
