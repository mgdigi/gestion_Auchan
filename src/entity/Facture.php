<?php

namespace App\Entity;

use App\Core\AbstractEntity;

class Facture extends AbstractEntity{
    private int $id;
    private string $date;
    private string $montant;
    private string $montantRest;
    private StatusFacture $status;
    private Commande $commande;
    private array $paiements;


    private function __construct($id = 0, $date = '', $montant = 0, $montantRest = 0, $status = StatusFacture::NonPaye){
        $this->id = $id;
        $this->date = $date;
        $this->montant = $montant;
        $this->montantRest = $montantRest;
        $this->status = $status;
        $this->paiements = [];
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
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of montantRest
     */ 
    public function getMontantRest()
    {
        return $this->montantRest;
    }

    /**
     * Set the value of montantRest
     *
     * @return  self
     */ 
    public function setMontantRest($montantRest)
    {
        $this->montantRest = $montantRest;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

     /**
     * Get the value of commande
     */ 
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set the value of commande
     *
     * @return  self
     */ 
    public function setCommande($commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get the value of paiements
     */ 
    public function getPaiements()
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement){
        $this->paiements[] = $paiement;
    }

    public function toObject(array $data):static{
        return new Facture(
            $data['id'],
            $data['date'],
            $data['montant'],
            $data['montantRest'],
            $data['status'],
        );
        
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'date' => $this->date,
            'montant' => $this->montant,
            'montantRest' => $this->montantRest,
            'status' => $this->status,
            'commande' => $this->commande->toArray(),
            'paiements' => array_map(fn($paiement)=> $paiement->toArray(), $this->paiements),
        ];
    }

}