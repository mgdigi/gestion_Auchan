<?php 

namespace App\Entity;

class Vendeur extends Person{
   

    private string $matricule ;

    private array|null $commandes;

    public function __construct($id = 0,$nom = '', $typePerson = TypePerson::VENDEUR,  $login = '', $password = '', $matricule = ''){
        parent::__construct($id , $nom  , $typePerson = 'VENDEUR', $login, $password); 
        $this->matricule = $matricule ?? '';
        $this->commandes = [];
    }

    

   
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of commandes
     */ 
    public function getCommandes()
    {
        return $this->commandes;
    }

    public function  addCommande($commande){
        $this->commandes[] = $commande;
    }

    public static function toObject (array $data):static{
        $vendeur  = new static(
            $data['id'],
            $data['nom'],
            $data['typeperson'],
            $data['login'],
            $data['password'],
            $data['matricule']
        );
                
        return $vendeur;
        
    }   

    public function toArray(){ 
        return  parent::toArray() + [
            'matricule' => $this->matricule,
            'commandes' => $this->getCommandes()
        ];
     }
    
}