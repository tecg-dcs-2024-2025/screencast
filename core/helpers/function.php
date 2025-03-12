<?php
function csrf(): void
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
    echo <<<HTML
<input type="hidden" name="_csrf" value="{$_SESSION['token']}">
HTML;

}