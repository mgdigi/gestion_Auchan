<?php

namespace App\Service;

use App\Repository\PersonRepository;
use App\Entity\Vendeur;
use App\Entity\Client;
use App\Core\App;

class SecurityService{

    private PersonRepository $personRepository;

    private static SecurityService|null $instance = null;

    public function __construct(){
        $this->personRepository = App::getDependency(PersonRepository::class);
    }

    public static function getInstance():SecurityService{
        if(self::$instance === null){
            self::$instance = new SecurityService();
        }
        return self::$instance;
    }

    public function seConnecter(string $login, string $password): null|Vendeur|CLIENT{
        $result = $this->personRepository->selectByLoginAndPassword($login, $password);
        return $result;
    }
}