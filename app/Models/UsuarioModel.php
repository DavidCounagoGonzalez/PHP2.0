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
    
    function getByFiltros(int $idRol, string $username, float $minSalar, float $maxSalar) : array{
        $consulta = self::SELECT_FROM;
        $filtros = [];
        $datos = [];
        
        if(!is_null($idRol)){
            array_push($filtros, " u.id_rol = :id_rol");
            $datos['id_rol'] = $idRol;
        }
        
        if(!is_null($username)){
            
            array_push($filtros, " u.username LIKE :username");
            $username = '%' . $username . '%';
            $datos['username'] = $username;
        }
        
        if(!is_null($minSalar)){
            
            if($minSalar<0){
                $minSalar = 0;
            }
            
            array_push($filtros, " u.salarioBruto >= :minSalar");
            $datos['minSalar'] = $minSalar;
        }
        
        if(!is_null($maxSalar)){
            
            if($maxSalar<0){
                $maxSalar = 0;
            }
            
            array_push($filtros, " u.salarioBruto <= :maxSalar");
            $datos['maxSalar'] = $maxSalar;
        }
        
        if(count($datos) > 0){
            $consulta .= " WHERE";
            $consulta .= $filtros[0];
            foreach ($filtros as $key => $filtro) {
                if($key > 0){
                    $consulta .= " AND" . $filtro;
                }
            }
            
        }
        
        echo("<script>console.log('PHP: " . $consulta . "');</script>");
        
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute($datos);
        return $stmt->fetchAll();
    }
    
}