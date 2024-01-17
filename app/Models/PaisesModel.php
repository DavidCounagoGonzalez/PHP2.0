<?php

namespace Com\Daw2\Models;

class PaisesModel extends \Com\Daw2\Core\BaseDbModel{

    const SELECT_FROM = "SELECT * FROM aux_countries ac";
    function getAllPaises() : array{
        $stmt = $this->pdo->query(self::SELECT_FROM . " ORDER BY country_name");
        return $stmt->fetchAll();
    }

}
