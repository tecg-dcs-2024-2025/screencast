<?php

namespace Tecgdcs;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    /* les différent erreures qui seront afficher*/
    public const SEE_OTHER = 303;

    public const SERVER_ERROR = 500;
    public const BAD_REQUEST = 400;
    public const NOT_FOUND = 404;
    #[NoReturn]
    public static function abort(): void
    {
        /*exit('Un problème technique est survenu suite à votre requête'); il fesait que donner un mesage en dur*/
        http_response_code($code);

        $codepth = __DIR__ . "/../resources/views/codes/{$code}.view.php";

        if (file_exists($codepth)) {
            require $codepth;
        } else {

            exit("Erreur {$code} : il y a eu une erreure");
        }

        exit;
    }

    #[NoReturn]
    public static function redirect(string $url): void
    {
        http_response_code(self::SEE_OTHER);
        header("Location: $url");
        exit;
    }

    #[NoReturn]
    public static function back(): void
    {
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/';
        self::redirect($previousUrl);
    }
}
