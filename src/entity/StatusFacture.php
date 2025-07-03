<?php

namespace App\Entity;

enum StatusFacture : string {
    case Paye = "Payé";
    case NonPaye = "Non Paye";
}