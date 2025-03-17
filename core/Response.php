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
        header('Location: '.$url);
        exit;
    }

    public static function back()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }


}