<?php

namespace App\Controllers;

use App\Models\Contact;

class DashboardController
{
    public function index()
    {
        $contacts = Contact::all(request()->get("search"));
        return view("dashboard", [
            "contacts" => $contacts
        ]);
    }
}
