<?php

namespace Tecgdcs\concerns;

use Random\RandomException;

trait View
{
    /**
     * @throws RandomException
     */
    public function compileCsrfToken(): string
    {
        $csrfToken = $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        return <<<HTML
<input name="_csrf" type="hidden" value="{$csrfToken}">
HTML.PHP_EOL;
    }
}