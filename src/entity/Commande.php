<?php

namespace App\Entity;

use App\Core\AbstractEntity;
class Commande extends AbstractEntity{
 
    private int $id;
    private string $date;
    private Facture|null $facture = null;

    private Client $client;
    private Vendeur $vendeur;   

    private array $commandesProduits;

    public function __construct($id = null, $date = null){
        $this->id = $id;
        $this->date = $date;
        $this->commandesProduits = [];
        $this->client = new Client();
        $this->vendeur = new Vendeur();
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

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of vendeur
     */ 
    public function getVendeur()
    {
        return $this->vendeur;
    }

    /**
     * Set the value of vendeur
     *
     * @return  self
     */ 
    public function setVendeur($vendeur)
    {

        $this->vendeur = $vendeur;

        return $this;
    }

     
    public function toObject(array $data):static{
        return new Commande(
            $data['id'],
            $data['date'],

        );
       
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'date' => $this->date,
            'facture' => $this->facture->toArray(),
            'client' => $this->client->toArray(),
            'vendeur' => $this->vendeur->toArray(),
            'commandeProduits' => array_map(fn($produit) => $produit->toArray(), $this->commandesProduits),
        ];
    }
    

    /**
     * Get the value of commandesProduits
     */ 
    public function getCommandesProduits()
    {
        return $this->commandesProduits;
    }

    public function addCommandeProduit(ProduitCommande $commandeProduit){
        $this->commandesProduits[] = $commandeProduit;
    }
}