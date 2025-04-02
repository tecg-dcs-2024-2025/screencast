<?php

use JetBrains\PhpStorm\NoReturn;
use Tecgdcs\Response;

if (! function_exists('csrf')) {
    #[NoReturn]
    function csrf(): void
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        echo <<<HTML
<input name="_csrf" type="hidden" value="{$_SESSION['csrf_token']}">
HTML;
        echo PHP_EOL;
    }
}

if (! function_exists('check_csrf_token')) {
    #[NoReturn]
    function check_csrf_token(): void
    {
        if ($_POST['_csrf'] !== $_SESSION['csrf_token']) {
            Response::abort();
        }
    }
}

if (! function_exists('info')) {
    #[NoReturn]
    function info($message = 'a random message'): void
    {
        $path = __DIR__.'/../../storage/logs/log.txt';
        file_put_contents($path, $message.PHP_EOL, FILE_APPEND);
    }
}

if (! function_exists('dd')) {
    #[NoReturn]
    function dd(mixed ...$vars): void
    {
        foreach ($vars as $var) {
            var_dump($var);
        }
        exit();
    }
}

if (! function_exists('redirect')) {
    #[NoReturn]
    function redirect(string $url): void
    {
        Response::redirect($url);
    }
}

if (! function_exists('back')) {
    #[NoReturn]
    function back(): void
    {
        Response::back();
    }
}
