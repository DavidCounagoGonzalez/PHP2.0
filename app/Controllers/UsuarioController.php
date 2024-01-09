<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {
    
    function mostrarConsulta(){
        $data=[];
        $data['titulo']='Consultas-Usuarios';
        $data['seccion']='consulta-usuarios';
        
        $data['res']= $this->test();

        $this->view->showViews(array('templates/header.view.php', 'UsuarioModel.view.php', 'templates/footer.view.php') , $data);
    }

    function test(){
        
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $pdo = $modelo->conectar();
        
        $stmt = $pdo->query('SELECT username FROM usuario');
        $res = $stmt->fetchAll();
        return $res;
    }
    
    
}
