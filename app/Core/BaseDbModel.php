<?php

namespace Com\Daw2\Core;

abstract class BaseDbModel{
    protected $pdo;
    
    public function __construct(){
        $this->pdo = DBManager::getInstance()->getConnection();
    }

}
