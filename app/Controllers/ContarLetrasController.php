<?php

namespace Com\Daw2\Controllers;

class ContarLetrasController extends \Com\Daw2\Core\BaseController{
    
     private const PATRON = '/[^a-zA-Z]+/';
    
    function mostrarFormulario(){
        $data = [];
        $data['titulo'] = 'Contar Letras';
        $data['seccion'] = 'contar-letras';
        
        $this->view->showViews(array('templates/header.view.php', 'contarLetras.view.php', 'templates/footer.view.php'), $data);
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
        $this->view->showViews(array('templates/header.view.php', 'contarLetras.view.php', 'templates/footer.view.php') , $data);
    }
    
    private function checkForm(array $post) : array{
        $errores = [];
        if(empty($post['texto'])){
            $errores['texto'] = 'Campo obligatorio';
        }
        else{
            if(empty(preg_replace(self::PATRON, '', $post['texto']))){
                $errores['texto'] = 'Debe insertar al menos una letra.';
            }
        }
        return $errores;
    }
    
    private function contarLetras(string $texto) : array{
        $limpio = strtolower(preg_replace(self::PATRON, '', $texto));
        
//        $resultado = array_count_values(str_split($limpio)); Esto recoge los espacios en blanco.
        
        for($i = 0; $i < strlen($limpio); $i++){
            $caracter = $limpio[$i];
            if(isset($resultado[$caracter])){
                $resultado[$caracter]++;
            }else{
                $resultado[$caracter] = 1;
            }
        }
        
        arsort($resultado);
        
        return $resultado;
    }
    
}