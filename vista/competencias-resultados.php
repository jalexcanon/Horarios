<?php
$pageTitle = 'Competencias y resultados';
include("parte_superior.php");
?>
<div>
  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="container">
        <?php
        $progcon = $_GET['ubP'];
        $query = mysqli_query($conn, "SELECT * FROM programa WHERE id_program=$progcon");
        $row = mysqli_fetch_assoc($query);
        ?>
        <div class="card-body">
          <?php
          if (isset($_GET['v'])) {
            if ($_GET['v'] == 1) {
          ?>
              <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                <strong>Las competencias se actualizaron correctamente</strong>
              </div>
          <?php
            }
          }
          ?>
          <a href="create-competencias.php?ubP=<?php echo $progcon ?>" class="btn btn-success"> Crear competencias</a>
          <div class="table-responsive">
            <table class="table table-bordered table-striped mt-4">
              <thead>
                <tr>
                  <th>Competencias</th>
                  <th>Fecha inicial</th>
                  <th>Fecha Final</th>
                  <th>Instructor</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $contprog = mysqli_query($conn, "SELECT * FROM competencias
                WHERE competencias.programas_id = $progcon");
                while ($row = mysqli_fetch_assoc($contprog)) {
                ?>
                  <form method="post" action="../controlador/ProgramaControllers/update_competencia.php?ubP=<?php echo $progcon ?>">
                    <tr>
                      <td> <input type="number" name="id_competencias" style="display:none;" value="<?php echo $row['id']; ?>">
                        <input type="text" name="competencias" value="<?php echo $row["competencias"]; ?>">
                      </td>
                      <td><input type="date" name="fecha_inicial" value="<?php echo $row["fecha_ini"]; ?>"></td>
                      <td><input type="date" name="fecha_fin" value="<?php echo $row["fecha_fin"]; ?>"></td>
                      <td>
                      <input type="text" name="instructor" value="<?php echo $row["instructor"]; ?>">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi-pencil-square"></i></button>
                        <a class="btn btn-info btn-sm" 
                        href="../controlador/ProgramaControllers/delete_competencia.php?delete=<?php echo $row['id']; ?>&ubP=<?php echo $progcon?> "> <i class="bi-trash"></i></a>
                      </td>
                    </tr>
                  </form>
                <?php
                }

                ?>
              </tbody>
            </table>
          </div>

          <a href="create-resultados.php?create=<?php echo $progcon ?>" class="btn btn-success"> Crear resultados</a>
          <div class="table-responsive">
            <table class="table table-bordered table-striped mt-4">
              <thead>
                <tr>
                  <th>Resultados</th>
                  <th>Instructor</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $contprog = mysqli_query($conn, "SELECT * FROM resultados
                WHERE resultados.programas_id = $progcon");
                while ($row = mysqli_fetch_assoc($contprog)) {
                ?>
                  <form method="post" action="../controlador/ProgramaControllers/update_resultados.php?ubP=<?php echo $progcon ?>">
                    <tr>
                      <td> <input type="number" name="id_resultados" style="display:none;" value="<?php echo $row['id']; ?>">
                        <input type="text" name="resultados" value="<?php echo $row["resultados"]; ?>">
                      </td>
                      <td>
                      <input type="text" name="instructor_resultados" value="<?php echo $row["instructor_resultados"]; ?>">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi-pencil-square"></i></button>
                        <a class="btn btn-info btn-sm" 
                        href="../controlador/ProgramaControllers/delete_resultado.php?delete=<?php echo $row['id']; ?>&ubP=<?php echo $progcon?> "> <i class="bi-trash"></i></a>
                      </td>
                    </tr>
                  </form>
                <?php
                }

                ?>
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="js.js"></script>
<?php
include("parte_inferior.php")
?>