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
    public static function abort($code = self::NOT_FOUND): void
    {
        http_response_code($code);

        $viewPath = __DIR__ . "/../resources/views/redirectioncodes/{$code}.view.php";

        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            include __DIR__ . "/../resources/views/redirectioncodes/404.view.php";
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
