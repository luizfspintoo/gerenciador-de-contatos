<?php

namespace App\Controllers;

class RegisterController
{
    public function index()
    {
        return view("auth/register", template: "guest");
    }
}
