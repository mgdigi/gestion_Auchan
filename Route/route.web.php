<?php 

use App\Controller\CommandeController;
use App\Controller\FactureController;

$routes = [
     '/' => ['controller' => CommandeController::class, 'method' => 'index'],
    '/lister' => ['controller' => CommandeController::class, 'method' => 'index'],
    '/form' => ['controller' => CommandeController::class, 'method' => 'create'],
    '/createCommande' => ['controller' => CommandeController::class, 'method' => 'store'],
    '/facture' => ['controller' => FactureController::class, 'method' => 'store'],
];

