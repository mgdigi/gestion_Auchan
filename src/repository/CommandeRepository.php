<?php
namespace App\Repository;

use App\Core\AbstractRepository;
use App\Core\Database;
use App\Entity\Commande;

class CommandeRepository extends AbstractRepository
{
    private $table = "commande";
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
        parent::__construct();
    }

    public function selectAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY date DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $commandes = [];
        foreach ($results as $row) {
            $commande = new Commande();
            $commandes[] = $commande->toObject($row);
        }
        return $commandes;
    }

    public function insert(){}

    public function update(){}
    public function delete(){}
    public function selectById( ){
    }
    public function selectBy(array $filter){
    }

    public function selectByVendeur(int $id_vendeur){
    $query = "SELECT *, c.nom as client_nom FROM $this->table join person c on commande.client_id = c.id  WHERE commande.vendeur_id = :id_vendeur";
    $stmt = $this->pdo->prepare($query);
    
    $stmt->bindValue(":id_vendeur", $id_vendeur);
    $stmt->execute();
    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    $commandes = [];
    foreach($results as $result){
        $commandes[] = Commande::toObject($result); 
    }
    
    return $commandes;
}

  public function selectByClient(int $id_client){
    $query = "SELECT *, c.nom as vendeur_nom FROM $this->table join person c on commande.vendeur_id = c.id  WHERE commande.client_id = :id_client";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id_client", $id_client);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $commandes = [];
        foreach($results as $result){
            $commandes[] = Commande::toObject($result);
        }

        return $commandes;
    }
    
}
