<?php
class Router {
    private $routes = [];

    public function add($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function run() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (array_key_exists($path, $this->routes)) {
            call_user_func($this->routes[$path]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    // Add redirect functionality to Router class
    public function redirect($url) {
        header("Location: $url");
        exit(); // Ensure the script stops after the redirect
    }
}

