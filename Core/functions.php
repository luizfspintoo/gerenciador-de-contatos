<?php

use Core\Flash;
use Core\Request;
use Core\Session;

function base_path($path)
{
    return __DIR__.'/../'.$path;
}

function view($view, $data = [], $template = 'app')
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    require base_path("views/template/{$template}.php");
}

function abort($code)
{
    http_response_code($code);
    view($code);
    exit;
}

function dd(...$params)
{
    echo '<pre>';
    var_dump($params);
    echo '</pre>';
    exit;
}

// function flash()
// {
//     return new Flash;
// }

// function session()
// {
//     return new Session;
// }

function config($chave = null)
{
    $config = require base_path('config/config.php');
    if ($chave) {
        return $config[$chave];
    }

    return $config;
}

function auth()
{
    if (! isset($_SESSION['auth'])) {
        return false;
    }

    return $_SESSION['auth'];
}

function old($campo)
{
    $post = $_POST;

    if ($post) {
        return $post[$campo];
    }

    return '';
}

function redirect($uri)
{
    header("Location: /{$uri}");
}

function request()
{
    return new Request;
}

// function env($key)
// {
//     $env = parse_ini_file(base_path('.env'));

//     return $env[$key];
// }

// define('ALGORITMO', 'aes-256-cbc');
// define('CHAVE_SECRETA', hash('sha256', env('KEYENCRIPT')));

// function encrypt($texto)
// {
//     $ivLength = openssl_cipher_iv_length(ALGORITMO); // Normalmente 16 bytes
//     $iv = openssl_random_pseudo_bytes($ivLength);

//     $criptografado = openssl_encrypt($texto, ALGORITMO, CHAVE_SECRETA, 0, $iv);

//     return base64_encode($iv.$criptografado);
// }

// function decrypt($entrada)
// {
//     $dados = base64_decode($entrada);
//     $ivLength = openssl_cipher_iv_length(ALGORITMO);

//     $iv = substr($dados, 0, $ivLength);
//     $criptografado = substr($dados, $ivLength);

//     return openssl_decrypt($criptografado, ALGORITMO, CHAVE_SECRETA, 0, $iv);
// }
