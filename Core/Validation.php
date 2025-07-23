<?php

namespace Core;

use App\Models\User;

class Validation
{
    public $validations = [];

    public static function validate($rules, $data)
    {
        $validation = new Validation();

        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                $validation->$rule($field, $data[$field], $data);
            }
        }

        return $validation;
    }

    private function required($field, $value) {
        if(strlen(trim($value)) == 0) {
            $this->addError($field, "{$field} é obrigatório");
        }
    }

    private function email($field, $value) {
        if(! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, "{$field} deve ser valido");
        }
    }

    private function min($field, $value)
    {
        if (strlen($value) < 3) {
            $this->addError($field, "O campo $field deve ter pelo menos 6 caracteres.");
        }
    }

    private function max($field, $value)
    {
        if (strlen($value) > 255) {
            $this->addError($field, "O campo $field deve ter até 255 caracteres.");
        }
    }

    private function unique($field, $value)
    {
        $user = User::getUser($value);

        if ($user) {
            $this->addError($field, "Já existe uma conta cadastrada");
        }
    }

    private function confirmed($field, $value, $data)
    {
        if($value != $data["password_confirmed"]) {
            $this->addError($field, "As senhas são diferentes");
        }
    }

    private function addError($filed, $error) {
        return $this->validations[$filed][] = $error;
    }

    public function validationFailed($personalizedName = null) {
        $key = "validations";

        if($personalizedName) {
            $key .= "_". $personalizedName;
        }

        flash()->push($key, $this->validations);
        return count($this->validations) > 0;
    }
}
