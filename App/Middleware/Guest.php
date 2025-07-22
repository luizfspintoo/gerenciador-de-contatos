<?php

namespace App\Middleware;

class Guest
{
    //A função handle() é o ponto de entrada padrão do middleware.
    public function handle()
    {
        if (auth()) {
            return redirect("dashboard");
        }
    }
}