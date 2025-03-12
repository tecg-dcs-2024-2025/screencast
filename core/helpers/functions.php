<?php
function csrf(): void
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
    echo <<<HTML
<input type="hidden" name="_csrf" value="{$_SESSION['token']}">
HTML;
}

function dd(mixed ...$args): void // ... opérateur de déstructuration
{
    foreach ($args as $arg) {
        var_dump($arg);
    }
    die();
}

function info(string $message): void
{
    $path = __DIR__.'/../../storage/logs/log.txt';
    file_put_contents($path, $message.PHP_EOL, FILE_APPEND); // PHP_EOL end of line
}