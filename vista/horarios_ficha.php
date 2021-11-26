<?php 
 session_start();
 include('../controlador/conexion.php');
  $correo=$_SESSION['ema'];//email usuario
  $rol=$_SESSION['rol'];//rol usuario
  $inst=$_SESSION['nam'];//nombre instructor (usuario)
  $instru=$_SESSION['IDins'];//id instructor
 if (!isset($correo)) {
    header("location:../index.php");
 }
 $id_fch_cons=$_SESSION['fch_cons'];
 if (isset($_GET['Trimestres'])) {
$tm_fch=$_GET['Trimestres'];

 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>beta</title>
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
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-light sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li> 
        </ul>                  
            <a class="navbar-brand" onclick="window.open('horarios.php','_Self')" style="cursor: pointer;">Cenigraf</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">             
              
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" data-target="#colap" style="cursor: pointer;">Seleccione el trimestre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="window.open('../controlador/exit.php','_Self')" style="cursor: pointer;">Cerrar sesion</a>
              </li>                     
            </ul>
          </div>
        </nav>
 </div><!--/divnav-->
 <!--lateral-->
 <div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
            
            <a href="horarios.php" class="brand-link">
              <img src="../img/logo1.png"
                   alt="logo1"
                   class="brand-image img-circle elevation-1"
                   style="background-color:#ffffff; width: 40px; height:40px; ">
              <span class="brand-text font-weight-light">CENIGRAF </span>
            </a>

           
        <div class="sidebar">
              
              <div class="user-panel mt-4 pb-4 mb-4 d-flex">
                <div class="image">
                  <img src="../img/perfil.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block"><?php 
                  if ($rol==1) {
                   echo "ADMIN-".$inst;
                 }elseif ($rol==2) {
                  echo "Instructor-".$inst;;
                 }
                 ?></a>
                </div>
              </div>                              
        </aside>
 </div>
 <!--/lateral-->

<div class="content-wrapper">
  <div class="container">
<br>
   <div class="collapse" id="colap">
      <div class="container border" style="padding:4%; background-color: #a2a1a5a8;" >
        <form method="GET" class="form-horizontal">
          <div class="form-group">
                <label for="tm">Trimestre:</label>
                <select class="form-control" id="tm" name="Trimestres">
                        <option value="0">Seleccione el trimestre </option>
                        <option value="I Trimestre">I Trimestre</option>
                        <option value="II Trimestre">II Trimestre</option>
                        <option value="III Trimestre">III Trimestre</option> 
                        <option value="IV Trimestre">IV Trimestre</option>
                        <option value="V Trimestre">V Trimestre</option>
                        <option value="VI Trimestre">VI Trimestre</option>                    
                </select>
          </div>
                  <button type="submit" class="btn btn-dark">Enviar</button>
        </form>
      </div>
    </div>
<?php 
if (isset($_GET['ficha'])) {
  $fch=$_GET['ficha'];
  $_SESSION['fch_cons']=$fch;
}




if (isset($_GET['Trimestres'])) {

$tm_c=$_GET['Trimestres'];

$tm_cons=mysqli_query($conn,"SELECT * FROM ficha,tb_trimestre WHERE ficha.ID_F=tb_trimestre.id_fch and tb_trimestre.Trimestre='$tm_c' and ficha.ID_F='$id_fch_cons'");
$cons_row=mysqli_fetch_assoc($tm_cons);
$tm_hrs=$cons_row['id_T'];

$queryf="SELECT * FROM ficha,programa,tb_trimestre WHERE ficha.ID_F='$id_fch_cons' and tb_trimestre.id_T='$tm_hrs' and ficha.fc_id_programa=programa.id_program AND tb_trimestre.id_fch=ficha.ID_F";
$fchc=mysqli_query($conn,$queryf);
$rows=mysqli_fetch_assoc($fchc);


    
 
?>
<!--/tabla_ficha-->
<div class="container">            
       <center> <h3> <?php echo "Ficha ".$rows['Nº ficha']." Programa ".$rows['Nom_program'];?></h3>
        <h3><?php echo $rows['Trimestre'] ?></h3></center>  <br>
       <div class="container"><!--div1tabla --> 
         <table style="border: 1px solid; ">
                <tr>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50" ><center>Horas</center></th>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50"><center>Lunes</center></th>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50"><center>Martes</center></th>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50"><center>Miercoles</center></th>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50"><center>Jueves</center></th>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50"><center>Viernes</center></th>
                  <th bgcolor="E69138" WIDTH="100" HEIGHT="50"><center>Sabado</center></th>
                </tr>

                <tr></tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>6:00 - 7:40</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                  <tr>
                    <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center> 7:40 - 8:00 </center></th>
                    <th colspan="12" WIDTH="50" HEIGHT="50" bgcolor="E69138" style = "position: relative; z-index: 1;border: 1px solid;"><center> DESCANSO </center></th>
                  </tr>
                <tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>8:00-9:40</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                   <tr>
                    <th bgcolor="E69138" WIDTH="200" HEIGHT="100"> <center> 9:40 - 10:00 </center></th>
                    <th colspan="12" WIDTH="50" HEIGHT="50" bgcolor="E69138" style = "position: relative; z-index: 1; border: 1px solid;"><center> DESCANSO </center></th>
                  </tr>
                <tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>10:00-11:40</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                   <tr>
                    <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center> 11:40 - 12:00 </center></th>
                    <th colspan="12" WIDTH="50" HEIGHT="50" bgcolor="E69138" style = "position: relative; z-index: 1; border: 1px solid;"><center> DESCANSO </center></th>
                   </tr>
                   <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>12:00-13:40</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                   <tr>
                    <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center> 13:40 - 14:20 </center></th>
                    <th colspan="12" WIDTH="50" HEIGHT="50" bgcolor="E69138" style = "position: relative; z-index: 1;border: 1px solid;"><center> DESCANSO </center></th>
                   </tr>
                <tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>14:20-16:00</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                   <tr>
                    <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center> 16:00 - 16:20 </center></th>
                    <th colspan="12" WIDTH="50" HEIGHT="50" bgcolor="E69138" style = "position: relative; z-index: 1; border: 1px solid;"><center> DESCANSO </center></th>
                   </tr>
                <tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>16:20-18:00</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                <tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>18:15-19:45</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
                   <tr>
                    <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center> 19:45 - 20:00 </center></th>
                    <th colspan="12" WIDTH="50" HEIGHT="50" bgcolor="E69138" style = "position: relative; z-index: 1; border: 1px solid;"><center> DESCANSO </center></th>
                   </tr>
                <tr>
                  <th bgcolor="E69138" WIDTH="200" HEIGHT="100" style="border: 1px solid;"> <center>20:00-21:40</center></th>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                  <td WIDTH="200" HEIGHT="100">&nbsp</td>
                </tr>
               
              </table>
        
       </div><!--/div1tabla -->
       <!--div1 -->          
       <div class="container">
          <div style="position: relative;
                              bottom: 1401px;
                              margin: 0 0 0 154px;
                              margin-right: 0px;
                              max-WIDTH: 966px; 
                              max-HEIGHT:100px;
                                  "> <!--div2 -->
                          <table class="table table-bordered">
                           <?php
                                
                             $days = array(1,2,3,4,5,6,);
                            $hours = array(1,0,2,0,3,0,4,0,5,0,6,7,0,8);

                              foreach ($hours as $hour) {
                                ?>
                                 <tr>
                                <?php
                                
                                  foreach ($days as $day) {
                                      ?>

                                       <td bgcolor="EFD5BA" width="17%" height="100px" style="border: 1px solid; padding: 0;">

                                      <?php
$query = "SELECT * FROM horarios,ficha,instructor,dias,horas,ambiente,tb_trimestre WHERE horarios.dia=$day AND horarios.hora=$hour AND horarios.dia=dias.id AND horarios.ficha=ficha.ID_F AND horarios.instructor = instructor.ID AND horarios.id_ambiente=ambiente.id_A AND ficha.ID_F = tb_trimestre.id_fch and horarios.id_trim_fch='$tm_hrs' and tb_trimestre.Trimestre='$tm_c' and horarios.hora = horas.id_h and horarios.ficha=$id_fch_cons";
                                      $result = mysqli_query($conn, $query);
                                      $row = mysqli_fetch_assoc($result); 
                                       if (isset($row)) { ?>                                                                              
                    <center>
                                       <?php  echo $row['Nombre'];?><br> 
                                       <?php  echo $row['Trimestre'];?><br>
                                       <?php  echo $row['Nombre_ambiente'];?>                    
                   </center>   
 
                                      <?php
                                      }elseif (!isset($row)) {
                                          echo "&nbsp";
                                          
                                      }
                                      ?>
                                      </td>
                                      <?php                                     
                                  }
                                  echo "</tr>";
                              }


                           ?>  
                       </table>      
          </div><!--/div2 --> 
        </div><!--/div1 -->
</div><!--/tabla_ficha-->
<?php  
}
?>





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
<!-- AdminLTE App --> 
<script src="../css/js/adminlte.min.js"></script>


</body>
</html>