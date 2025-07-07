<?php

namespace App\Service;

use App\Repository\PersonRepository;
use App\Entity\Vendeur;
use App\Entity\Client;

class SecurityService{

    private PersonRepository $personRepository;

    public function __construct(){
        $this->personRepository = new PersonRepository();
    }

    public function seConnecter(string $login, string $password): null|Vendeur|CLIENT{
        $result = $this->personRepository->selectByLoginAndPassword($login, $password);
        return $result;
    }
}