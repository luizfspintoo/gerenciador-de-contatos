<?php

namespace App\Controllers;

use App\Models\User;
use Core\Validation;

class RegisterController
{
    public function index()
    {
        return view("auth/register", template: "guest");
    }

    public function register()
    {
        $name = request()->post("name");
        $email = request()->post("email");
        $password = request()->post("password");

        $validation = Validation::validate([
            "name" => ["required"],
            "email" => ["required", "email", "unique"],
            "password" => ["required", "min", "confirmed"]
        ], request()->all());

        if ($validation->validationFailed()) {
            flash()->push("validations", $validation->validations);
            return view("auth/register", template: "guest");
        }

        //create a user
        User::createUser($name, $email, $password);

        flash()->push("message", "Usuario cadastrado com sucesso");
        return redirect("login");
    }
}
