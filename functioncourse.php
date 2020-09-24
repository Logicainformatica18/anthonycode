<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$specialtyid = isset($_POST['specialtyid']) ? $_POST['specialtyid'] : "";
$cicle = isset($_POST['cicle']) ? $_POST['cicle'] : "";
$photo = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : "";
//comprobamos si hay una photo o no
if ($photo != "") {
  //Convertimos la información de la imagen en binario para insertarla en la BBDD
  $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
}
$description = isset($_POST['description']) ? $_POST['description'] : "";




class course extends connection
{


  public function courseSelect()
  {
    $con = new connection();
    //consulta todos los empleados
    $sql = mysqli_query($con->open(), "SELECT c.id,c.description,s.description as specialty,c.photo FROM course c
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
                      <th>Imagen</th>
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
                      // decodificar base 64
                      $photo = base64_encode($row[3]);
                      if ($photo == "") {
                        echo "<td >No Disponible</td>";
                      } else {
                        echo "<td ><img src='data:image/jpeg;base64,$photo' width='100'height='100'></td>";
                      }
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
  public function courseInsert($specialty, $description, $cicle, $photo)
  {
    $con = new connection();
    //registra los datos del course
    $sql = "INSERT INTO course (specialtyid,description,cicle,created_at,updated_at,photo) VALUES ('$specialty','$description','$cicle',now(),now(),'$photo')";
    if (mysqli_query($this->open(), $sql)) {

      $directorio = $description;
      $directorio = str_replace(" ", "-", $directorio);
      $directorio = str_replace("#", "sharp", $directorio);
      $directorio = "cursos/" . $directorio;
      if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
      }

      $title_post = "<!DOCTYPE html>
      <html>
      <head>
          <meta charset='UTF-8'>
          <meta http-equiv='X-UA-Compatible' content='IE=edge'>
          <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1'>
          <title>$description</title>";
            $php1 = "<?php include ('../head_course.php'); include('../../functioncourse.php'); ?>";
            $php2 = "<?php include ('../footer_course.php') ?>";
            $method='$course->courseListView';
            $post="<?php $method('$description') ?>";
            $disquis = "<div id='disqus_thread'></div>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anthonycode-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>";


$contenido = $title_post . $php1 . "<h1 class='title_post'>$description</h1><p>$post</p>$disquis" . $php2;
file_put_contents($directorio ."/". "index.php", $contenido);

      echo "<script>alert('Registrado Correctamente')</script>";
     
    }


    $this->courseSelect();
  }
  public function courseSelectOne($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = mysqli_query($con->open(), "SELECT * from course where id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $specialtyid = $r["specialtyid"];
    $description = $r["description"];
    $cicle = $r["cicle"];
    $photo = $r["photo"];
    if (isset($photo) == "") {
      $photo = "https://via.placeholder.com/150";
    } else {
      $photo = "data:image/jpeg;base64," . base64_encode($r["photo"]);
    }
    echo "<script>
      course.codigo.value='$codigo';
      course.specialtyid.value='$specialtyid';
      course.description.value='$description';
      course.cicle.value='$cicle';
      document.getElementById('blah').src='$photo';
    
      </script>";
    $this->courseSelect();
  }
  public function courseUpdate($codigo, $specialtyid, $description, $cicle, $photo)
  {
    $con = new connection();
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    $sql = "UPDATE course set specialtyid='$specialtyid',description='$description',cicle='$cicle',updated_at=now(),photo='$photo' where id='$codigo'";
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
    $sql = mysqli_query(
      $this->open(),
      "SELECT c.id,c.photo,c.description FROM course c inner join topic t on c.id=t.courseid order by c.created_at DESC;"
    );
  ?>
    <!-- Main content -->
    <section class="mbr-gallery mbr-slider-carousel cid-s611dDivHx" id="gallery3-3b">
      <div class="container align-center">
        <div class="row">
          <?php
          while ($row = mysqli_fetch_array($sql)) {
            // decodificar base 64
            $photo = base64_encode($row[1]);
            $page = str_replace(" ", "-", $row[2]);
            $page = str_replace("#", "sharp", $page);
            if ($photo == "") {
              $photo = "https://concepto.de/wp-content/uploads/2015/08/informatica-1-e1590711788135.jpg";
            } else {
              $photo =  "data:image/jpeg;base64,$photo";
            }
            $description = strtoupper($row[2]);
            echo "   <div class='card col-md-6 col-sm-12 col-lg-4 col-xs-12 shadow p-1 mb-2 bg-white rounded'>
                  <a href='cursos/$page'><img  src='$photo' class=' rounded border border-warning' width='100%' height='200' alt='...'>
                              <div class='card-body'>
                                   <h5 class='card-title '><b>$description</b></h5>
                                     </a>";
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
  public function courseListView($course){
      //consulta todos los empleados
      $sql = mysqli_query(
        $this->open(),
        "SELECT t.id,t.imageurl,t.title,t.description FROM course c inner join topic t on c.id=t.courseid where c.description like '$course' order by t.week ASC;"
      );
    ?>
      <!-- Main content -->
      <section class="mbr-gallery mbr-slider-carousel cid-s611dDivHx" id="gallery3-3b">
        <div class="container center-align">
          <div class="row">
            <?php
            while ($row = mysqli_fetch_array($sql)) {
              // decodificar base 64
              $photo = $row[1];
              $page = str_replace(" ", "-", $row[2]);
              $page = str_replace("#", "sharp", $page);
              if ($photo == "") {
                $photo = "https://concepto.de/wp-content/uploads/2015/08/informatica-1-e1590711788135.jpg";
              } 
              $title = strtoupper($row[2]); 
              $description=$row[3];    
                          echo "<div class='card mb-2  shadow p-1 mb-2 bg-white rounded  border border-warning'width='100%' >
                              <div class='row no-gutters'>
                                  <div class='col col-sm-12 col-md-12 col-lg-2'>
                                 <a href='$page.php'><img src='$photo' width='100%' class='p-4'  alt='...'>
                                  </div>
                                  <div class='col col-sm-12 col-md-12 col-lg-8'>
                                      <div class='card-body'>
                                          <p class='card-title'>$title</p>
                                          <p class='card-text'>$description</p>
                                      </div>
                                  </div>
                                  </a>
                            ";
                          echo "  
                          </div>
                        </div>";

      
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
  $course->courseInsert($specialtyid, $description, $cicle, $photo);
} elseif ($metodo == "select") {
  $course->courseSelectOne($codigo);
} elseif ($metodo == "update") {
  $course->courseUpdate($codigo, $specialtyid, $description, $cicle, $photo);
}
