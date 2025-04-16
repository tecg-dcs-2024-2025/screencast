<?php

namespace Tecgdcs\Concerns;

trait View
{
    public function compileCsrfToken()
    {
        $csrf_token = $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        return <<<PHP
    <?php echo '<input name="_csrf" type="hidden" value="{$csrf_token}">'.PHP_EOL ?>
    PHP;
    }
}