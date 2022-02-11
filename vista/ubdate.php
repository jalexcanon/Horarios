<?php 
 session_start();
 include('../controlador/conexion.php');
  $correo=$_SESSION['ema'];
  $rol=$_SESSION['rol'];
  $inst=$_SESSION['nam'];
  $instru=$_SESSION['IDins'];

 if (!isset($correo)) {
    header("location:../index.php");
 }
  if ($rol==2) {
   header('location:horarios.php');
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Actualizar Instructor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div style="margin: 0 0 0 0;" class="jumbotron jumbotron-fluid">
  <div class="container">
    <center>
      <img class="img" src="../img/cenigraf.png" >
      <img class="img2" src="../img/logo1.png" >
  </center>
  </div>
 </div>
  <!--divnav-->
 <div>
    <nav id="lt_nav" class="main-header navbar navbar-expand-md navbar-orange navbar-light sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li> 
        </ul>                  
            <a class="navbar-brand" onclick="window.open('horarios.php','_Self')" style="cursor: pointer; font-weight: bold;">Cenigraf</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">         
              <li class="nav-item">
                <a class="nav-link" onclick="window.open('../controlador/exit.php','_Self')">Cerrar sesion</a>
              </li>                    
            </ul>
          </div>
        </nav>
 </div><!--/divnav-->
 <!--lateral-->
 <div>
    <aside id="lt_aside" class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
            
            <a href="horarios.php" class="brand-link" style="color:white;">
              <img src="../img/logo1.png"
                   alt="logo1"
                   class="brand-image img-circle elevation-1"
                   style="background-color:#ffffff; width: 40px; height:40px; ">
              <span class="brand-text font-weight-bold">CENIGRAF </span>
            </a>

           
        <div class="sidebar">
              
              <div class="user-panel mt-4 pb-4 mb-4 d-flex">
                <div class="image">
                  <img src="../img/perfil.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block" style="color:white;"><?php 
                  
                   echo "ADMIN-".$inst;
                 
                 ?></a>
                </div>
              </div>             
        </div>
            
                  
        </aside>
 </div>
 <!--/lateral-->
<div class="content-wrapper">
  <div class="container">
   <br>
   <?php 
    $idins=$_GET['ubds'];//id del instructor------------------------------------------------------

    $queryins="SELECT * FROM `instructor`,`roles` where `instructor`.`rol`=`roles`.`id_rol` and `ID`='$idins'";
    $result=mysqli_query($conn,$queryins);
    $rows=$result->fetch_array();
   ?>
    <div class="row" style="display: contents;">
      <div class="col-sm-8 mx-auto">
        <div class="container border" style="padding:4%; background-color: #a2a1a5a8; ">      
            <form action="../controlador/ubdateins.php?ubd=<?php echo $idins?>" method="POST">
              <div class="form-group">
                <label for="nom">Nombre:</label>
                <input type="text" class="mr-sm-2 form-control" value="<?php echo $rows["Nombre"]?>" placeholder="Nombre" name="nombre" id="nom" required="">
              </div>
              <div class="form-group">
                <label for="apel">Apellido:</label>
                <input type="text" class="form-control" value="<?php echo $rows["Apellido"]?>" placeholder="Digite el Apellido" name="apellido" id="apel" required="">
              </div>
              <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="mr-sm-2 form-control " value="<?php echo $rows["email"]?>" placeholder="Digite el Email" name="correo" id="email" required="">
              </div>
               <div class="form-group">
                <label for="dni">Documento de identidad :</label>
                <input type="number" class="mr-sm-2 form-control " value="<?php echo $rows["Cedula"]?>" placeholder="Digite el DNI" name="dnis" id="dni" required="">
              </div>              
               <div class="form-group">
                <label for="roles">Rol del Instructor:</label>
                <select class="form-control" id="roles" name="rol" required="">
                  <option value="<?php echo $rows["id_rol"];?>"><?php echo $rows["rol"]?></option>
                  <option value="2">Instructor</option>
                  <option value="1">ADMIN</option>                  
                </select>
              </div>             
              <center>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning" onclick="window.open('horarios.php','_Self')">Atras</button>
                  <button type="submit" class="btn btn-dark">Actualizar</button>
                </div>
                
              </center>              
            </form>     
          </div>
      </div>
    </div>
   

  </div>
</div>
   <footer class="main-footer">
              <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.1
              </div>
              <strong>Copyright &copy; 2021 <a href="https://comunicaciongraficasena.blogspot.com">Cenigraf</a>.</strong> Todos los derechos reservados.
   </footer>
   
</div>
	
 
<!-- jQuery-->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -- >
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
AdminLTE App --> 
<script src="../css/js/adminlte.min.js"></script>


</body>
</html>