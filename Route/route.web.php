<?php

use App\Controller\CommandeController;
use App\Controller\FactureController;
use App\Controller\SecurityController;

$routes = [
    '/' => [
        'controller' => SecurityController::class, 
        'method' => 'index'
    ],
    '/lister' => [
        'controller' => CommandeController::class, 
        'method' => 'index',
        'middlewares' => ['isLoggedIn', 'isVendeur'] 
    ],
    '/form' => [
        'controller' => CommandeController::class, 
        'method' => 'create',
        'middlewares' => ['isLoggedIn'] 
    ],
    '/createCommande' => [
        'controller' => CommandeController::class, 
        'method' => 'store',
        'middlewares' => ['isLoggedIn'] 
    ],
    '/facture' => [
        'controller' => FactureController::class, 
        'method' => 'store',
        'middlewares' => ['isLoggedIn'] 
    ],
    "/login" => [
        'controller' => SecurityController::class, 
        'method' => 'login'
    ],
    "/logout" => [
        'controller' => SecurityController::class, 
        'method' => 'logout'
    ],
];
