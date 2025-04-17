<?php

namespace Tecgdcs;

use eftec\bladeone\BladeOne;

class View extends BladeOne
{
    use \Tecgdcs\Concerns\View;

    private const VIEW_DIR = __DIR__.'/../resources/views';
    private const CACHE_DIR = __DIR__.'/../storage/cache';

    public static function make(string $template, array $data)
    {
        echo new self(self::VIEW_DIR, self::CACHE_DIR, self::MODE_DEBUG)
            ->run($template, $data);
    }
}