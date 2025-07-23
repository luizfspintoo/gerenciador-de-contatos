<?php

namespace App\Controllers\Contacts;

use App\Models\Contact;
use Core\Validation;

class ContactController
{
    public function create()
    {
        $name = request()->post("name");
        $email = request()->post("email");
        $phone = request()->post("phone");

        $validation = Validation::validate([
            "name" => ["required", "min"],
            "email" => ["required", "min"],
            "phone" => ["required"],
        ], request()->all());

        if ($validation->validationFailed()) {
            flash()->push("validations", $validation->validations);
            return view("dashboard", template: "app");
        }

        Contact::createContact($name, $email, $phone);
        flash()->push("message", "Contato criado com sucesso");
        return redirect("dashboard");
    }

    public function show() {
        $id = request()->get("id");
        $contact = Contact::getContact($id);

        return view("contacts/show", [
            "contact" => $contact
        ]);
    }

    public function update() {
        $name = request()->post("name");
        $email = request()->post("email");
        $phone = request()->post("phone");
        $image = $_FILES["image"];
        $id = request()->post("id");

        $validation = Validation::validate([
            "name" => ["required", "min"],
            "email" => ["required", "min"],
            "phone" => ["required"],
        ], request()->all());

        if ($validation->validationFailed()) {
            flash()->push("validations", $validation->validations);
            return view("contacts/show", template: "app");
        }
        
        $result = uploadImage($image);

        Contact::updateContact($name, $email, $phone, $result, $id);
        flash()->push("message", "Contato atualizado com sucesso");
        return redirect("dashboard");
    }

    public function destroy() {
        $id = request()->post("id");
        Contact::deleteContact($id);
        flash()->push("message", "Contato deletado com sucesso");
        return redirect("dashboard");
    }
}
