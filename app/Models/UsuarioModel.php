<?php

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel{
    
    function getAllUsers() : array{
        $stmt = $this->pdo->query("SELECT * FROM usuario u");
        return $stmt->fetchAll();
    }
    
    function  getAllUserOrderBySalar(){
        $stmt = $this->pdo->query("SELECT * FROM usuario u ORDER BY salarioBruto DESC");
        return $stmt->fetchAll();
    }
    
    function  getAllStandardUsers(){     
        $stmt = $this->pdo->query("SELECT * FROM usuario u WHERE rol = 'standard'");
        return $stmt->fetchAll();
    }
    
    function  getAllUsersCarlos(){
        $stmt = $this->pdo->query("SELECT * FROM usuario u WHERE username LIKE 'carlos%'");
        return $stmt->fetchAll();
    }
    
    
}