<?php

namespace App\Controllers;

use App\Models\User;
use Core\Validation;

class LoginController {
    public function index()
    {
        return view("auth/login", template: "guest");
    }

    public function login() {
        $email = request()->post("email");
        $password = request()->post("password");

        $validation = Validation::validate([
            "email" => ["required"],
            "password" => ["required"],
        ], request()->all());

        if ($validation->validationFailed()) {
            flash()->push("validations", $validation->validations);
            return view("auth/login", template: "guest");
        }

        $user = User::getUser($email);

        if(! $user || ! password_verify($password, $user->password)) {
            flash()->push("validations", ["email" => ["Usuario ou senha incorretos"]]);
            return view("auth/login", template: "guest");
        }

        $_SESSION["auth"] = $user;
        return redirect("dashboard");
    }

    public function logout() {
        session_destroy();
        return redirect("login");
    }
}
