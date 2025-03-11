<?php

namespace Tecgdcs\helpers;

class Csrf
{

    public static function generateToken(): string
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $token = bin2hex(random_bytes(16));
        $_SESSION['token'] = $token;

        return '<input type="hidden" name="csrf_token" value="' . ($token) . '">';
    }

    public static function checkToken(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!isset($_POST['token'])) {
                echo "Erreur : requête invalide";
                exit;
            }
        }
    }
}