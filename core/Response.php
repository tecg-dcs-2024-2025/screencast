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
    public static function redirect(string $url)
    {
        header("location: $url");
        exit;
    }

    public static function back()
    {
        $redirection = $_SERVER['HTTP_REFERER'];
        self::redirect($redirection);
    }

}