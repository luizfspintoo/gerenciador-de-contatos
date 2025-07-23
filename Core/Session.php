<?php

namespace Core;

class Session
{
    public function push($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (! isset($_SESSION[$key])) {
            return false;
        }

        $value = $_SESSION[$key];

        return $value;
    }

    public function forget($key)
    {
        unset($_SESSION[$key]);
        return false;
    }
}
