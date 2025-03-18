<?php


use Tecgdcs\Response;

if (!function_exists("redirect")) {
    function redirect(string $url)
    {
        Response::redirect($url);
    }
}

if (!function_exists("back")) {
    function back()
    {
        Response::back();
    }
}