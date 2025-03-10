<?php
/**
 * Un bac à sable pour tester le fonctionnement de certaines fonctions PHP
 */


$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
echo '<input type="hidden" name="csrf_token" value="'.$token.'">';