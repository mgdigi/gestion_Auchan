<?php

namespace App\Core;


use App\Core\Error404Controller;

class Router{

    public static function resolve($uris){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $currentUri = trim($requestUri, ''); 
        
        if (isset($uris[$currentUri])) {
            $route = $uris[$currentUri];
            $controllerClass = $route['controller'];
            $method = $route['method'];
            $middlewares = $route['middlewares'] ?? null;

            $verifs = [
                'isLoggedIn' => isLoggedIn(),
                'isVendeur' => isVendeur(),
                'isClient' => isClient(),
            ];

            if ($middlewares) {
                foreach ($middlewares as $middleware) {
                    if (!isset($verifs[$middleware]) || !$verifs[$middleware]) {
                        header("Location: /");
                        exit;
                    }
                }
            }

            $controller = new $controllerClass();
            $controller->$method();
        } else {
            $errorController = new Error404Controller();
            $errorController->index();
        }
    }
}
