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

  public function courseSelectView()
  {
    //consulta todos los empleados
    $sql = mysqli_query($this->open(), "SELECT id,imageurl,description FROM course;");
  ?>
<!-- Main content -->
<section class="mbr-gallery mbr-slider-carousel cid-s611dDivHx" id="gallery3-3b">
        <div class="container align-center">
        <div class="row">
               <?php
                while ($row = mysqli_fetch_array($sql)) {
                  $imageurl=$row[1];
                  $description=strtoupper($row[2]);
                  echo "   <div class='card col-md-6 col-sm-12 col-lg-4 col-xs-12 shadow p-1 mb-2 bg-white rounded'>
                  <a href='#'><img  src='https://media.giphy.com/media/CmAKqKNZIaMdAoOkFR/giphy.gif' class=' rounded border border-warning' width='100%' height='200' alt='...'>
                              <div class='card-body'>
                                   <h5 class='card-title '><b>$description</b></h5>
                                  
                                     </a>
                                      
                                         
                                        ";  
                      echo "  
                          </div>
                        </div>
                       
                        ";
                }
                ?>
       
        </div>
    </div>
</section>
<!-- /.content -->
<?php
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
