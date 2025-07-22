<?php

namespace App\Models;

use Core\Database;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;

    public static function all()
    {
        return (new Database(config("database")))->query(
            query: "SELECT * FROM users",
            class: User::class,
            params: []
        )->fetchAll();
    }

    public static function getUser($email)
    {
        return (new Database(config("database")))->query(
            query: "SELECT * FROM users WHERE email = :email",
            class: User::class,
            params: [
                "email" => $email
            ]
        )->fetch();
    }

    public static function createUser($name, $email, $password) {
        return (new Database(config("database")))->query(
            query: "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)",
            class: User::class,
            params: [
                "name" => $name,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT)
            ]
        );
    }
}
