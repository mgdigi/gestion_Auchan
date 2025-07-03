<?php
namespace App\Repository;
use App\Core\Database;

class FactureRepository{
    private $table = "facture";
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    

 
}