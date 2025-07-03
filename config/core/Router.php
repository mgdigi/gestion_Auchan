<?php

namespace App\Core;
use App\Core\Error404Controller;

class Router{

    public static function resolve($uris){
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $currentUri = trim($requestUri, ''); 
        

    
    if (isset($uris[$currentUri])) {
        $route = $uris[$currentUri];
        $controllerClass = $route['controller'];
        $method = $route['method'];
        
        
        $controller = new $controllerClass();
        $controller->$method();
    } else {
        $errorController = new Error404Controller();
        $errorController->index();
    }
    }


 
}