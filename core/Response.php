<?php

namespace Tecgdcs;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    #[NoReturn]
    public static function abort(): void
    {
        die('Un problème technique est survenu suite à votre requête');
    }

    public static function redirect(): void
    {

    }

    function back(): void
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/header.php';
        self::redirect($referer);
    }
}