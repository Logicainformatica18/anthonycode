<?php
if (!class_exists("connection"))
{
  include ("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$instituteid = isset($_POST['instituteid']) ? $_POST['instituteid'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";




class specialty extends connection
{


  public function specialtySelect()
  {
    $con = new connection();
    //consulta todos los empleados
    $sql = mysqli_query($con->open(), "SELECT * FROM specialty");
?>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de specialty</h3>
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
        <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="specialtySelectOne('<?php echo $id ?>'); specialtyEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="specialtyDelete('<?php echo $id ?>');  return false"></button></td>
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
  public function specialtyDelete($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = "DELETE FROM specialty where id='$codigo';";
    if (mysqli_query($con->open(), $sql)) {
    } else {
    }
    $this->specialtySelect();
  }
  public function specialtyInsert($institute,$description)
  {
    $con = new connection();
    //registra los datos del specialty
    $sql = "INSERT INTO specialty (instituteid,description) VALUES ('$institute','$description')";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->specialtySelect();
  }
  public function specialtySelectOne($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = mysqli_query($con->open(), "SELECT * from specialty where id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $instituteid= $r["instituteid"];
    $description = $r["description"];
    echo "<script>
      specialty.codigo.value='$codigo';
      specialty.instituteid.value='$instituteid';
      specialty.description.value='$description';
    
      </script>";
    $this->specialtySelect();
  }
  public function specialtyUpdate($codigo,$instituteid, $description)
  {
    $con = new connection();
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    $sql = "UPDATE specialty set instituteid='$instituteid',description='$description'where id='$codigo'";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
        specialty.codigo.value='$codigo';
        specialty.instituteid.value='$instituteid';
        specialty.description.value='$description';
        </script>";
    $this->specialtySelect();
  }
}

$specialty = new specialty();
if ($metodo == "delete") {
  $specialty->specialtyDelete($codigo);
} elseif ($metodo == "insert") {
  $specialty->specialtyInsert($instituteid,$description);
} elseif ($metodo == "select") {
  $specialty->specialtySelectOne($codigo);
} elseif ($metodo == "update") {
  $specialty->specialtyUpdate($codigo,$instituteid, $description);
}
