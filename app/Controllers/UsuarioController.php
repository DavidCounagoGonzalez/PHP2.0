<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class UsuarioController extends \Com\Daw2\Core\BaseController {

    function mostrarAllUsers() {
        $data = [];
        $data['titulo'] = 'All-Usuarios';
        $data['seccion'] = 'all-usuarios';

        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getAllUsers();
        
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
    
    function mostrarListadoFiltros(){
        $data = [];
        $data['titulo'] = 'Con filtros';
        $data['seccion'] = 'con-filtros';
        
        $input = filter_var_array($_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $modelo = new \Com\Daw2\Models\UsuarioModel();
        $usuarios = $modelo->getByFiltros($_GET);
        
        $rolModel = new \Com\Daw2\Models\RolesModel();
        $roles = $rolModel->getAllRols();
        $paisesModel = new \Com\Daw2\Models\PaisesModel();
        $paises = $paisesModel->getAllPaises();

        $data['usuarios'] = $usuarios;
        $data['roles'] = $roles;
        $data['paises'] = $paises;
        $data['input'] = $input;
        
        $data['js'] = array('plugins/select2/js/select2.full.min.js', 'assets/js/pages/usuarios-filtro.view.js');

        $this->view->showViews(array('templates/header.view.php', 'ListaFiltros.view.php', 'templates/footer.view.php'), $data);
    }
}