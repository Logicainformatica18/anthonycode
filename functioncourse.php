<?php
if (!class_exists("connection"))
{
  include ("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$specialtyid = isset($_POST['specialtyid']) ? $_POST['specialtyid'] : "";
$cicle = isset($_POST['cicle']) ? $_POST['cicle'] : "";

$description = isset($_POST['description']) ? $_POST['description'] : "";




class course extends connection
{


  public function courseSelect()
  {
    $con = new connection();
    //consulta todos los empleados
    $sql = mysqli_query($con->open(), "SELECT c.id,c.description,s.description as specialty FROM course c
    inner join specialty  s on c.specialtyid=s.id");
?>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de course</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Carrera</th>
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
      ?>
        <!-- Button trigger modal -->
        <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="courseSelectOne('<?php echo $id ?>'); courseEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="courseDelete('<?php echo $id ?>');  return false"></button></td>
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
  public function courseDelete($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = "DELETE FROM course where id='$codigo';";
    if (mysqli_query($con->open(), $sql)) {
    } else {
    }
    $this->courseSelect();
  }
  public function courseInsert($specialty,$description,$cicle)
  {
    $con = new connection();
    //registra los datos del course
    $sql = "INSERT INTO course (specialtyid,description,cicle,created_at,updated_at) VALUES ('$specialty','$description','$cicle',now(),now())";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->courseSelect();
  }
  public function courseSelectOne($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = mysqli_query($con->open(), "SELECT * from course where id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $specialtyid= $r["specialtyid"];
    $description = $r["description"];
    $cicle = $r["cicle"];
    echo "<script>
      course.codigo.value='$codigo';
      course.specialtyid.value='$specialtyid';
      course.description.value='$description';
      course.cicle.value='$cicle';
    
      </script>";
    $this->courseSelect();
  }
  public function courseUpdate($codigo,$specialtyid, $description,$cicle)
  {
    $con = new connection();
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    $sql = "UPDATE course set specialtyid='$specialtyid',description='$description',cicle='$cicle',updated_at=now() where id='$codigo'";
    mysqli_query($con->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
    course.codigo.value='$codigo';
    course.specialtyid.value='$specialtyid';
    course.description.value='$description';
    course.cicle.value='$cicle';
        </script>";
    $this->courseSelect();
  }
}

$course = new course();
if ($metodo == "delete") {
  $course->courseDelete($codigo);
} elseif ($metodo == "insert") {
  $course->courseInsert($specialtyid,$description,$cicle);
} elseif ($metodo == "select") {
  $course->courseSelectOne($codigo);
} elseif ($metodo == "update") {
  $course->courseUpdate($codigo,$specialtyid, $description,$cicle);
}
