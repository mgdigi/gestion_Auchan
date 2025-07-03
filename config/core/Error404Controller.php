<?php
namespace App\Core;

class Error404Controller{
    public function index(){
        require_once "../config/error404.php";
    }
}