<?php
declare(strict_types = 1);
namespace Com\Daw2\Controllers;

class ErroresController extends \Com\Daw2\Core\BaseController {
    
    function error404() : void{
       http_response_code(404);
       $data = ['titulo' => 'Error 404'];
       
       $this->view->showViews(array('templates/header.view.php', 'error404.php', 'templates/footer.view.php') , $data);
    }
}