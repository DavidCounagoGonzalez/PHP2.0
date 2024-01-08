<?php

namespace Com\Daw2\Models;

use \PDO;

class UsuarioModel {
    
    function conectar(){
        
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
        } catch (\PDOException $ex) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}