<?php

namespace Tecgdcs;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    const int SEE_OTHER = 303;
    const int BAD_REQUEST = 400;
    const int NOT_FOUND = 404;
    const int UNAUTHORIZED = 401;
    const int SERVER_ERROR = 500;

    #[NoReturn]
    public static function abort($errorCode = self::NOT_FOUND): void
    {
        http_response_code($errorCode);

        $path = __DIR__ . "/../resources/views/codes/{$errorCode}.view.php";

        if (file_exists($path)) {
            include $path;
        } else {
            include __DIR__ . "/../resources/views/codes/404.view.php";
        }

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
