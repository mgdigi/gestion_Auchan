<?php 

namespace App\Entity;

class Vendeur extends Person{
    private string $login;
    private string $password;

    private string $matricule ;

    private array|null $commandes;

    public function __construct($id, $nom, $typePerson, $login, $password, $matricule){
        parent::__construct($id, $nom, $typePerson = 'VENDEUR');
        $this->login = $login;
        $this->password = $password;
        $this->matricule = $matricule;
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

    public function toObject (array $vendeur):static{
        return new Vendeur(
            $vendeur['id'],
            $vendeur['nom'],
            $vendeur['typePerson'],
            $vendeur['login'],
            $vendeur['password'],
            $vendeur['matricule']
        );
        
    }   

    public function toArray(){ 
        return  parent::toArray() + [
            'login' => $this->login,
            'password' => $this->password,
            'matricule' => $this->matricule
        ];
     }
    
}