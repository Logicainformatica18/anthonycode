<?php
if (!class_exists("connection"))
{
  include ("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";




class schedule extends connection
{


  public function scheduleSelect()
  {
    $con = new connection();
    //consulta todos los empleados
    $sql = mysqli_query($con->open(), "SELECT * from schedule");
?>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de Horario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Descripción</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
      <?php
      while ($row = mysqli_fetch_array($sql)) {
        echo "<tr>";
        $id = $row[0];
        echo "<td>" .  $id . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
      ?>
        <!-- Button trigger modal -->
        <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="scheduleSelectOne('<?php echo $id ?>'); scheduleEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="scheduleDelete('<?php echo $id ?>');  return false"></button></td>
      <?php
        echo "</tr>";
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</section>
<!-- /.content -->

<?php
  }
  public function scheduleDelete($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = "DELETE FROM schedule where id='$codigo';";
    if (mysqli_query($con->open(), $sql)) {
    } else {
    }
    $this->scheduleSelect();
  }
  public function scheduleInsert($specialty,$description,$end)
  {
    $con = new connection();
    //registra los datos del schedule
    $sql = "INSERT INTO schedule (start,description,end,created_at,updated_at) VALUES ('$specialty','$description','$end',now(),now())";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->scheduleSelect();
  }
  public function scheduleSelectOne($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = mysqli_query($con->open(), "SELECT * from schedule where id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $start= $r["start"];
    $description = $r["description"];
    $end = $r["end"];
    echo "<script>
      schedule.codigo.value='$codigo';
      schedule.start.value='$start';
      schedule.description.value='$description';
      schedule.end.value='$end';
    
      </script>";
    $this->scheduleSelect();
  }
  public function scheduleUpdate($codigo,$start, $description,$end)
  {
    $con = new connection();
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    $sql = "UPDATE schedule set start='$start',description='$description',end='$end',updated_at=now() where id='$codigo'";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
    schedule.codigo.value='$codigo';
    schedule.start.value='$start';
    schedule.description.value='$description';
    schedule.end.value='$end';
        </script>";
    $this->scheduleSelect();
  }
}

$schedule = new schedule();
if ($metodo == "delete") {
  $schedule->scheduleDelete($codigo);
} elseif ($metodo == "insert") {
  $schedule->scheduleInsert($start,$description,$end);
} elseif ($metodo == "select") {
  $schedule->scheduleSelectOne($codigo);
} elseif ($metodo == "update") {
  $schedule->scheduleUpdate($codigo,$start, $description,$end);
}
