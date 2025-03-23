<?php

namespace Tecgdcs;


class Response
{
    const SEE_OTHER = 303;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const NOT_FOUND = 404;
    const SERVER_ERROR = 500;

    public static function abort($code = self::NOT_FOUND)
    {
        http_response_code($code);
        require CODES.$code.'view.php';
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
        self::abort(self::SERVER_ERROR);
        exit;
    }

    public static function back(): void
    {
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/';
        self::abort(self::SERVER_ERROR);
        self::redirect($previousUrl);
    }
}
