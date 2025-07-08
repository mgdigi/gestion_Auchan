<?php
namespace App\Repository;
use App\Core\Database;

class FactureRepository{
    private $table = "facture";

    private static   FactureRepository|null $instance = null;

    

    public static function getInstance():FactureRepository{
        if(self::$instance === null){
            self::$instance = new FactureRepository();
        }
        return self::$instance;
    }

    

 
}