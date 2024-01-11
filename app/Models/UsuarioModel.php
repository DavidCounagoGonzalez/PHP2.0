<?php

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel{
    
    const SELECT_FROM = "SELECT u.* , ar.nombre_rol as rol FROM usuario u LEFT JOIN aux_rol ar ON ar.id_rol = u.id_rol";
    function getAllUsers() : array{
        $stmt = $this->pdo->query(self::SELECT_FROM);
        return $stmt->fetchAll();
    }
    
    function  getAllUserOrderBySalar(){
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY salarioBruto DESC");
        return $stmt->fetchAll();
    }
    
    function  getAllStandardUsers(){     
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE ar.nombre_rol = 'standard'");
        return $stmt->fetchAll();
    }
    
    function  getAllUsersCarlos(){
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE username LIKE 'carlos%'");
        return $stmt->fetchAll();
    }
    
    
}