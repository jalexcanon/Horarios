<?php
$pageTitle = 'Ambientes';
include("parte_superior.php");
?>
<div> 
   <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="container"> 
        <?php
         $tablaA="SELECT * FROM `ambiente`,`sede` WHERE `ambiente`.`id_sede`= `sede`.`id`";
         $contA=mysqli_query($conn,$tablaA);
        
        ?>  
        <div class="card-body">
        <div class="table-responsive"> 
          <table id="table" class="table .thead-light table-striped mt-4">
            <thead>
              <tr>              
                <th>Sede</th>
                <th>Nombre ambiente</th>
                <th>Capacidad</th>
                <th>No de equipos</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
           <?php
              while ($Acon=mysqli_fetch_assoc($contA)) {
            ?>
              <tr>              
                <td><?php echo $Acon['nombre_sede'];?></td>
                <td><?php echo $Acon["Nombre_ambiente"];?></td>
                <td><?php echo $Acon["Capacidad_ambiente"];?></td>    
                <td><?php echo $Acon["No_equipos"];?></td>           
                <td>
                  <div class="btn-group">
                    <button class="btn btn-secondary btn-sm" onclick="window.open('admin/horarios_ambiente.php?amb=<?php echo $Acon['id_A']?>','_Self')">Horario</button>
                    <a href="update-ambiente.php?ubA=<?php echo $Acon["id_A"]?>"><button type="submit" class="btn btn-success btn-sm"><i class="bi-pencil-square"></i></button></a>
                    <a href="../controlador/AmbienteControllers/delete.php?eliA=<?php echo $Acon['id_A']?>"><button type="submit" class="btn btn-info btn-sm" onclick="return delete_('¿Esta seguro de eliminar el ambiente?','Se eliminó el ambiente exitosamente.')" ><i class="bi-trash"></i></button></a>
                  </div>
                </td>
              </tr>      
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
<?php
include("parte_inferior.php")
?>

<script src="js.js"></script>  