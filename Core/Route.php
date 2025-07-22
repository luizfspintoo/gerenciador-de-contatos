<?php

namespace Core;

class Route
{
    private $routes = [];

    public function addRoute($httpMethod, $uri, $controller, $middleware = null)
    {
        if (is_string($controller)) {
            $data = [
                "class" => $controller,
                "method" => "__invoke",
                "middleware" => $middleware
            ];
        }

        if (is_array($controller)) {
            $data = [
                "class" => $controller[0],
                "method" => $controller[1],
                "middleware" => $middleware
            ];
        }


        $this->routes[$httpMethod][$uri] = $data;
        return $this;
    }

    //https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Reference/Methods

    public function get($uri, $controller, $middleware = null)
    {
        $this->addRoute("GET", $uri, $controller, $middleware);
        return $this;
    }

    public function post($uri, $controller, $middleware = null)
    {
        $this->addRoute("POST", $uri, $controller, $middleware);
        return $this;
    }

    public function put($uri, $controller, $middleware = null)
    {
        $this->addRoute("PUT", $uri, $controller, $middleware);
        return $this;
    }

    public function delete($uri, $controller, $middleware = null)
    {
        $this->addRoute("DELETE", $uri, $controller, $middleware);
        return $this;
    }

    public function run()
    {
        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        $httpMethod = request()->post("__method", $_SERVER["REQUEST_METHOD"]);

        if (! isset($this->routes[$httpMethod][$uri])) {
            abort(404);
        }

        $routerInfo = $this->routes[$httpMethod][$uri];
        $class = $routerInfo['class'];
        $method = $routerInfo['method'];
        $middleware = $routerInfo['middleware'];

        if ($middleware) {
            (new $middleware)->handle();
        }

        $c = new $class;
        $c->$method();
    }
}
