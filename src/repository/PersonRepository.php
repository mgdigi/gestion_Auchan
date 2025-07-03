<?php

namespace App\Repository;
use App\Core\Database;

class PersonRepository{
    private $table = "person";
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getClients(){
        $query = "SELECT * FROM $this->table where typePerson = 'CLIENT'";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}