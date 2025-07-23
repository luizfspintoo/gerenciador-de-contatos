<?php

namespace App\Models;

use Core\Database;

class Contact
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $user_id;
    public $image;

    public static function all($search = null)
    {
        return (new Database(config("database")))->query(
            query: "SELECT * FROM contacts WHERE (name LIKE :search OR phone LIKE :search) 
                AND user_id = :user_id",
            class: Contact::class,
            params: [
                "search" => "%{$search}%",
                "user_id" => auth()->id
            ]
        )->fetchAll();
    }

    public static function getContact($id)
    {
        return (new Database(config("database")))->query(
            query: "SELECT * FROM contacts WHERE id = :id AND user_id = :user_id",
            class: Contact::class,
            params: [
                "id" => $id,
                "user_id" => auth()->id
            ]
        )->fetch();
    }

    public static function createContact($name, $email, $phone)
    {
        return (new Database(config("database")))->query(
            query: "INSERT INTO contacts (name, email, phone, user_id) VALUES (:name, :email, :phone, :user_id)",
            class: Contact::class,
            params: [
                "name" => $name,
                "phone" => $phone,
                "email" => $email,
                "user_id" => auth()->id
            ]
        );
    }

    public static function updateContact($name, $email, $phone, $image, $id)
    {
        return (new Database(config("database")))->query(
            query: "UPDATE contacts SET name = :name, email = :email, phone = :phone, user_id = :user_id, image = :image WHERE id = :id AND user_id = :user_id",
            class: Contact::class,
            params: [
                "name" => $name,
                "phone" => $phone,
                "email" => $email,
                "image" => $image,
                "id" => $id,
                "user_id" => auth()->id
            ]
        );
    }

     public static function deleteContact($id)
    {
        return (new Database(config("database")))->query(
            query: "DELETE FROM contacts WHERE id = :id AND user_id = :user_id",
            class: Contact::class,
            params: [
                "id" => $id,
                "user_id" => auth()->id
            ]
        );
    }

    //encryption e decryption
    public function showContent($attribute) {
        if(session()->get("show")) {
            return decrypt($this->$attribute);
        }

        return str_repeat('*', 20);
    }
}
