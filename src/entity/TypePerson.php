<?php 

namespace App\Entity;

enum TypePerson : string {
    case Vendeur = "Vendeur";
    case Client = "Client";
}