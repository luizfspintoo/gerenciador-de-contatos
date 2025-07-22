<?php 

namespace Core;

class Request {
    public function get($key, $value = null) {
        return isset($_GET[$key]) ?  $_GET[$key] : $value;
    }

    public function post($key, $value = null) {
        return isset($_POST[$key]) ?  $_POST[$key] : $value;
    }

    public function all($key, $value = null) {
        return isset($_REQUEST[$key]) ?  $_REQUEST[$key] : $value;
    }
}

?>