<?php

namespace App\Controllers\Contacts;

use Core\Validation;

class ContactEncryptionController
{
    public function showInfo() {
        session()->push("show", true);

        $senha = request()->post("password");

        $validation = Validation::validate([
            "password" => ["required"]
        ], request()->all());

        if($validation->validationFailed("show")) {
            return view("dashboard", template:"app");
        }

        if(! password_verify($senha, auth()->password)) {
            flash()->push('validations_show', ['senha' => ['Senha incorreta']]);
            return view("dashboard", template:"app");
        }

        redirect("dashboard");
    }

    public function hideInfo() {
        session()->forget("show");
        redirect("dashboard");
    }
}
