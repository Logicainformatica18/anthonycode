<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
if (!class_exists("session")) {
  include("session.php");
}
$id = isset($_SESSION['id']) ? $_SESSION['id'] : "";
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$teacher = isset($_POST['teacher']) ? $_POST['teacher'] : "";
$teacher = substr($teacher, strripos($teacher, "-") + 1, 20);
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$courseid = isset($_POST['courseid']) ? $_POST['courseid'] : "";
$scheduleid = isset($_POST['scheduleid']) ? $_POST['scheduleid'] : "";


class registry extends connection
{


  public function registrySelect()
  {
    $id = $_SESSION["id"];
    if ($_SESSION["position"] == "Administrador") {
      $query = "SELECT r.id,concat(p.firstname,' ',p.lastname,' ',p.names) as teacher,c.description as course,
      s.description as schedule,r.start,r.end from person p 
      inner join registry r inner join course c inner join
      schedule s on r.teacher=p.id and r.courseid=c.id and r.scheduleid=s.id where r.personid='$id';";
    } else if ($_SESSION["position"] == "Docente") {
      $query = "SELECT r.id,concat(p.firstname,' ',p.lastname,' ',p.names) as teacher,c.description as course,
      s.description as schedule,r.start,r.end from person p 
      inner join registry r inner join course c inner join
      schedule s on r.teacher=p.id and r.courseid=c.id and r.scheduleid=s.id where r.teacher='$id';";
    } else if ($_SESSION["position"] == "Alumno") {
      $query = "SELECT rd.registryid,concat(p.firstname,' ',p.lastname,' ',p.names) as teacher,sc.description as schedule,c.description as course,
      s.description
                as specialty, rd.module
                from registrydetail rd inner join registry r inner join person p inner join 
                specialty s inner join schedule sc inner join course c on r.courseid=c.id and r.scheduleid=sc.id and rd.registryid=r.id and r.teacher =p.id and rd.specialtyid=s.id 
                where rd.student='$id'";
    }

    //consulta todos los empleados
    $sql = mysqli_query($this->open(), $query);
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de Registros</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Docente</th>
                      <th>Curso</th>
                      <th>Horario</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Opciones</th>

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
                      echo "<td>" . $row[4] . "</td>";
                      echo "<td>" . $row[5] ."</td>";
                      echo "<td>";
                      if ($_SESSION["position"] == "Administrador") {
                    ?>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary"  onclick="registryDetail('<?php echo $id ?>');   return false">Detalle</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="registrySelectOne('<?php echo $id ?>'); registryEditar();  return false"></button>

                        <!-- <button class="note-icon-pencil" ></button> -->
                        <button class="btn btn-danger note-icon-trash" onclick="registryDelete('<?php echo $id ?>');  return false"></button>

                      <?php
                      }
                      if ($_SESSION["position"] == "Docente") {

                      ?>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="registryDetail('<?php echo $id ?>');   return false">Detalle</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" onclick="registryReport('<?php echo $id ?>'); return false">Reporte</button>
                        <!-- Button trigger modal -->


                      <?php
                      }
            
                      ?>

                      </td>
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
  public function registryDelete($codigo)
  {
    $con = new connection();
    //registra los datos del empleados
    $sql = "DELETE FROM registry where id='$codigo';";
    if (mysqli_query($con->open(), $sql)) {
    } else {
    }
    $this->registrySelect();
  }
  public function registryInsert($id, $teacher, $courseid, $scheduleid, $start, $end)
  {
    //registra los datos del registry
    $sql = "INSERT INTO registry (personid,teacher,courseid,scheduleid,start,end,created_at,updated_at) VALUES ('$id','$teacher','$courseid','$scheduleid','$start','$end',now(),now())";
    mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->registrySelect();
  }
  public function registrySelectOne($codigo)
  {
    //registra los datos del empleados
    $sql = mysqli_query($this->open(), "SELECT r.id,concat(p.firstname,' ',p.lastname,' ',p.names,'-',r.teacher) as teacher,r.courseid,
    r.scheduleid,r.start,r.end from person p 
    inner join registry r inner join course c inner join
    schedule s on r.teacher=p.id and r.courseid=c.id and r.scheduleid=s.id where r.id ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $start = $r["start"];
    $teacher = $r["teacher"];
    $courseid = $r["courseid"];
    $scheduleid = $r["scheduleid"];
    $end = $r["end"];
    echo "<script>
      registry.codigo.value='$codigo';
      registry.teacher.value='$teacher';
      registry.start.value='$start';
      registry.courseid.value='$courseid';
      registry.scheduleid.value='$scheduleid';
      registry.end.value='$end';
    
      </script>";
    $this->registrySelect();
  }
  public function registryUpdate($codigo, $id, $teacher, $courseid, $scheduleid, $start, $end)
  {
    $sql = "UPDATE registry set teacher='$teacher',scheduleid='$scheduleid', start='$start',courseid='$courseid',end='$end',updated_at=now() where id='$codigo' and personid='$id'";

    mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
     registry.codigo.value='$codigo';
      registry.teacher.value='$teacher';
      registry.start.value='$start';
      registry.courseid.value='$courseid';
      registry.scheduleid.value='$scheduleid';
      registry.end.value='$end';
        </script>";
    $this->registrySelect();
  }
  public function registryDetail($codigo)
  {

    if ($_SESSION["position"] == "Administrador") {
      $_SESSION["registryid"] = $codigo;
      echo "<script>	window.location.href='admin_registrydetail.php';</script>";
    } else if ($_SESSION["position"] == "Docente") {
      $_SESSION["registryid"] = $codigo;
      echo "<script>	window.location.href='teacher_registrydetail.php';</script>";
    } else if ($_SESSION["position"] == "Alumno") {
      $_SESSION["registryid"] = $codigo;
      echo "<script>	window.location.href='student_registrydetail.php';</script>";
    }
  }
}

$registry = new registry();
if ($metodo == "delete") {
  $registry->registryDelete($codigo);
} elseif ($metodo == "insert") {
  $registry->registryInsert($id, $teacher, $courseid, $scheduleid, $start, $end);
} elseif ($metodo == "select") {
  $registry->registrySelectOne($codigo);
} elseif ($metodo == "update") {
  $registry->registryUpdate($codigo, $id, $teacher, $courseid, $scheduleid, $start, $end);
} elseif ($metodo == "detail") {
  $registry->registryDetail($codigo);
}
