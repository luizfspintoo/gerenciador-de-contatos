<?php

namespace App\Controllers;


class HomeController
{
    public function __invoke()
    {
        return redirect("login");
    }
}
