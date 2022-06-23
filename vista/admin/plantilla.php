<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Horarios ficha <?php if (isset($id_ficha)) {
    echo $titles['Nº ficha'];
  }  ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Font Awesome ---->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/css/adminlte.min.css">
  <!-- jQuery-->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery UI -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- AdminLTE App --> 
  <script src="../../css/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini" >
<!--div1wrapper-->
<div class="wrapper">
    <nav id="lt_nav" class="main-header navbar navbar-expand-md navbar-orange navbar-light sticky-top">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #FFFDFC;"><i class="fas fa-bars"></i></a>
          </li> 
          </ul>                  
            <a class="navbar-brand" onclick="window.open('../horarios.php','_Self')" style="cursor:pointer; font-weight: bold;color: #FFFDFC;">Cenigraf</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false" style="cursor: pointer; color: #FFFDFC;">
                      Perfil
                    </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="../update_usu.php">Cambiar contraseña</a></li>
                    <li><a class="dropdown-item" onclick="window.open('../../controlador/exit.php','_Self')" style="cursor: pointer"> Cerrar sesión</a></li>
                  </ul>
                </li>
        		    </ul>
              </div>
          </nav>
        </div>
        
        <!--/div2-->

       <aside id="lt_aside" class="main-sidebar sidebar-dark-primary" style="position: fixed;">
            
            <a href="../horarios.php" class="brand-link" style="color:white;">
            <i class="bi-house-door-fill ml-3"></i>
              <span class="brand-text font-weight-bold" >CENIGRAF </span>
            </a>   
        <div class="sidebar">              
              <div class="user-panel mt-4 pb-4 mb-4 d-flex">
                <div class="image">
                  <img src="../../img/perfil.png" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block" style="color:white;">Admin-<?php  echo $inst; ?></a>
                </div>
              </div>
              <?php if (isset($_GET['ficha'])) {
                $trimVarvali=$_SESSION['trim'];
                $valVar=mysqli_query($conn,"SELECT * FROM tb_trimestre where id_fch=$id_ficha and estatus_trim_H=1 and Trimestre='$trimVarvali'");
                if (mysqli_num_rows($valVar)>0) {
                  
                }else{
                ?>                
              <div class="user-panel mt-4 pb-4 mb-4 d-flex">  
                <div class="image">
                  <img src="../../img/horario.png" alt="User Image">
                </div>
                
                <div class="info">
                  <a href="" data-toggle="modal" data-target="#myModal" style="color:white;" >Crear Horario</a>
                </div>
              </div>
                
                <?php
                  }
                  ?>

                <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"  role="menu">
                  <li class="nav-item">
                  <a href="../imprimir/horarios_ficha_Im.php?fich=<?php echo $id_ficha; ?>" class="nav-link" style="color:white;"> 
                      <i class="nav-icon fas fa-solid fa-print"></i>
                      <p>
                      Imprimir | Descargar
                      </p>
                    </a>
                  </li>
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" style="color: white;">
                      <i class=" far fa-calendar-alt fa-lg ml-1"></i>
                      <p class="ml-1">
                        Trimestres
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="horarios_ficha.php?ficha=<?php echo $id_ficha?>&trims=<?php echo "I Trimestre"?>&IT=<?php echo "1"?>" class="nav-link <?php if(isset($_GET['IT'])=="1"){ echo "active";}  ?> " style="color: white;">
                          <i class="fas fa-file-export"></i>
                          <p>I Trimestre</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="horarios_ficha.php?ficha=<?php echo $id_ficha?>&trims=<?php echo "II Trimestre"?>&IIT=<?php echo "2"?>" class="nav-link <?php if(isset($_GET['IIT'])=="2"){ echo "active";}  ?> " style="color: white;">
                          <i class="fas fa-file-export"></i>
                          <p>II Trimestre</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="horarios_ficha.php?ficha=<?php echo $id_ficha?>&trims=<?php echo "III Trimestre"?>&IIIT=<?php echo "3"?>" class="nav-link <?php if(isset($_GET['IIIT'])=="3"){ echo "active";}  ?> " style="color: white;">
                          <i class="fas fa-file-export"></i>
                          <p>III Trimestre</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="horarios_ficha.php?ficha=<?php echo $id_ficha?>&trims=<?php echo "IV Trimestre"?>&IVT=<?php echo "4"?>" class="nav-link <?php if(isset($_GET['IVT'])=="4"){ echo "active";}  ?> " style="color: white;">
                          <i class="fas fa-file-export"></i>
                          <p>IV Trimestre</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="horarios_ficha.php?ficha=<?php echo $id_ficha?>&trims=<?php echo "V Trimestre"?>&VT=<?php echo "5"?>" class="nav-link <?php if(isset($_GET['VT'])=="5"){ echo "active";}  ?> " style="color: white;">
                          <i class="fas fa-file-export"></i>
                          <p>V Trimestre</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="horarios_ficha.php?ficha=<?php echo $id_ficha?>&trims=<?php echo "VI Trimestre"?>&VIT=<?php echo "6"?>" class="nav-link <?php if(isset($_GET['VIT'])=="6"){ echo "active";}  ?> " style="color: white;">
                          <i class="fas fa-file-export"></i>
                          <p>VI Trimestre</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>               
              </nav> 
              <?php
                }
              ?>     
                        
        </div>            
      </aside>