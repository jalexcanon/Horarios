<?php
session_start();
include('../controlador/conexion.php');
$correo = $_SESSION['ema']; //email usuario
$rol = $_SESSION['rol']; //rol usuario
$inst = $_SESSION['nam']; //nombre instructor (usuario)
$instru = $_SESSION['IDins']; //id instructor
if (!isset($correo)) {
  header("location:../index.php");
}
$ins = mysqli_query($conn, "SELECT * FROM instructor"); // consulta select crear horario instructor 
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title><?php echo $pageTitle ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../css/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/d73cc36adc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <!--divnav-->
  <div>
    <nav id="lt_nav" class="main-header navbar navbar-expand-md navbar-orange navbar-light sticky-top">
      <!--icono de navegación-->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!--crear nuevos registros-->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <?php if ($rol == 1) { ?>
            <li class="nav-item">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" data-toggle="dropdown" style="cursor: pointer; color: #FFFDFC;">
                Crear nuevos registros
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="instructor.create.php">Usuario</a></li>
                <li><a class="dropdown-item" href="ficha.create.php">Ficha</a></li>
                <li><a class="dropdown-item" href="trimestre.php">Trimestre</a></li>
                <li><a class="dropdown-item" href="ambiente.php">Ambiente</a></li>
                <li><a class="dropdown-item" href="programa.php">Programa</a></li>
                <li><a class="dropdown-item" href="sede.php">Sede</a></li>
              </ul>
            </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" data-toggle="dropdown" style="cursor: pointer; color: #FFFDFC">
              Perfil
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="update_usu.php">Cambiar contraseña</a></li>
            <?php } ?>
            <li><a class="dropdown-item" onclick="window.open('../controlador/exit.php','_Self')" style="cursor: pointer"> Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
        <!--imagen Cenigraf-->
        <div class="collapse navbar-collapse d-flex justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <img src="../img/LOGO_WEB.png" alt="">
            </li>
          </ul>
        </div>
        </ul>
      </div>
    </nav>
  </div>
</body>
<!--/divnav-->
<!--lateral-->
<aside id="lt_aside" class="main-sidebar sidebar-dark-primary" style="position: fixed;">

  <a href="horarios.php" class="brand-link" style="color: white;">
    <img src="../img/logo2.png" alt="logo1" class="brand-image img-circle" style="background-color:#ffffff; width: 40px; height:40px; ">
    <span class="brand-text font-weight-bold">CENIGRAF </span>
  </a>
  <div class="sidebar">
    <?php if ($rol == 1) { ?>
      <div class="user-panel mt-4 pb-4 mb-4 d-flex">
        <div class="image">
          <img src="../img/horario.png" alt="User Image">
        </div>
        <div class="info">
          <a href="http://localhost/horarios/vista/admin/horarios_ficha.php" style="color: white;">Crear Horario Ficha</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item">
            <a class="nav-link" href="instructor-tabla.php" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-address-card fa-2x"></i>
              <p>
                Consulta Instructor
              </p>
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="ficha-tabla.php" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-list-alt fa-2x"></i>
              <p>
                Consulta Fichas
              </p>
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="ambiente-tabla.php" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-dungeon fa-2x"></i>
              <p>
                Consulta Ambiente
              </p>
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="programa-tabla.php" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-clipboard-list fa-2x"></i>
              <p>
                Consulta Programa
              </p>
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="sede-tabla.php" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-building fa-2x"></i>
              <p>
                Consulta Sede
              </p>
            </a>
          </li><br>
          <li class="nav-item">
            <a class="nav-link" href="trimestre-tabla.php" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-calendar-alt fa-2x"></i>
              <p>
                Consulta Trimestres
              </p>
            </a>
          </li>
        </ul>
      </nav>
    <?php
    } elseif ($rol == 2) {
    ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item">
            <a class="nav-link" href="imprimir/horarios_Ins_Im.php?ins=<?php echo $instru; ?>" style="cursor: pointer; color: white;">
              <i class="nav-icon fas fa-solid fa-print"></i>
              <p>
                Imprimir | Descargar
              </p>
            </a>
          </li><br>
          </li>
        </ul>
      </nav>
    <?php
    }
    ?>
  </div>
</aside>
</body>
<!--/lateral-->