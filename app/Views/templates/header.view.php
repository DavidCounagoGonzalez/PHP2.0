<!DOCTYPE html>
<html lang="en">
<head>
  <base href="/">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script src="https://kit.fontawesome.com/a3b3463635.js" crossorigin="anonymous"></script>
  <!-- Select 2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"> 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="text-danger fas fa-sign-out-alt"></i>
        </a>        
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DWES App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuario</a>
        </div>
      </div>
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                    Formularios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/formulario" class="nav-link <?php echo isset($seccion) && $seccion === 'formulario' ? 'active' : ''; ?>">
                  <i class="fas fa-parachute-box nav-icon"></i>
                  <p>Formulario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/anagrama" class="nav-link <?php echo isset($seccion) && $seccion === 'anagrama' ? 'active' : ''; ?>">
                  <i class="fas fa-cubes nav-icon"></i>
                  <p>Anagrama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/letra-palabras" class="nav-link <?php echo isset($seccion) && $seccion === 'letra-palabras' ? 'active' : ''; ?>">
                  <i class="fas fa-cube nav-icon"></i>
                  <p>Palabras-letra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/contar-letras" class="nav-link <?php echo isset($seccion) && $seccion === 'contar-letras' ? 'active' : ''; ?>">
                    <i class="fas fa-cube nav-icon"></i>
                    <p>Contar Letras</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="/notas-alumnos" class="nav-link <?php echo isset($seccion) && $seccion === 'notas-alumnos' ? 'active' : ''; ?>">
                      <i class="fas fa-cube nav-icon"></i>
                      <p>Notas Alumnos</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/calculo-notas" class="nav-link <?php echo isset($seccion) && $seccion === 'calculo-notas' ? 'active' : ''; ?>">
                      <i class="fas fa-solid fa-calculator nav-icon"></i>
                      <p> Cálculo Notas</p>
                  </a>
              </li>
            </ul>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                    Base de Datos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/all-usuarios" class="nav-link <?php echo isset($seccion) && $seccion === 'all-usuarios' ? 'active' : ''; ?>">
                            <i class="fas fa-solid fa-database nav-icon"></i>
                            <p>All Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/por-salario" class="nav-link <?php echo isset($seccion) && $seccion === 'por-salario' ? 'active' : ''; ?>">
                            <i class="fas fa-solid fa-database nav-icon"></i>
                            <p>Por Salario</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/standard-users" class="nav-link <?php echo isset($seccion) && $seccion === 'standard-users' ? 'active' : ''; ?>">
                            <i class="fas fa-solid fa-database nav-icon"></i>
                            <p>Usuarios Estandar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/carlos" class="nav-link <?php echo isset($seccion) && $seccion === 'carlos' ? 'active' : ''; ?>">
                            <i class="fas fa-solid fa-database nav-icon"></i>
                            <p>Carlos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/con-filtros" class="nav-link <?php echo isset($seccion) && $seccion === 'con-filtros' ? 'active' : ''; ?>">
                            <i class="fas fa-solid fa-database nav-icon"></i>
                            <p>Con Filtros</p>
                        </a>
                    </li>
                </ul>
              </li>
            </ul>
          </li>                   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php             
            echo isset($titulo) ? $titulo : '' ?></h1>
          </div><!-- /.col -->
          <?php 
          
          if(isset($breadcrumb) && is_array($breadcrumb)){
              ?>          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php    
                
                foreach($breadcrumb as $b){
                ?>
              <li class="breadcrumb-item"><?php echo $b; ?></li>             
              <?php
                }?>
            </ol>
          </div><!-- /.col -->
          <?php
          }
          ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
      <div class="container-fluid">