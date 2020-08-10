<?php
if (!class_exists("connection"))
{
  include ("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";




class position extends connection
{


  public function positionSelect()
  {
    $con = new connection();
    //consulta todos los empleados
    $sql = mysqli_query($con->open(), "SELECT * FROM position");
?>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de position</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
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
      ?>
        <!-- Button trigger modal -->
        <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="positionSelectOne('<?php echo $id ?>'); positionEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="positionDelete('<?php echo $id ?>');  return false"></button></td>
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
  public function positionDelete($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = "DELETE FROM position where id='$codigo';";
    if (mysqli_query($con->open(), $sql)) {
    } else {
    }
    $this->positionSelect();
  }
  public function positionInsert($description)
  {
    $con = new connection();
    //registra los datos del position
    $sql = "INSERT INTO position (description) VALUES ('$description')";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->positionSelect();
  }
  public function positionSelectOne($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = mysqli_query($con->open(), "SELECT * from position where id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $description = $r["description"];
    echo "<script>
      position.codigo.value='$codigo';
      position.description.value='$description';
    
      </script>";
    $this->positionSelect();
  }
  public function positionUpdate($codigo, $description)
  {
    $con = new connection();
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    $sql = "UPDATE position set description='$description'where id='$codigo'";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
        position.codigo.value='$codigo';
        position.description.value='$description';
        </script>";
    $this->positionSelect();
  }
}

$position = new position();
if ($metodo == "delete") {
  $position->positionDelete($codigo);
} elseif ($metodo == "insert") {
  $position->positionInsert($description);
} elseif ($metodo == "select") {
  $position->positionSelectOne($codigo);
} elseif ($metodo == "update") {
  $position->positionUpdate($codigo, $description);
}
