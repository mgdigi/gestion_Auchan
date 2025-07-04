<?php

namespace App\Repository;
use App\Core\AbstractRepository;
use App\Core\Database;
use App\Entity\Vendeur;

class PersonRepository extends AbstractRepository{
    private $table = "person";
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function selectAll(){}
    
    public function insert(){}

    public function update(){}
    public function delete(){}
    public function selectById(){}
    public function selectBy(array $filter){}

    public function selectByLoginAndPassword(string $login, string $passwors): null|Vendeur{
        $query = "SELECT * FROM $this->table WHERE login = :login AND password = :password";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute([
            'login' => $login,
            'password' => $passwors
        ]);
        
        $result = $stmt->fetch();
        if($result){
            return Vendeur::toObject($result);
        }
        return null;
        
    }




    public function getClients(){
        $query = "SELECT * FROM $this->table where typePerson = 'CLIENT'";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    
}