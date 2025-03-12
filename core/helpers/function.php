<?php


function dd(mixed ...$args):void
{
    foreach ($args as $arg) {
        var_dump($arg);
    }
        die();
}

function info(string $message):void
{
    $path = __DIR__.'/../../storage/logs/log.txt';
    file_put_contents($path, $message.PHP_EOL, FILE_APPEND);

}