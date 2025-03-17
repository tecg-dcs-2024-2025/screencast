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
                echo 'hey';
        header('Location: '.$url);
        exit;
    }

    public static function back()
    {
        echo 'hallo';
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }


}