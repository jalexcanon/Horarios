<?php
$pageTitle = 'Editar ficha';
include("parte_superior.php");
?>
<div class="content-wrapper">
  <div class="container">
    <br>
    <?php
    $idfc = $_GET['ubf']; //id de la ficha------------------------------------------------------

    $queryf = "SELECT * FROM ficha,programa where `ID_F`='$idfc' and ficha.fc_id_programa=programa.id_program";
    $result = mysqli_query($conn, $queryf);
    $rows = $result->fetch_array();
    ?>
    <div class="row" style="display: contents;">
      <div class="col-sm-8 mx-auto">
        <div class="container border" style="padding:4%; background-color: #a2a1a5a8; ">
          <form action="../controlador/FichaControllers/update.php?ubf=<?php echo $idfc ?>" method="POST">
            <div class="form-group">
              <label for="fi">Numero de ficha:</label>
              <input type="number" class="mr-sm-2 form-control" value="<?php echo $rows['Nº ficha'] ?>" placeholder="Ficha" name="fich" id="fi" required="">
            </div>
            <div class="form-group">
              <label for="nop">Cantidad de aprendices:</label>
              <input type="number" class="form-control" value="<?php echo $rows['fc_cant_aprend'] ?>" placeholder="Cantidad de aprendices" name="can_apren" id="nop" required="">
            </div>
            <div class="form-group">
              <label for="jor">Jornada:</label>
              <select class="form-control" id="jor" name="jornad" required="">
                <option value="<?php echo $rows['fc_jornada'] ?>"><?php echo $rows['fc_jornada'] ?></option>
                <option value="Diurna">Diurna </option>
                <option value="Nocturna">Nocturna</option>
                <option value="Mixta">Mixta</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tipf">Tipo de Formacion:</label>
              <select class="form-control" id="tipf" name="tipof" required="">
                <option value="<?php echo $rows['fc_tipo_formacion'] ?>"><?php echo $rows['fc_tipo_formacion'] ?></option>
                <option value="Presencial">Presencial </option>
                <option value="Virtual">Virtual</option>
              </select>
            </div>
            <div class="form-group">
              <?php
              $prog = "SELECT * FROM programa";
              $cons = mysqli_query($conn, $prog);
              ?>
              <label for="progC">Nombre del programa:</label>
              <select class="form-control" id="progC" name="program" required="">
                <option value="<?php echo $rows['id_program'] ?>"><?php echo $rows['Nom_program'] ?></option>
                <?php
                while ($cod_p = mysqli_fetch_assoc($cons)) {
                ?>
                  <option value="<?php echo $cod_p['id_program'] ?>"><?php echo $cod_p['Nom_program'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="f_i">Fecha inicio:</label>
              <input type="date" class="form-control" value="<?php echo $rows['fic_date_I'] ?>" name="date_i" id="f_i" required="">
            </div>
            <div class="form-group">
              <label for="f_f">Fecha Fin:</label>
              <input type="date" class="form-control" value="<?php echo $rows['fic_date_F'] ?>" name="date_f" id="f_f" required="">
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-secondary" onclick="window.open('ficha-tabla.php','_Self')"><i class="bi-arrow-left"></i>Atrás</button>
              <button type="submit" class="btn btn-success" onclick="return update_ficha()">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include("parte_inferior.php");
?>
<script>
  function update_ficha() {
    alert('La ficha se actualizó exitosamente.');
  }
</script>
</body>

</html>