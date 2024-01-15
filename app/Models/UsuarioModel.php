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
    
    function getByRol(int $idRol) : array{
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE u.id_rol = :id_rol");
        $stmt->execute(['id_rol' => $idRol]);
        return $stmt->fetchAll();
    }
    
    function getByFiltros(int $idRol, string $username, int $minSalar, int $maxSalar) : array{
        $consulta = self::SELECT_FROM;
        $datos = [];
        $primero = false;
        
        if(!empty($idRol)){
            $consulta .= " WHERE u.id_rol = :id_rol";
            $datos['id_rol'] = $idRol;
            $primero = true;
        }
        
        if(!empty($username)){
            if($primero){
                $consulta .= " AND u.username LIKE :username";
            }else{
                $consulta .= " WHERE u.username LIKE :username";
            }
            
            $username = '%' . $username . '%';
            $datos['username'] = $username;
        }
        
        if(!empty($minSalar)){
            if($primero){
                $consulta = " AND u.salarioBruto >= :minSalar";
            }else{
                $consulta = " WHERE u.salarioBruto >= :minSalar";
            }
            $datos['minSalar'] = $minSalar;
        }
        
        if(!empty($maxSalar)){
            if($primero){
                $consulta = " AND u.salarioBruto <= :maxSalar";
            }else{
                $consulta = " WHERE u.salarioBruto <= :maxSalar";
            }
            $datos['maxSalar'] = $maxSalar;
        }
        
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute($datos);
        return $stmt->fetchAll();
    }
    
}