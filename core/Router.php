<?php

class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->addRoute('POST', $path, $callback);
    }

    private function addRoute($method, $path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function dispatch($method, $path)
    {
        $callback = $this->routes[$method][$path] ?? null;

        if (!$callback) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        if (is_array($callback)) {
            [$className, $methodName] = $callback;
            require_once __DIR__ . '/../controller/' . $className . '.php';
            $controller = new $className();
            $controller->$methodName();
        } else {
            call_user_func($callback);
        }
    }
}
