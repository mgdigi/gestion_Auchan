<?php

namespace App\Repository;
use App\Core\Database;

class ProduitRepository{

    private $table = "produit";

    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getAll(){
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


}