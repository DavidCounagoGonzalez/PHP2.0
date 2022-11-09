<?php

namespace Com\Daw2\Controllers;

class FormularioExamenController extends \Com\Daw2\Core\BaseController {
    
    function mostrarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Formulario examen';
        
        $this->view->showViews(array('templates/header.view.php', 'formulario.view.php', 'templates/footer.view.php'), $data);
    }

}
