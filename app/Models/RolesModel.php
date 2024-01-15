<?php

namespace Com\Daw2\Models;

class RolesModel extends \Com\Daw2\Core\BaseDbModel{
    
    const SELECT_FROM = "SELECT * FROM aux_rol a";
    function getAllRols() : array{
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY nombre_rol");
        return $stmt->fetchAll();
    }
}
