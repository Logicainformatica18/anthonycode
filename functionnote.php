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
$student = isset($_POST['student']) ? $_POST['student'] : "";
$student = substr($student, strripos($student, "-") + 1, 20);
$module = isset($_POST['module']) ? $_POST['module'] : "";
$registryid = isset($_SESSION['registryid']) ? $_SESSION['registryid'] : "";
$specialtyid = isset($_POST['specialtyid']) ? $_POST['specialtyid'] : "";

//
$n1 = isset($_POST["n1"]) ? $_POST["n1"] : "";
$n2 = isset($_POST["n2"]) ? $_POST["n2"] : "";
$n3 = isset($_POST["n3"]) ? $_POST["n3"] : "";
$n4 = isset($_POST["n4"]) ? $_POST["n4"] : "";
$n5 = isset($_POST["n5"]) ? $_POST["n5"] : "";
$ex1 = isset($_POST["ex1"]) ? $_POST["ex1"] : "";
$n7 = isset($_POST["n7"]) ? $_POST["n7"] : "";
$n8 = isset($_POST["n8"]) ? $_POST["n8"] : "";
$n9 = isset($_POST["n9"]) ? $_POST["n9"] : "";
$n10 = isset($_POST["n10"]) ? $_POST["n10"] : "";
$n11 = isset($_POST["n11"]) ? $_POST["n11"] : "";
$ex2 = isset($_POST["ex2"]) ? $_POST["ex2"] : "";
class note extends connection
{


  public function noteSelect()
  {
    $id = $_SESSION["id"];
    $query = "SELECT rd.id,rd.registryid,concat(p.firstname,' ',p.lastname,' ',p.names) as teacher,sc.description as schedule,c.description as course,
    s.description
              as specialty, rd.module
              from registrydetail rd inner join registry r inner join person p inner join 
              specialty s inner join schedule sc inner join course c on r.courseid=c.id and r.scheduleid=sc.id and rd.registryid=r.id and r.teacher =p.id and rd.specialtyid=s.id 
              where rd.student='$id'";
    $sql = mysqli_query($this->open(), $query);
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de Registros Detalle</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Registro</th>
                      <th>Alumno</th>
                      <th>Carrera</th>
                      <th>Modulo</th>

                      <th>Acciones</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      $id = $row[0];
                      echo "<td>" . $row[1] . "</td>";
                      echo "<td>" . $row[2] . "</td>";
                      echo "<td>" . $row[3] . "</td>";
                      echo "<td>" . $row[4] . "</td>";
                      echo "<td>" . $row[5] . "</td>";
                    ?>
                      <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#calification" onclick="noteSelectOne('<?php echo $id ?>');  return false">Calificación</button>
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
  public function noteDelete($codigo)
  {
    //registra los datos del empleados
    $sql = "call notedelete('$codigo')";
    if (mysqli_query($this->open(), $sql)) {
    } else {
    }
    $this->noteSelect();
  }
  public function noteInsert($registryid, $student, $specialtyid, $module)
  {
    //registra los datos del note
    // $sql = "INSERT INTO note (registryid,student,specialtyid,module,created_at,updated_at) VALUES ('$registryid','$student','$specialtyid','$module',now(),now())";
    $query = "call cesca.registro_detalle_insert($registryid, '$student', '$module', '$specialtyid');";
    mysqli_query($this->open(), $query) or die('Error. ' . mysqli_error($query));
    $this->noteSelect();
  }
  public function noteSelectOne($codigo)

  {
    $sql = mysqli_query($this->open(), "SELECT n.id,n.id, n.n1,n.n2,n.n3,n.n4,n.n5,n.ex1,n.n7,n.n8,n.n9,n.n10,n.n11,n.ex2,n.p1,n.p2,n.pend from note n
    where n.registrydetailid='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $n1 = $r["n1"];
    $n2 = $r["n2"];
    $n3 = $r["n3"];
    $n4 = $r["n4"];
    $n5 = $r["n5"];
    $ex1 = $r["ex1"];
    $n7 = $r["n7"];
    $n8 = $r["n8"];
    $n9 = $r["n9"];
    $n10 = $r["n10"];
    $n11 = $r["n11"];
    $ex2 = $r["ex2"];
    $p1 = $r["p1"];
    $p2 = $r["p2"];
    $pend = $r["pend"];
    echo "<script>
      calification1.codigo.value='$codigo';
      calification1.n1.value='$n1';
      calification1.n2.value='$n2';
      calification1.n3.value='$n3';
      calification1.n4.value='$n4';
      calification1.n5.value='$n5';
      calification1.ex1.value='$ex1';
      calification1.n7.value='$n7';
      calification1.n8.value='$n8';
      calification1.n9.value='$n9';
      calification1.n10.value='$n10';
      calification1.n11.value='$n11';
      calification1.ex2.value='$ex2';
      calification1.p1.value='$p1';
      calification1.p2.value='$p2';
      calification1.pend.value='$pend';
      </script>";
    $this->noteSelect();
  }
  public function noteUpdate($codigo, $registryid, $student, $specialtyid, $module)
  {
    $sql = "UPDATE note set registryid='$registryid',student='$student',specialtyid='$specialtyid',module='$module',updated_at=now() where id='$codigo'";
    mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
    note.codigo.value='$codigo';
    note.student.value='$student';
    note.specialtyid.value='$specialtyid';
    note.module.value='$module';
        </script>";
    $this->noteSelect();
  }
  public function noteCalification($codigo)

  {
    $sql = mysqli_query($this->open(), "SELECT n.id,n.id, n.n1,n.n2,n.n3,n.n4,n.n5,n.ex1,n.n7,n.n8,n.n9,n.n10,n.n11,n.ex2,n.p1,n.p2,n.pend from note n
    where n.noteid='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["id"];
    $n1 = $r["n1"];
    $n2 = $r["n2"];
    $n3 = $r["n3"];
    $n4 = $r["n4"];
    $n5 = $r["n5"];
    $ex1 = $r["ex1"];
    $n7 = $r["n7"];
    $n8 = $r["n8"];
    $n9 = $r["n9"];
    $n10 = $r["n10"];
    $n11 = $r["n11"];
    $ex2 = $r["ex2"];
    $p1 = $r["p1"];
    $p2 = $r["p2"];
    $pend = $r["pend"];
    echo "<script>
      calification1.codigo.value='$codigo';
      calification1.n1.value='$n1';
      calification1.n2.value='$n2';
      calification1.n3.value='$n3';
      calification1.n4.value='$n4';
      calification1.n5.value='$n5';
      calification1.ex1.value='$ex1';
      calification1.n7.value='$n7';
      calification1.n8.value='$n8';
      calification1.n9.value='$n9';
      calification1.n10.value='$n10';
      calification1.n11.value='$n11';
      calification1.ex2.value='$ex2';
      calification1.p1.value='$p1';
      calification1.p2.value='$p2';
      calification1.pend.value='$pend';
      </script>";
    $this->noteSelect();
  }
  public function noteCalificationUpdate($codigo, $n1, $n2, $n3, $n4, $n5, $ex1, $n7, $n8, $n9, $n10, $n11, $ex2)
  {
    $query = "UPDATE note set n1='$n1',n2='$n2',n3='$n3',n4='$n4',n5='$n5',ex1='$ex1',n7='$n7',n8='$n8',n9='$n9',n10='$n10',n11='$n11',ex2='$ex2' where id='$codigo'";
    mysqli_query($this->open(), $query) or die('Error. ' . mysqli_error($query));
    $this->noteSelect();
  }
}

$note = new note();
if ($metodo == "delete") {
  $note->noteDelete($codigo);
} elseif ($metodo == "insert") {
  $note->noteInsert($registryid, $student, $specialtyid, $module);
} elseif ($metodo == "select") {
  $note->noteSelectOne($codigo);
} elseif ($metodo == "update") {
  $note->noteUpdate($codigo, $registryid, $student, $specialtyid, $module);
} elseif ($metodo == "calification") {
  $note->noteCalification($codigo);
} 