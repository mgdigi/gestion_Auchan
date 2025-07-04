<?php 

namespace App\Entity;

enum TypePerson : string {
    case VENDEUR = "Vendeur";
    case CLIENT = "Client";
}