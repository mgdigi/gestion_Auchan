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
        $commandes = $this->commandeService->getAll();
        $this->render("commande/index.html.php",  ["commandes" => $commandes]);;
    }

    public function create(){
        $this->render("commande/form.html.php");
      
    }

    public function store(){
        header("Location: http://localhost:8085/facture");      
    }

    public function  edit(){}

    public function show(){}

    public function destroy(){}

    public function render(string $views, array $data = []){
        extract($data);
        ob_start();
        require_once '../template/'.$views;
        $contentForLayout = ob_get_clean();
        require_once '../template/layout/base.layout.php';
    }

    


   
}