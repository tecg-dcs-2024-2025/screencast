<?php
function csrf()
{
    $bytes = random_bytes(32);
    return bin2hex($bytes);
}
/*var_dump(csrf());die();*/