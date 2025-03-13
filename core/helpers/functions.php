<?php

use Tecgdcs\Response;

if (!function_exists('csrf')) {
    function csrf(): void
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        echo <<<HTML
<input name="_csrf" type="hidden" value="{$_SESSION['csrf_token']}">
HTML;
        echo PHP_EOL;
    }
}

if (!function_exists('check_csrf_token')) {
    function check_csrf_token(): void
    {
        if ($_POST['_csrf'] !== $_SESSION['csrf_token']) {
            Response::abort();
        }
    }
}