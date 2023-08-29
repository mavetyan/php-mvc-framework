<?php

namespace Core;

use Config\Config;

class Route {
    private static $routes = [];

    /**
     * Register a GET route.
     *
     * @param string $path The URL path.
     * @param array $action The controller and method to handle this route.
     */
    public static function get($path, $action) {
        self::$routes['GET'][$path] = $action;
    }

    // Additional static methods for other HTTP verbs (post, put, delete, etc.) can be added here...

    /**
     * Dispatch the current request to the appropriate controller and method.
     */
    public static function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '/';
        
        // Remove the base path from the URL path
        $basePath = Config::BASE_PATH();
        $path = str_replace($basePath, '', $path);
        // Ensure that $path always has at least a leading slash
        $path = '/' . ltrim($path, '/');
    
        if (isset(self::$routes[$method][$path])) {
            $controller = new self::$routes[$method][$path][0]();
            $method = self::$routes[$method][$path][1];
            call_user_func_array([$controller, $method], []);
        } else {
            // Handle not found (e.g., show a 404 page or redirect)
        }
    }
}
?>
