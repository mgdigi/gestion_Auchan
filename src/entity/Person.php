<?php

namespace App\Entity;
use App\Core\AbstractEntity;
class Person extends AbstractEntity{

    
    protected int $id;
    protected string $nom;
    protected  $typePerson;

    protected string $login;

    protected string $password;


    public function __construct($id, $nom, $typePerson, $login, $password   ){
        $this->id = $id;
        $this->nom = $nom;
        $this->typePerson = $typePerson;
        $this->login = $login;
        $this->password = $password;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    /**
     * Get the value of typePerson
     */ 
    public function getTypePerson()
    {
        return $this->typePerson;
    }

    /**
     * Set the value of typePerson
     *
     * @return  self
     */ 
    public function setTypePerson($typePerson)
    {
        $this->typePerson = $typePerson;

        return $this;
    }

    public static function toObject(array $data):static{
        return new static(
            $data['id'],
            $data['nom'],
            $data['typePerson'],
            $data['login'],
            $data['password']
        );
    }

    public  function toArray(){
        return   [
            'id' => $this->id,
            'nom' => $this->nom,
            'typePerson' => $this->typePerson,
            'login' => $this->login,
            'password' => $this->password
        ];
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
}