<?php
declare(strict_types = 1);

namespace Com\Daw2\Controllers;


/**
 * Description of ProcesarAsignaturasController
 *
 * @author rgcenteno
 */
class NotasAlumnosController extends \Com\Daw2\Core\BaseController{
    
    function mostrarFormulario() : void{
        $data = [];
        $data['titulo'] = 'Notas Alumnos';
        $data['seccion'] = 'notas-alumnos';
        
        $this->view->showViews(array('templates/header.view.php', 'NotasAlumnos.view.php', 'templates/footer.view.php') , $data);
    }
    
    function doProcesarAsignaturas() : void{
        $data = [];
        $data['titulo'] = 'Procesar asignaturas I';
        $data['seccion'] = 'procesar-asignaturas-1';
        
        $data['errores'] = $this->checkFormProc1($_POST);
        $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        
        if(count($data['errores']) === 0){
            $data['res'] = $this->procesarDatos(json_decode($_POST['texto'], true));
        }
                
        //$data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->view->showViews(array('templates/header.view.php', 'NotasAlumnos.view.php', 'templates/footer.view.php') , $data);
        
    }
    
    private function procesarDatos(array $datos) : array{
        $res = [];
        
        foreach($datos as $nombreAsignatura => $datosAsignatura){
            $media = 0;
            $suspensos = 0;
            $aprobados = 0;
            $max = array(
                'alumno' => '',
                'nota' => -1
            );
            
            $min = array(
                'alumno' => '',
                'nota' => 11
            );
            foreach($datosAsignatura as $alumno => $nota){
                $media += $nota;
                if($nota < 5){
                    $suspensos++;
                }
                else{
                    $aprobados++;
                }
                if($max['nota'] < $nota){
                    $max['nota'] = $nota;
                    $max['alumno'] = $alumno;                    
                }
                if($min['nota'] > $nota){
                    $min['nota'] = $nota;
                    $min['alumno'] = $alumno;                    
                }
                
            }
            $media /= count($datosAsignatura);
            $res[$nombreAsignatura] = [];
            $res[$nombreAsignatura]['media'] = $media;
            $res[$nombreAsignatura]['suspensos'] = $suspensos;
            $res[$nombreAsignatura]['aprobados'] = $aprobados;
            $res[$nombreAsignatura]['max'] = $max;
            $res[$nombreAsignatura]['min'] = $min;
            
        }
        return $res;
    }
    
    private function checkFormProc1(array $post) : array{
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
                        foreach($datosMateria as $alumno => $nota){
                            if(!is_string($alumno) && !is_array($alumno)){
                                $erroresTexto[] = "Asignatura: '$nombreMateria' el alumno '$alumno' no tiene un nombre válido.";
                            }
                            else if(!is_array($alumno)){
                                if(!is_numeric($nota) && !is_array($nota)){
                                    $erroresTexto[] = "Asignatura: '$nombreMateria', alumno '$alumno' tiene como nota '$nota' que no es válida.";
                                }
                                else if(!is_array($nota)){
                                    if($nota < 0 || $nota > 10){
                                        $erroresTexto[] = "Asignatura: '$nombreMateria', alumno '$alumno' tiene como nota '$nota' que no es válida.";
                                    }
                                }
                                else{
                                    $erroresTexto[] = "Asignatura: '$nombreMateria', alumno '$alumno' tiene como nota un array.";
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
