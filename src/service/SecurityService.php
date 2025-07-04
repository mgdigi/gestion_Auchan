<?php

namespace App\Service;

use App\Repository\PersonRepository;
use App\Entity\Vendeur;

class SecurityService{

    private PersonRepository $personRepository;

    public function __construct(){
        $this->personRepository = new PersonRepository();
    }

    public function seConnecter(string $login, string $password): null|Vendeur{
        $result = $this->personRepository->selectByLoginAndPassword($login, $password);
        return $result;
    }
}