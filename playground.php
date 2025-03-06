<?php
/**
 * Un bac à sable pour tester le fonctionnement de certaines fonctions PHP
 */

$bytes = bin2hex(random_bytes(32));
echo $bytes;

$token = $_POST["csrf_token"] ?? "";
