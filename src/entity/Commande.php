<?php
namespace App\Entity;

use App\Core\AbstractEntity;

class Commande extends AbstractEntity
{
    private int $id;
    private string $date;
    private string $numeroCommande;
    private Facture|null $facture = null;
    private Client $client;
    private Vendeur $vendeur;
    private array $commandesProduits;

    public function __construct($id = 0, $date = '',  $numeroCommande = '')
    {
        $this->id = $id ?? 0;
        $this->date = $date ?? '';
        $this->numeroCommande = $numeroCommande;
        $this->commandesProduits = [];
        
    }

    public function genererNumeroCommande(){
        $this->numeroCommande = "CMD" .rand(100, 400) . date('YmdHis');
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
     * @return self
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
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of numeroCommande
     */ 
    public function getNumeroCommande()
    {
        return $this->numeroCommande;
    }

    /**
     * Set the value of numeroCommande
     *
     * @return  self
     */ 
    public function setNumeroCommande($numeroCommande)
    {
        $this->numeroCommande = $numeroCommande;

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
     * @return self
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
     * @return self
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
     * @return self
     */
    public function setVendeur($vendeur)
    {
        $this->vendeur = $vendeur;
        return $this;
    }

    /**
     * Get the value of commandesProduits
     */
    public function getCommandesProduits()
    {
        return $this->commandesProduits;
    }

    /**
     * Add a product to the command
     */
    public function addCommandeProduit(ProduitCommande $commandeProduit)
    {
        $this->commandesProduits[] = $commandeProduit;
    }

    public static function toObject(array $data): static
    {
        $commande = new static($data['id'], $data['date'], $data['numero_commande']);
        
        if (isset($data['client_id'])) {
            $client = new Client();
            $client->setId($data['client_id']);
            if (isset($data['client_nom'])) {
                $client->setNom($data['client_nom']);
            }
            $commande->setClient($client);
        }
        
        if (isset($data['vendeur_id'])) {
            $vendeur = new Vendeur();
            $vendeur->setId($data['vendeur_id']);
            if (isset($data['vendeur_nom'])) {
                $vendeur->setNom($data['vendeur_nom']);
            }
            $commande->setVendeur($vendeur);
        }
        
        if (isset($data['facture_id']) && $data['facture_id']) {
            $facture = new Facture();
            $facture->setId($data['facture_id']);
            $commande->setFacture($facture);
        }
        
        return $commande;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'numero_commande' => $this->numeroCommande,
            'facture' => $this->facture?->toArray(),
            'client' => isset($this->client) ? $this->client->toArray() : null,
            'vendeur' => isset($this->vendeur) ? $this->vendeur->toArray() : null,
            'commandeProduits' => array_map(fn($produit) => $produit->toArray(), $this->commandesProduits),
        ];
    }


    
}
