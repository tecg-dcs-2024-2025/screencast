<?php

namespace Tecgdcs;


class Validator
{

    public static function required(string $field_name): bool
    {
        global $messages;
        if (!array_key_exists($field_name, $_REQUEST) || trim($_REQUEST[$field_name]) === '') {
            $_SESSION['errors'][$field_name] = sprintf($messages['required'], $field_name);
            return false;
        }

        return true;
    }


    public static function email(string $field_name): bool
    {
        global $messages;
        if (array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            !filter_var(trim($_REQUEST[$field_name]), FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][$field_name] = sprintf($messages['email'], $field_name);
            return false;
        }

        return true;
    }


    public static function phone(string $field_name): bool
    {
        if (array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            (strlen($_REQUEST[$field_name]) < 9 ||
                !is_numeric(str_replace(['+', '(', ')', ' '], '', $_REQUEST[$field_name])))
        ) {
            global $messages;
            $_SESSION['errors'][$field_name] = sprintf($messages['phone'], $field_name);
            return false;
        }

        return true;
    }


    public static function same(string $verification_field_name, string $original_field_name): bool
    {
        if (array_key_exists($verification_field_name, $_REQUEST) &&
            array_key_exists($original_field_name, $_REQUEST)) {
            global $messages;
            if (trim($_REQUEST[$verification_field_name]) !== trim($_REQUEST[$original_field_name])) {
                $_SESSION['errors'][$verification_field_name] =
                    sprintf($messages['same'], $verification_field_name, $original_field_name);
                return false;
            }
            return true;
        }

        return false;
    }


    public static function in_collection(string $field_name, string $collection_name, array $collection): bool
    {
        if (array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            !array_key_exists($_REQUEST[$field_name], $collection)) {
            global $messages;
            $_SESSION['errors'][$field_name] =
                sprintf($messages['in_collection'], $field_name, $collection_name);
            return false;
        }

        return true;
    }

    public static function check(array $rules, array $countries)
    {
        self::parse_constraints($rules,$countries);

        //Analyser les contraintes définies dans l’array
        //À partir de cette analyse appeler les méthodes de validation correspondantes

        if (isset($_SESSION['errors'])) {
            $_SESSION['old'] = $_REQUEST;
            header('Location: /index.php');
            exit;
        }
    }

    private static function parse_constraints(array $rules, array $countries): void
    {

        foreach ($rules as $fieldName => $rule) { // Je boucle le tableau Validator::check qui est rules
            $datas = explode('|', $rule); // ici, je sépare required et email, j'obtiens un nouveau tableau
            foreach ($datas as $to_call) {
                if (method_exists(__CLASS__, $to_call)) { //je vérifie qu'il y ait bien une méthode (__CLASS__ est une constante magique qui contient le nom de la classe actuelle)
                    self::$to_call($fieldName);// self:: permet d'appeler des méthodes statiques dans la même classe.
                } else if ($to_call === "same:email") { // je vérifie le cas de la vérification
                    $data = explode(':', $to_call); // je sépare same:email
                    foreach ($data as $call) {
                        if (method_exists(__CLASS__, $call)) {
                            self::$call($fieldName, 'email'); //On a besoin ici de deux valeurs
                        }
                    }
                } else if ($to_call === "in_collection:countries") {  // je vérifie le cas du choix du pays
                    $data = explode(':', $to_call);
                    if (method_exists(__CLASS__, $data[0])) {
                        self::in_collection($fieldName, 'email', $countries); // j'ai rajouté le tableau des pays dans Validator::check pour l'utiliser ici
                    }
                }
            }

        }
    }
}

