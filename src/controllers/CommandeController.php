<?php

namespace App\Controller;

use App\Core\AbstractController;


class CommandeController extends AbstractController{

    public function index(){
        parent::render("commande/index.html.php");
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


   
}