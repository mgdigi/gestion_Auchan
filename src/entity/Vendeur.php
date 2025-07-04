<?php 

namespace App\Entity;

class Vendeur extends Person{
    private string $login;
    private string $password;

    private string $matricule ;

    private array|null $commandes;

    public function __construct($id = 0,$nom = '', $typePerson = TypePerson::VENDEUR,  $login = '', $password = '', $matricule = ''){
        parent::__construct($id = 0, $nom = '' , $typePerson = 'VENDEUR');
        $this->login = $login ?? '';
        $this->password = $password ?? ''; 
        $this->matricule = $matricule ?? '';
        $this->commandes = [];
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of matricule
     */ 
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
        // $commandes = array_map(fn($commande) => Commande::toObject($commande), $data['commandes']);

        // foreach ($commandes as $commande) {
        //     $vendeur->addCommande($commande);
        // }
        
        return $vendeur;
        
    }   

    public function toArray(){ 
        return  parent::toArray() + [
            'login' => $this->login,
            'password' => $this->password,
            'matricule' => $this->matricule
        ];
     }
    
}