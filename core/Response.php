<?php

namespace Tecgdcs;

class Response
{
    public static function abort()
    {
        die('oups, un problème s’est produit');
    }
}