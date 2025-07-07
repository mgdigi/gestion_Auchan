<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Service\CommandeService;


class CommandeController extends AbstractController{

    private CommandeService $commandeService;
   

    public function __construct(){
        $this->commandeService = CommandeService::getInstance();
    }

    public function index(){
        $type = self::get('user', 'typePerson');
        $id = self::get('user', 'id');

        if($type == 'VENDEUR'){
        $commandes = $this->commandeService->getByVendeur($id);
        }else if($type == 'CLIENT'){
        $commandes = $this->commandeService->getByClient($id);
        }else{
            $commandes = [];
        }
        $this->render("commande/index.html.php",  ["commandes" => $commandes]);;
    }

    public function create(){
        $this->render("commande/form.html.php");
      
    }

    public function store(){
        header("Location:". $_ENV['APP_URL']. "/facture");      
    }

    public function  edit(){}

    public function show(){
        
    }
   
}