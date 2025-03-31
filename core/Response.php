<?php

namespace Tecgdcs;


class Response
{
    public const SEE_OTHER = 303;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const NOT_FOUND = 404;
    public const SERVER_ERROR = 500;

    public static function abort($code = self::NOT_FOUND)
    {
        http_response_code($code);
        require "./../resources/views/codes/$code.view.php";
        exit;
    }

    public static function redirect(string $url): void
    {
        http_response_code(self::SEE_OTHER);
        header("Location: $url");
        exit;
    }

    public static function back(): void
    {
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/';
        self::redirect($previousUrl);
    }
}
