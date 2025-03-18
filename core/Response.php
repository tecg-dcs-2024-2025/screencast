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

    public static function redirect($url)
    {
        header('Location:' . $url);
        exit;
    }

    public static function back()
    {
        self::redirect($_SERVER['HTTP_REFERER']);
    }
}