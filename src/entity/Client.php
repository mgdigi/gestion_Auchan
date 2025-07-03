<?php

namespace App\Entity;

class Client  extends Person{
  
    private string $telephone;

    private array|null $commandes;

    public function  __construct($id= null, $nom = null, $typePerson = 'CLIENT', $telephone= null){
        parent::__construct($id, $nom, $typePerson = 'CLIENT',);;
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

    public function toObject(array $data):static{
        return new Client(
         $data['id'],
         $data['nom'],
         $data['typePerson'],
         $data['telephone'],
        );
        
    }

    public function toArray():array{
        return parent::toArray() + [
            'telephone' => $this->telephone,
            'commandes' => array_map(fn($commande) => $commande->toArray(), $this->commandes)
        ];

    }

   
}