<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {

    function mostrarAllUsers() {
        $data = [];
        $data['titulo'] = 'All-Usuarios';
        $data['seccion'] = 'all-usuarios';

//        $modelo = new \Com\Daw2\Models\UsuarioModel();
//        $usuarios = $modelo->getAllUsers();

        $usuarios = $this->filtrado();

        $data['usuarios'] = $usuarios;

        $this->view->showViews(array('templates/header.view.php', 'ConsultaUsuarios.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarPorSalario() {
        $data = [];
        $data['titulo'] = 'Por-Salario';
        $data['seccion'] = 'por-salario';

        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUserOrderBySalar();

        $data['usuarios'] = $usuarios;

        $this->view->showViews(array('templates/header.view.php', 'ConsultaUsuarios.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarStandard() {
        $data = [];
        $data['titulo'] = 'Standard-Users';
        $data['seccion'] = 'standard-users';

        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllStandardUsers();

        $data['usuarios'] = $usuarios;

        $this->view->showViews(array('templates/header.view.php', 'ConsultaUsuarios.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarCarlos() {
        $data = [];
        $data['titulo'] = 'Carlos';
        $data['seccion'] = 'carlos';

        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUsersCarlos();

        $data['usuarios'] = $usuarios;

        $this->view->showViews(array('templates/header.view.php', 'ConsultaUsuarios.view.php', 'templates/footer.view.php'), $data);
    }

    function filtrado() {
        if (isset($_GET['selector'])) {
            $modelo = new \Com\Daw2\Models\UsuarioModel();
            $usuarios = $modelo->getByRol($_GET['selector']);
        }else{
            $usuarios = [];
        }
        return $usuarios;
    }
}
