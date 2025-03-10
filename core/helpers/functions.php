<?php

function csrf_token(): void
{
    $_SESSION['csrf_token'] = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));

    echo <<<HTML
        <input type="hidden" name="_csrf" value="{$_SESSION['csrf_token']}">
    HTML;
}