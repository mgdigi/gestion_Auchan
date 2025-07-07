<?php

namespace App\Core;

use \PDO;
use \PDOException;

class Database{
    
    private $connection;
    private  static $instance = null;

      private function __construct() {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $port = $_ENV['DB_PORT'];

        try {
            $infoDB = "pgsql:host=$host;port=$port;dbname=$dbname;";
            $this->connection = new PDO(
              $infoDB,
              $user,
              $password,
              [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
              ]
              );

             
        }catch(PDOException $e){
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection():PDO{
        return $this->connection;
    }


    
}