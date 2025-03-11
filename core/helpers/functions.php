<?php
function generate_csrf(): void
{
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] =  $token;
    echo $token;
}

function validate_csrf(): bool
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_REQUEST['csrf'] === $_SESSION['csrf_token']) {
        return true;
    } else {
        die('CSRF token is invalid');
    }
}