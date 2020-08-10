<?php
if (!class_exists("connection"))
{
  include ("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";




class institute extends connection
{


  public function instituteSelect()
  {
    $con = new connection();
    //consulta todos los empleados
    $sql = mysqli_query($con->open(), "SELECT * FROM institute");
?>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de institute</h3>
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
        <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="instituteSelectOne('<?php echo $id ?>'); instituteEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="instituteDelete('<?php echo $id ?>');  return false"></button></td>
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
  public function instituteDelete($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = "DELETE FROM institute where id='$codigo';";
    if (mysqli_query($con->open(), $sql)) {
    } else {
    }
    $this->instituteSelect();
  }
  public function instituteInsert($description)
  {
    $con = new connection();
    //registra los datos del institute
    $sql = "INSERT INTO institute (description) VALUES ('$description')";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->instituteSelect();
  }
  public function instituteSelectOne($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = mysqli_query($con->open(), "SELECT * from institute where id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $description = $r["description"];
    echo "<script>
      institute.codigo.value='$codigo';
      institute.description.value='$description';
    
      </script>";
    $this->instituteSelect();
  }
  public function instituteUpdate($codigo, $description)
  {
    $con = new connection();
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    $sql = "UPDATE institute set description='$description'where id='$codigo'";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
        institute.codigo.value='$codigo';
        institute.description.value='$description';
        </script>";
    $this->instituteSelect();
  }
}

$institute = new institute();
if ($metodo == "delete") {
  $institute->instituteDelete($codigo);
} elseif ($metodo == "insert") {
  $institute->instituteInsert($description);
} elseif ($metodo == "select") {
  $institute->instituteSelectOne($codigo);
} elseif ($metodo == "update") {
  $institute->instituteUpdate($codigo, $description);
}
