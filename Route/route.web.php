<?php 

use App\Controller\CommandeController;
use App\Controller\FactureController;
use App\Controller\SecurityController;

$routes = [
    '/' => ['controller' => SecurityController::class, 'method' => 'index'],
    '/lister' => ['controller' => CommandeController::class, 'method' => 'index'],
    '/form' => ['controller' => CommandeController::class, 'method' => 'create'],
    '/createCommande' => ['controller' => CommandeController::class, 'method' => 'store'],
    '/facture' => ['controller' => FactureController::class, 'method' => 'store'],
    "/login" => ['controller' => SecurityController::class, 'method' => 'login'],
    "/logout" => ['controller' => SecurityController::class, 'method' => 'logout'], 
];

