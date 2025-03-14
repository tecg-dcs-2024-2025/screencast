<?php

namespace Tecgdcs;

class Response
{
    public static function abort()
    {
        die('Oups, un problème technique est survenu !');
    }
}