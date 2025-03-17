<?php

namespace Tecgdcs;

class Response
{
    public static function abort()
    {
        die('Oups, un problème technique est survenu !');
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