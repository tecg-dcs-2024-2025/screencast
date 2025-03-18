<?php

namespace Tecgdcs;

use Tecgdcs\Exception\ValidationRulesNotFoundException;

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
        $collection = require __DIR__.'/../config/'.$collection_name.'.php';
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

    public static function check(array $constraints): void
    {
        try{
            self::parse_constraints($constraints);
        } catch(ValidationRulesNotFoundException $exception){
            die($exception->getMessage());
        }
        if (isset($_SESSION['errors'])) {
            $_SESSION['old'] = $_REQUEST;
            Response::back();
        }
    }

    private static function parse_constraints(array $constraints): void
    {
        $method = $param1 = $param2 = '';
        foreach ($constraints as $field_name => $rules) {
            $array_rules = explode('|', $rules);
        }
        foreach ($array_rules as $method) {
            info($method);
            if (str_contains($method, ':')) {
                [$method, $param1] = explode(':', $method);
            }
            if (!method_exists(__CLASS__, $method)) {
                throw new ValidationRulesNotFoundException('La règle'.$method.' n’existe pas');
            }
            self::$method($field_name, $param1);
        }
    }
}

