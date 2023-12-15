<?php

namespace Com\Daw2\Controllers;

class ContarLetrasController extends \Com\Daw2\Core\BaseController{
    
     private const PATRON = '/[^a-zA-Z]+/';
    
    function mostrarFormulario(){
        $data = [];
        $data['titulo'] = 'Contar Letras';
        $data['seccion'] = 'contar-letras';
        
        $this->view->showViews(array('templates/header.view.php', 'NotasAlumnos.view.php', 'templates/footer.view.php'), $data);
    }
    
    function procesarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Contador letras';
        $data['seccion'] = 'contar-letras';
        $data['errores'] = $this->checkForm($_POST);
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(count($data['errores']) == 0){
            $data['resultado'] = $this->contarLetras($_POST['texto']);
        }
        $this->view->showViews(array('templates/header.view.php', 'NotasAlumnos.view.php', 'templates/footer.view.php') , $data);
    }
}
