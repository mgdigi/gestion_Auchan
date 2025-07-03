<?php

namespace App\Service;

use App\Repository\CommandeRepository;

class CommandeService{

    private static CommandeService|null $instance = null;

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new CommandeService();
        }
        return self::$instance;
    }
  private CommandeRepository $commandeRepository;

  public function __construct(){
    $this->commandeRepository::getInstance();
  }

  public function getAll(){
    return $this->commandeRepository->getAll();
  }

  public function create($commande){
    return $this->commandeRepository->create($commande);
  }


}