<?php

namespace Com\Daw2\Core;

use \PDO;

class DBManager{
   
    private static $instance;
    
    private $db;
    
    private function __construct(){ }
    
    public static function getInstance() : DBManager{
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection(){
        if(is_null($this->db)){
            $this->db = $this->conectar();
        }
        return $this->db;
    }
    
     private function conectar() : ?PDO{
        
        $host = $_ENV['db.host'];
        $db = $_ENV['db.db'];
        $user = $_ENV['db.user'];
        $pass = $_ENV['db.pass'];
        $charset = $_ENV['db.charset'];
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        
        $options = [
            PDO::ATTR_ERRMODE       =>  PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try{
            $pdo = new PDO($dsn, $user, $pass, $options);
            return $pdo;
        } catch (\PDOException $ex) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}
