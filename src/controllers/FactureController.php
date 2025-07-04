<?php

namespace App\Controller;

use App\Core\AbstractController;

class FactureController extends AbstractController{

    public function store(){
        $this->render('commande/resume.html.php');
    }
    public function index(){
    }

    public function create(){
    }

    public function show(){
    }

    public function edit(){
    }

    public function destroy(){}

    public function render(string $views, array $data = []){
        extract($data);
        ob_start();
        require_once '../template/'.$views;
        $contentForLayout = ob_get_clean();
        require_once '../template/layout/base.layout.php';
    }



}