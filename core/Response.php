<?php

namespace Tecgdcs;

class Response
{
    public static function abort()
    {
        die('Oups, on dirait bien qu’il y a eu un problème');
    }
}