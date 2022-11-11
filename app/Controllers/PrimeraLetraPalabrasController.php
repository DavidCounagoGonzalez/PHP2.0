<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class PrimeraLetraPalabrasController extends \Com\Daw2\Core\BaseController {
    
    private const PATRON = '/[^a-zA-Z]+/';
            
    function mostrarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Contador palabras';
        
        $this->view->showViews(array('templates/header.view.php', 'primeraletra.view.php', 'templates/footer.view.php') , $data);
    }
    
    function procesarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Contador palabras';
        $data['errores'] = $this->checkForm($_POST);
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(count($data['errores']) == 0){
            $data['resultado'] = $this->primeraLetra($_POST['texto']);
        }
        $this->view->showViews(array('templates/header.view.php', 'primeraletra.view.php', 'templates/footer.view.php') , $data);
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
    
    private function primeraLetra(string $texto) : array{
        $resultado = [];
        $textoLimpio = trim(preg_replace(self::PATRON, ' ', strtolower($texto)));
        
        $arrayPalabras = explode(" ", $textoLimpio);
        
        foreach($arrayPalabras as $palabra){
            $letraInicio = $palabra[0];
            if(!isset($resultado[$letraInicio])){
                $resultado[$letraInicio] = [];
            }
            if(!in_array($palabra, $resultado[$letraInicio])){
                $resultado[$letraInicio][] = $palabra;                
            }            
        }
        ksort($resultado);
        foreach($resultado as $letra => $lista){
            //sort($arrayPalabras[$letra]);
            sort($lista);
            $resultado[$letra] = $lista;
        }
        return $resultado;
    }
}