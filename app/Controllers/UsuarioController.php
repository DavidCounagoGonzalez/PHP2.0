<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {
    
    function mostrarConsulta(){
        $data=[];
        $data['titulo']='Consultas-Usuarios';
        $data['seccion']='consulta-usuarios';
        
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUsers();
        
        $data['usuarios']= $usuarios;

        $this->view->showViews(array('templates/header.view.php', 'UsuarioModel.view.php', 'templates/footer.view.php') , $data);
    }

    
    
}
