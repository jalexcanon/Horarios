  <?php
include ('../conexion.php');
session_start();
$correo=$_SESSION['ema'];

if (!isset($correo)) {
    header("location:../index.php");
}
$rol=$_SESSION['rol'];
 if ($rol==2) {
   header('location:../horarios.php');
}

$ficha_fechas=$_POST['ficha_fecha'];
$date_i_I=$_POST['date_i_I'];     $date_f_I=$_POST['date_f_I']; $instructor_1=$_POST['instructor_1'];
$date_i_II=$_POST['date_i_II'];   $date_f_II=$_POST['date_f_II']; $instructor_2=$_POST['instructor_2'];
$date_i_III=$_POST['date_i_III']; $date_f_III=$_POST['date_f_III']; $instructor_3=$_POST['instructor_3'];
$date_i_IV=$_POST['date_i_IV'];   $date_f_IV=$_POST['date_f_IV']; $instructor_4=$_POST['instructor_4'];
$date_i_V=$_POST['date_i_V'];     $date_f_V=$_POST['date_f_V']; $instructor_5=$_POST['instructor_5'];
$date_i_VI=$_POST['date_i_VI'];   $date_f_VI=$_POST['date_f_VI']; $instructor_6=$_POST['instructor_6'];

$trim_I="I Trimestre";
$trim_II="II Trimestre";
$trim_III="III Trimestre";
$trim_IV="IV Trimestre";
$trim_V="V Trimestre";
$trim_VI="VI Trimestre";


 $query = "INSERT INTO `tb_trimestre` (`id_T`,`Trim_date_Inc`,`Trim_date_fin`,`Trimestre`,`id_fch`, `instructor_id`) VALUES 
     (NULL, '$date_i_I', '$date_f_I','$trim_I','$ficha_fechas','$instructor_1'),
     (NULL,'$date_i_II', '$date_f_II','$trim_II','$ficha_fechas','$instructor_2'),
     (NULL,'$date_i_III', '$date_f_III','$trim_III','$ficha_fechas','$instructor_3'),
     (NULL,'$date_i_IV', '$date_f_IV','$trim_IV','$ficha_fechas','$instructor_4'),
     (NULL,'$date_i_V', '$date_f_V','$trim_V','$ficha_fechas','$instructor_5'),
     (NULL,'$date_i_VI','$date_f_VI','$trim_VI','$ficha_fechas','$instructor_6')";
 $querys=mysqli_query($conn,"UPDATE ficha set `estatus_trim`=1 where ID_F='$ficha_fechas'");
 
  
   
    header("location:../../vista/horarios.php?vtf=1"); 
 

	
	mysqli_query($conn, $query); 
	 

  ?>