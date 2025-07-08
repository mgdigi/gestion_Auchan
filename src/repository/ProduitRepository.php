<?php

namespace App\Repository;
use App\Core\AbstractRepository;
use App\Core\Database;

class ProduitRepository extends AbstractRepository{

    private $table = "produit";

    private static  ProduitRepository|null $instance = null;

    

    public static function getInstance():ProduitRepository{
        if(self::$instance === null){
            self::$instance = new ProduitRepository();
        }
        return self::$instance;
    }

    public function __construct() {
        parent::__construct();
    }

    public function getAll(){
        $query = "SELECT * FROM $this->table";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function selectAll(){}
    
    public function insert(){}

    public function update(){}
    public function delete(){}
    public function selectById(){}
    public function selectBy(array $filter){}


}