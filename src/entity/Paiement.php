<?php

namespace App\Entity;

use App\Core\AbstractEntity;

class Paiement extends AbstractEntity{
    private int $id;
    private string $date;
    private float $montantVerse;

    private Facture $facture;

    private function __construct($id, $date, $montantVerse, ){
        $this->id = $id;
        $this->date = $date;
        $this->montantVerse = $montantVerse;
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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of montantVerse
     */ 
    public function getMontantVerse()
    {
        return $this->montantVerse;
    }

    /**
     * Set the value of montantVerse
     *
     * @return  self
     */ 
    public function setMontantVerse($montantVerse)
    {
        $this->montantVerse = $montantVerse;

        return $this;
    }

    /**
     * Get the value of facture
     */ 
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * Set the value of facture
     *
     * @return  self
     */ 
    public function setFacture($facture)
    {
        $this->facture = $facture;

        return $this;
    }

    public function toObject(array $data):static{
        return new Paiement(
         $data['id'],
         $data['date'],
         $data['montantVerse'],
        
        );
    }

    public function toArray():array{
        return [
            'id' => $this->id,
            'date' => $this->date,
            'montantVerse' => $this->montantVerse,
            'facture' => $this->facture->toArray(),
        ];

    }
    
}