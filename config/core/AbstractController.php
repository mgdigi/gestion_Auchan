<?php

namespace App\Core;
abstract class AbstractController{
    abstract public function index();
    abstract public function create();
    abstract public function store();
    abstract public function edit();
    abstract public function destroy();
    abstract public function show();

    public function render(string $views){
        ob_start();
        require_once '../template/'.$views;
        $contentForLayout = ob_get_clean();
        require_once '../template/layout/base.layout.php';
    }

}