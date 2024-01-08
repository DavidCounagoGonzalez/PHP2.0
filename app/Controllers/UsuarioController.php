<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {
    
    function test(){
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $modelo->conectar();
    }
    
    
}