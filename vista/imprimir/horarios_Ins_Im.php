<?php
include('../../controlador/conexion.php');
session_start();
$correo = $_SESSION['ema'];
$inst = $_SESSION['nam'];
if (!isset($correo)) {
  header("location:../../index.php");
}
$id_ins = $_GET['ins'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Horario Instructor Imprimir </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <table>
    <?php
    $query_ins = mysqli_query($conn, "SELECT * FROM instructor where ID= $id_ins");
    $c_ins = mysqli_fetch_assoc($query_ins);
    ?>
    <tr>
      <td colspan="6" rowspan="2"><img src="../../img/sena_horarios_1.png"></td>
      <td>Versión: 03</td>
    </tr>
    <tr>
      <td>Fecha: <?php echo date('M-Y'); ?></td>
    </tr>
    <tr>
      <th colspan="5"><?php echo "Instructor: " . $c_ins['Nombre'] . " " . $c_ins['Apellido'] ?></th>
      <th colspan="2">Fecha: </th>
    </tr>
    <tr>
      <th>Horas</th>
      <th>Lunes</th>
      <th>Martes</th>
      <th>Miercoles</th>
      <th>Jueves</th>
      <th>Viernes</th>
      <th>Sabado</th>
    </tr>

    <?php
    $days = array(0, 1, 2, 3, 4, 5, 6,);
    $hours = array(1, 0, 2, 0, 3, 0, 4, 0, 5, 0, 6, 7, 0, 8);
    foreach ($hours as $hour) {
    ?>
      <tr>
        <?php
        foreach ($days as $day) {
        ?>
          <td>
            <?php
            $query_horas = mysqli_query($conn, "SELECT * FROM horas WHERE id_h=$hour");
            while ($rcon = mysqli_fetch_assoc($query_horas)) {
              if ($day == 0) { ?> <strong><?php echo $rcon['hora']; ?></strong>
              <?php } ?>
            <?php } ?>
            <?php
            $query = "SELECT * FROM horarios,ficha,dias,horas,ambiente,tb_trimestre, programa, instructor 
                WHERE horarios.dia=$day AND horarios.hora=$hour
                AND horarios.instructor=$id_ins
                and horarios.id_ambiente=ambiente.id_A
                AND horarios.ficha=ficha.ID_F
                AND ficha.ID_F = tb_trimestre.id_fch 
                AND horarios.id_trim_fch=tb_trimestre.id_T
                AND horarios.hora = horas.id_h 
                and tb_trimestre.estatus_trim_H=0 
                AND ficha.fc_id_programa=programa.id_program";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if (isset($row)) { ?>
              <ul>
                <li><?php echo $row['Nº ficha']; ?></li>
                <li><?php echo $row['Trimestre']; ?></li>
                <li><?php echo $row['Nom_program']; ?></li>
                <li><?php echo "Amb: " . $row['Nombre_ambiente']; ?></li>
                <li><?php echo "Descripción: " . $row['descripcion']; ?></li>
              </ul>
            <?php
            } elseif (!isset($row)) {
              echo "&nbsp";
            } ?>
          </td><?php
              }
              echo "</tr>";
            }
                ?>
      <?php
      $sumas = "SELECT SUM(horas_instructor) as total FROM horarios,tb_trimestre WHERE horarios.id_trim_fch=tb_trimestre.id_T AND horarios.instructor=$id_ins AND tb_trimestre.estatus_trim_H=0 ";
      $resulsuma = mysqli_query($conn, $sumas);
      $rowsum = mysqli_fetch_array($resulsuma);
      $sum = $rowsum['total'];
      $res = 40 - $sum;
      $total = $sum + $res;
      ?>
      <tr>
        <th colspan="4">Observaciones:</th>
        <th colspan="3">Instructor: <?php echo $c_ins['Nombre'] . " " . $c_ins['Apellido'] ?></th>
      </tr>
      <tr>
        <td colspan="4" rowspan="3"></td>
        <td colspan="2">Horas Directas Formación</td>
        <td colspan="1"><?php echo $sum; ?></td>
      </tr>
      <tr>
        <td colspan="2">Horas pendientes de programar</td>
        <td colspan="1"><?php echo $res; ?></td>
      </tr>
      <tr>
        <td colspan="2">Total:</td>
        <td colspan="1"><?php echo $total ?></td>
      </tr>
  </table>
</body>
<script>
  window.addEventListener("load", window.print());
</script>

</html>