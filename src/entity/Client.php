<?php

namespace App\Entity;

class Client  extends Person{
  
    private string $telephone;

    private array|null $commandes;

    public function  __construct($id= 0, $nom = '', $typePerson = TypePerson::CLIENT, $telephone= '', $login = '', $password = ''){
        parent::__construct($id, $nom, $typePerson = 'CLIENT', $login, $password);;
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
         $data['typeperson'],
         $data['telephone'],
         $data['login'],
         $data['password']
         
        );
       
        
        return $client;
        
    }

    public function toArray():array{
        return parent::toArray() + [
            'telephone' => $this->telephone,
            'commandes' => array_map(fn($commande) => $commande->toArray(), $this->commandes)
        ];

    }

   
}