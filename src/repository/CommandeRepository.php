<?php
namespace App\Repository;

use App\Core\Database;
use App\Entity\Commande;

class CommandeRepository
{
    private $table = "commande";
    private Database $db;
    private static CommandeRepository|null $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new CommandeRepository();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY date DESC";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $commandes = [];
        foreach ($results as $row) {
            $commande = new Commande();
            $commandes[] = $commande->toObject($row);
        }
        return $commandes;
    }

    
}
