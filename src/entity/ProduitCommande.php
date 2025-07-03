<?php

namespace App\Entity;

use App\Core\AbstractEntity;

class ProduitCommande extends AbstractEntity{
    private int $id;

    private float $prix;

    private int $quantiteCommande;

    private float $montant;
    private Produit $produit;
    private Commande $commande;

    public function __construct($id, $prix, $quantiteCommande, $montant){
        $this->id = $id;
        $this->prix = $prix;
        $this->quantiteCommande = $quantiteCommande;
        $this->montant = $montant;
        
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
     * Get the value of produit
     */ 
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set the value of produit
     *
     * @return  self
     */ 
    public function setProduit($produit)
    {
        $this->produit = $produit;

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
     * Get the value of quantiteCommande
     */ 
    public function getQuantiteCommande()
    {
        return $this->quantiteCommande;
    }

    /**
     * Set the value of quantiteCommande
     *
     * @return  self
     */ 
    public function setQuantiteCommande($quantiteCommande)
    {
        $this->quantiteCommande = $quantiteCommande;

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

    public function toObject(array $data):static{
        return new ProduitCommande(
            $data['id'],
            $data['prix'],
            $data['quantite_commande'],
            $data['montant'],
        );
       
       
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'prix' => $this->prix,
            'quantite' => $this->quantiteCommande,
            'montant' => $this->montant,
            'produit' => $this->produit->toArray(),
            'commande' => $this->commande->toArray()
        ];
    }

}