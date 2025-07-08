<?php

namespace App\Service;

use App\Repository\CommandeRepository;
use App\Core\App;

class CommandeService {

    private static CommandeService|null $instance = null;

    

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new CommandeService();
        }
        return self::$instance;
    }
  private CommandeRepository $commandeRepository;

  public function __construct(){
     $this->commandeRepository = App::getDependency(CommandeRepository::class);
  }

  public function getAll():array{
    return $this->commandeRepository->selectAll();
  }

  public  function getByVendeur( $vendeur_id){
    return $this->commandeRepository->selectByVendeur($vendeur_id);
  }

  public function getByClient( $client_id){
    return $this->commandeRepository->selectByClient($client_id);
  }



}