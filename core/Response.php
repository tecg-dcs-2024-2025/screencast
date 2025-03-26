<?php

namespace Tecgdcs;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    const int BAD_REQUEST = 400;
    const int NOT_FOUND = 404;
    const int SEE_OTHER = 303;
    const int SERVER_ERROR = 500;
    const int UNAUTHORIZED = 401;

    #[NoReturn]
    public static function abort($code): void
    {
        /* exit('Un problème technique est survenu suite à votre requête'); */

        if ($code !== null) {
            switch ($code) {
                case self::BAD_REQUEST:
                    $message = 'Mauvaise requête';
                    break;

                case self::NOT_FOUND:
                    $message = 'Page non trouvée';
                    break;

                case self::SEE_OTHER:
                    $message = 'Redirection';
                    break;

                case self::SERVER_ERROR:
                    $message = 'Erreur serveur interne';
                    break;

                case self::UNAUTHORIZED:
                    $message = 'Accès non autorisé';
                    break;

                default:
                    $message = 'Erreur inconnue';
                    break;
            }
            $GLOBALS['http_response_code'] = $code;
        } else {
            $code = ($GLOBALS['http_response_code'] ?? self::NOT_FOUND);
        }

        http_response_code($code);

        include __DIR__.'/../views/codes/error.view.php';
        exit;
    }

    #[NoReturn]
    public static function redirect(string $url): void
    {
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
