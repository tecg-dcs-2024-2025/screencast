<?php

namespace Tecgdcs;

class Response
{
    public static function abord()
    {
        die('Oups un problème technique est survenu !');
    }

    public static function redirect(string $url) {
        header("Location: " . $url);
        exit;
    }

    public static function back() {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        self::redirect($referer);
    }
}