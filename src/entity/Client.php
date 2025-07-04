<?php

namespace App\Entity;

class Client  extends Person{
  
    private string $telephone;

    private array|null $commandes;

    public function  __construct($id= 0, $nom = '', $typePerson = TypePerson::CLIENT, $telephone= ''){
        parent::__construct($id, $nom, $typePerson = TypePerson::CLIENT);;
        $this->telephone = $telephone;
        $this->commandes = [];
    }


    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

     /**
     * Get the value of commandes
     */ 
    public function getCommandes()
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande){
        $this->commandes[] = $commande;
    }

    public static function toObject(array $data):static{
        $client =  new static(
         $data['id'],
         $data['nom'],
         $data['typePerson'],
         $data['telephone'],
        );
        $commandes = array_map(fn($commande) => Commande::toObject($commande), $data['commandes']);

        foreach ($commandes as $commande) {
            $client->addCommande($commande);
        }
        
        return $client;
        
    }

    public function toArray():array{
        return parent::toArray() + [
            'telephone' => $this->telephone,
            'commandes' => array_map(fn($commande) => $commande->toArray(), $this->commandes)
        ];

    }

   
}