<?php

namespace Com\Daw2\Models;

class UsuarioModel extends \Com\Daw2\Core\BaseDbModel {

    const SELECT_FROM = "SELECT u.* , ar.nombre_rol  as rol, ac.country_name as country FROM usuario u LEFT JOIN aux_rol ar ON ar.id_rol = u.id_rol LEFT JOIN aux_countries ac ON u.id_country = ac.id";
    const ORDER_ARRAY = ['username', 'rol', 'salarioBruto', 'retencionIRPF', 'country_name'];
    const SELECT_COUNT = "SELECT COUNT(*) as total FROM usuario u";
    
    function getAllUsers(): array {
        $stmt = $this->pdo->query(self::SELECT_FROM);
        return $stmt->fetchAll();
    }

    function getAllUserOrderBySalar() {
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY salarioBruto DESC");
        return $stmt->fetchAll();
    }

    function getAllStandardUsers() {
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE ar.nombre_rol = 'standard'");
        return $stmt->fetchAll();
    }

    function getAllUsersCarlos() {
        $stmt = $this->pdo->query(self::SELECT_FROM . " WHERE username LIKE 'carlos%'");
        return $stmt->fetchAll();
    }

    function getByRol(int $idRol): array {
        $stmt = $this->pdo->prepare(self::SELECT_FROM . " WHERE u.id_rol = :id_rol");
        $stmt->execute(['id_rol' => $idRol]);
        return $stmt->fetchAll();
    }

    function getByFiltros(array $filtros): array {
        $consulta = self::SELECT_FROM;
        
        $informacion = $this->Filtrado($filtros);

        $campo = $this->getOrder($filtros);
        $campoOrder = self::ORDER_ARRAY[$campo - 1];
        
        if(isset($filtros['page'])){
            $actuales = ($this->getRegistros($filtros) - 1) * $_ENV['page.size'];
            $limite = " LIMIT " . $_ENV['page.size'] . " OFFSET " . $actuales;
        }else{
            $limite = " LIMIT " . $_ENV['page.size'];
        }
        
        if (!empty($informacion['datos'])) {
            $consulta .= " WHERE".implode(" AND", $informacion['consultas']). " ORDER BY " . $campoOrder . " " . $this->getSentido($filtros) .  " " . $limite;
        }else{
            $consulta .= " ORDER BY " . $campoOrder . " " . $this->getSentido($filtros) . " " .$limite;
        }
        
        echo("<script>console.log('PHP: " . $consulta . "');</script>");
        return $this->ejecutaConsulta($consulta, $informacion['datos']);
    }
    
    private function ejecutaConsulta(string $consulta, array $datos) {
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute($datos);
        return $stmt->fetchAll();
    }
    
    public static function getMaxColumnOrder() :int {
        return count(self::ORDER_ARRAY);
    }
    
    public function getOrder(array $filtros) :int{
        if(!isset($filtros['campo']) || $filtros['campo'] < 1 || $filtros['campo']>$this->getMaxColumnOrder()){
            $campo = 1;
        }else{
            $campo= (int)$filtros['campo'];
        }
        return $campo;
    }
    
    function getSentido(array $filtros){
        if(isset($filtros['sentido']) && $filtros['sentido'] == 'desc'){
            return 'desc';
        }
        else{
            return 'asc';
        }
    }
    
    function totalPaginas(array $filtros){
        $total = self::SELECT_COUNT;
        $informacion = $this->Filtrado($filtros);
        
        if(!empty($informacion['datos'])){
            $total .= " WHERE".implode(" AND", $informacion['consultas']);  
        }
        
        $stmt = $this->pdo->prepare($total);
        $stmt->execute($informacion['datos']);
        $registros = $stmt->fetch()['total'];
        $total_paginas = ceil(floatval($registros/$_ENV['page.size']));
        echo("<script>console.log('PHP: " . $registros . "');</script>");
        return $total_paginas;
    }


    function getRegistros (array $filtros)  : int{
       
        $total_paginas = $this->totalPaginas($filtros);
        
        if (isset($filtros['page'])) {
            $paginaAct = $filtros['page'];
            
            if($paginaAct<1){
                $paginaAct = 1;
            }elseif ($paginaAct>$total_paginas) {
                $paginaAct = $total_paginas;
            }
            return (int) $paginaAct;
        }else{
            return (int) 1;
        }
        
    }
    
    private function Filtrado(array $filtros){
        $consultas = [];
        $datos = [];
        $paisesQuery = [];

        if (!empty($filtros['id_rol']) && filter_var($filtros['id_rol'], FILTER_VALIDATE_INT)) {
            $consultas[] = " u.id_rol = :id_rol";
            $datos['id_rol'] = $filtros['id_rol'];
        }

        if (!empty($filtros['username'])) {

            $consultas[] = " u.username LIKE :username";
            $username = '%' . $filtros['username'] . '%';
            $datos['username'] = $username;
        }

        if (!empty($filtros['min_salar']) && is_numeric($filtros['min_salar'])) {

            if ($filtros['min_salar'] < 0) {
                $filtros['min_salar'] = 0;
            }

            $consultas[] = " u.salarioBruto >= :minSalar";
            $datos['minSalar'] = $filtros['min_salar'];
        }

        if (!empty($filtros['max_salar']) && is_numeric($filtros['max_salar'])) {

            if ($filtros['max_salar'] < 0) {
                $filtros['max_salar'] = 0;
            }

            $consultas[] = " u.salarioBruto <= :maxSalar";
            $datos['maxSalar'] = $filtros['max_salar'];
        }

        if (!empty($filtros['min_retencion']) && is_numeric($filtros['min_retencion'])) {

            if ($filtros['min_retencion'] < 0) {
                $filtros['min_retencion'] = 0;
            }

            $consultas[] = " u.retencionIRPF >= :minRetencion";
            $datos['minRetencion'] = $filtros['min_retencion'];
        }

        if (!empty($filtros['max_retencion']) && is_numeric($filtros['max_retencion'])) {

            if ($filtros['max_retencion'] < 0) {
                $filtros['max_retencion'] = 0;
            }

            $consultas[] = " u.retencionIRPF <= :maxRetencion";
            $datos['maxRetencion'] = $filtros['max_retencion'];
        }
        if (!empty($filtros['id_pais']) && is_array($filtros['id_pais'])) {
            $paisNum = 0;
            foreach ($filtros['id_pais'] as $idPais) {
                $paisNum +=1;
                $paisesQuery[] = ":idPais$paisNum";
                $datos["idPais$paisNum"] = $idPais;
            }
            $consultas[] = " u.id_country IN (".implode(", ", $paisesQuery).")";

        }
        
        $informacion = array(
            "datos" => $datos,
            "consultas" => $consultas
        );
        
        return $informacion;
    }
}
