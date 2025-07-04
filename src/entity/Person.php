<?php

namespace App\Entity;
use App\Core\AbstractEntity;
class Person extends AbstractEntity{

    
    protected int $id;
    protected string $nom;
    protected  $typePerson;


    public function __construct($id, $nom, $typePerson){
        $this->id = $id;
        $this->nom = $nom;
        $this->typePerson = $typePerson;
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
            $data['typePerson']
        );
    }

    public  function toArray(){
        return  [
            'id' => $this->id,
            'nom' => $this->nom,
            'typePerson' => $this->typePerson
        ];
    }

}