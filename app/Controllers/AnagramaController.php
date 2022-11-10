<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;

class AnagramaController extends \Com\Daw2\Core\BaseController {
    
    private const EXPRESION_REGULAR = '/[^a-zA-Z0-9]/';
    
    function mostrarFormulario(){
        $data = [];
        $data['titulo'] = 'Anagrama';
        
        $this->view->showViews(array('templates/header.view.php', 'anagrama.view.php', 'templates/footer.view.php') , $data);
    }
    
    function procesarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Anagrama';
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $data['errores'] = $this->checkForm($_POST);                
        
        if(count($data['errores']) === 0){
            $data['isOk'] = $this->isAnagrama($_POST['palabra1'], $_POST['palabra2']);
        }
        
        $this->view->showViews(array('templates/header.view.php', 'anagrama.view.php', 'templates/footer.view.php') , $data);
    }
    
    private function checkForm(array $post) : array{
        $errores = [];
        
        $palabra1 = preg_replace(self::EXPRESION_REGULAR, '', $post['palabra1']);
        $palabra2 = preg_replace(self::EXPRESION_REGULAR, '', $post['palabra2']);
        if(empty($palabra1)){
            $errores['palabra1'] = 'El texto debe contener al menos un número o letra';
        }
        if(empty($palabra2)){
            $errores['palabra2'] = 'El texto debe contener al menos un número o letra';
        }
        return $errores;
    }
    
    private function isAnagrama(string $s1, string $s2) : bool{
        $palabra1 = preg_replace(self::EXPRESION_REGULAR, '', $s1);
        $palabra2 = preg_replace(self::EXPRESION_REGULAR, '', $s2);
        
        $array1 = str_split($palabra1);
        $array2 = str_split($palabra2);
        
        sort($array1);
        sort($array2);
        
        return $array1 === $array2;
    }
}
