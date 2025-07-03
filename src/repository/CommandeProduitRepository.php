<?php

namespace App\Repository;

use App\Core\Database;

class CommandeProduitRepository{

    private $table = "commandeProduit";

    private $db;


    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getAll(){
        $sql = "select * from $this->table";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $commandeProduits = [];
        foreach ($results as $row) {
            $commandeProduit = new $commandeProduit();
            $commandeProduits[] = $commandeProduit->toObject($row);
        }
        return $commandeProduits;
    }

    public function create($commandeProduit){
        $sql = "INSERT INTO $this->table (commande_id, produit_id, quantite) VALUES (:commande_id, :produit_id, :quantite)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $params =[
            'commande_id' => $commandeProduit->getCommande()->getId(),
            'produit_id' => $commandeProduit->getProduit()->getId(),
            'quantite' => $commandeProduit->getQuantite()
        ];

        $result = $stmt->execute($params);

        if($result){
            $lastId = $this->db->getConnection()->lastInsertId();
            $commandeProduit->setId($lastId);
            return $lastId;
        }
        return false;

    }

}