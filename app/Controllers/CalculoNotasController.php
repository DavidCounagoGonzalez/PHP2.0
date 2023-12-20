<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;


/**
 * Description of ProcesarAsignaturasController
 *
 * @author rgcenteno
 */
class CalculoNotasController extends \Com\Daw2\Core\BaseController{
    
    function mostrarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Calculo Notas';
        $data['seccion'] = 'calculo-notas';
        
        $this->view->showViews(array('templates/header.view.php', 'CalculoNotas.view.php', 'templates/footer.view.php') , $data);
    }
    
    function doProcesarCalculoNotas() : void{
        $data = [];
        $data['titulo'] = 'Calculo Notas';
        $data['seccion'] = 'calculo-notas';
        
        $data['errores'] = $this->checkFormCalcN($_POST);
        $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        
        if(count($data['errores']) === 0){
            $data['res'] = $this->procesarDatos(json_decode($_POST['texto'], true));
        }
                
        //$data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->view->showViews(array('templates/header.view.php', 'CalculoNotas.view.php', 'templates/footer.view.php') , $data);
        
    }
    
    private function procesarDatos(array $datos) : array{
        $res = [];
        
        foreach ($datos as $nombreAsignatura => $datosAsignaturas) {
            $media = 0;
            $aprobados = 0;
            $suspensos = 0;
            $max = array(
                'alumno' => '',
                'nota' => -1
            );
            
            $min = array(
                'alumno' => '',
                'nota' => 11
            );
            
            foreach ($datosAsignaturas as $alumno => $notas){
                $mediaAlumno = 0;
                foreach ($notas as $nota) {
                    $media += $nota;
                    $mediaAlumno += $nota;
                    
                }
                $mediaAlumno /= 3;
                
                if($mediaAlumno < 5){
                    $suspensos++;
                }else{
                    $aprobados++;
                }
                
                if($max['nota'] < $mediaAlumno){
                        $max['nota'] = round($mediaAlumno);
                        $max['alumno'] = $alumno;
                }
                if($min['nota'] > $mediaAlumno){
                        $min['nota'] = round($mediaAlumno);
                        $min['alumno'] = $alumno;
                }
                
            }
            
            $media /= (count($datosAsignaturas)*3);
            $res[$nombreAsignatura] = [];
            $res[$nombreAsignatura]['media'] = round($media, 2);
            $res[$nombreAsignatura]['suspensos'] = $suspensos;
            $res[$nombreAsignatura]['aprobados'] = $aprobados;
            $res[$nombreAsignatura]['max'] = $max;
            $res[$nombreAsignatura]['min'] = $min;
        }
        return $res; 
    }
    
    private function checkFormCalcN(array $post) : array{
        $datos = json_decode($post['texto'], true);
        $errores = [];
        
        $erroresTexto = [];
        
        if(is_null($datos)){
            $erroresTexto[] = 'No se ha enviado un Json válido';
        }
        else{
            foreach($datos as $nombreMateria => $datosMateria){
                if(!is_string($nombreMateria) && !is_array($nombreMateria)){
                    $erroresTexto[] = "'$nombreMateria' no es un nombre de asignatura válido.";
                }
                else if(!is_array($nombreMateria)){                                    
                    if(!is_array($datosMateria)){                        
                        $erroresTexto[] = "'$nombreMateria' no tiene asignado un array de datos.";
                    }
                    else{
                        foreach($datosMateria as $alumno => $notas){
                            if(!is_string($alumno) && !is_array($alumno)){
                                $erroresTexto[] = "Asignatura: '$nombreMateria' el alumno '$alumno' no tiene un nombre válido.";
                            }
                            else if(!is_array($alumno)){
                                if(!is_numeric($notas) && !is_array($notas)){
                                    $erroresTexto[] = "Asignatura: '$nombreMateria', alumno '$alumno' tiene como nota '$notas' que no es válida.";
                                }
                                else if(!is_array($notas)){
                                    if($notas < 0 || $notas > 10){
                                        $erroresTexto[] = "Asignatura: '$nombreMateria', alumno '$alumno' tiene como nota '$notas' que no es válida.";
                                    }
                                }
                                else{
                                    foreach ($notas as $nota) {
                                        if($nota < 0 || $nota > 10){
                                            $erroresTexto[] = "Asignatura: '$nombreMateria', alumno '$alumno' tiene como nota '$nota' que no es válida.";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        if(count($erroresTexto) > 0){
            $errores['texto'] = $erroresTexto;
        }
        return $errores;
    }
}