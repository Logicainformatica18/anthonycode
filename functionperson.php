<?php
if (!class_exists("session")) {
	class session
	{
		public function session_inicio()
		{
			return session_start();
		}
	}

	$session = new session();
	$session->session_inicio();
}
if (!class_exists("connection")) {
	include("conexion.php");
}
//variables POST

$id = isset($_SESSION['id']) ? $_SESSION['id'] : "";
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$dni = isset($_POST['dni']) ? $_POST['dni'] : "";
$positionid = isset($_POST['positionid']) ? $_POST['positionid'] : "";
$names = isset($_POST['names']) ? $_POST['names'] : "";
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$cellphone = isset($_POST['cellphone']) ? $_POST['cellphone'] : "";
$criterio = isset($_POST['criterio']) ? $_POST['criterio'] : "";
$photo = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
if ($sex == "") {
	$sex = "M";
}
$login = isset($_POST['login']) ? $_POST['login'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
/// CAMBIAR CONTRASEÑA

////////////////////////////////////////////////////////////////////
$new_password          = isset($_POST['new_password']) ? $_POST['new_password'] : "";
$repetir_password  = isset($_POST['repetir_password']) ? $_POST['repetir_password'] : "";
// CAMBIAR CONTRASEÑA

//FILTRO
$criterio1 = isset($_POST['criterio1']) ? $_POST['criterio1'] : "";

//FILTRO


//comprobamos si hay una photo o no
if ($photo != "") {
	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
}

//FECHA
$dia = isset($_POST['Dia']) ? $_POST['Dia'] : "";
$mes = isset($_POST['Mes']) ? $_POST['Mes'] : "";
$año = isset($_POST['Año']) ? $_POST['Año'] : "";
//FECHA

//BUSQUEDA INTELIGENTE
$teacher = isset($_POST['teacher']) ? $_POST['teacher'] : "";
//
class person extends connection
{
	public $dni;
	public $names;
	public $firstname;
	public $lastname;
	public $dia;
	public $mes;
	public $año;
	public $datebirth;
	public $sex;
	public $photo;
	public $cellphone;
	public $email;
	public $password;
	public $positionid = "";
	public function __construct($person)
	{
		$this->person = $person;
	}
	public function personSelect()
	{
		$id = $_SESSION["id"];
		//consulta todos los person
		$sql = mysqli_query($this->open(), "SELECT p.id,p.dni ,p.firstname,p.lastname,p.names,p.photo,p.cellphone,c.description as position,p.email,p.sex 
		from person p inner join position c on p.positionid=c.id where p.id <>'$id' ");
?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Tabla de Usuarios</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Código</th>
											<th>Dni</th>
											<th>Paterno</th>
											<th>Materno</th>
											<th>Nombres</th>
											<th>Celular</th>
											<th>Foto</th>
											<th>Cargo</th>

											<th>Modificar</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($row = mysqli_fetch_array($sql)) {
											echo "<tr>";
											$personid = $row[0];
											echo "<td>" .  $row[0] . "</td>";
											echo "<td>" .  $row[1] . "</td>";
											echo "<td>" .  $row[2] . "</td>";
											echo "<td>" . $row[3] . "</td>";
											echo "<td>" . $row[4] . "</td>";
											echo "<td>" . $row[6] . "</td>";
											// decodificar base 64
											$photo = base64_encode($row[5]);
											if ($photo == "") {
												echo "<td >No Disponible</td>";
											} else {
												echo "<td ><img src='data:image/jpeg;base64,$photo' width='100'height='100'></td>";
											}

											echo "<td>" . $row[7] . "</td>";

										?>
											<!-- Button trigger modal -->
											<td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="personSelectOne('<?php echo $personid ?>');   return false"></button>
											</td>
											<!-- <button class="note-icon-pencil" ></button> -->
											<td><button class="btn btn-danger note-icon-trash" onclick="personDelete('<?php echo $personid ?>');  return false"></button></td>
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
	public function personInsert($dni, $positionid, $firstname, $lastname, $names, $cellphone, $dia, $mes, $año, $photo, $email, $sex)
	{
		if ($dia < 10) {
			$dia = "0" . $dia;
		}
		if ($mes < 10) {
			$mes = "0" . $mes;
		}
		//VALIDAR FECHA
		if ($dia < 1 || $mes < 1) {
			echo "<script type='text/javascript'> alert('Elija correctamente su Fecha de cumpleaños');</script>";
			$this->personSelect();
			exit;
		}
		//VALIDAR FECHA
		$datebirth =    $año . "-" . $mes . "-" . $dia;
		//registra los datos del person
		$sql = "INSERT INTO person (dni,positionid,firstname,lastname,names,cellphone,datebirth,photo,created_at,updated_at,password,email,sex) VALUES ('$dni','$positionid','$firstname', '$lastname', '$names','$cellphone','$datebirth','$photo',now(),now(),'cesca','$email','$sex')";
		if (mysqli_query($this->open(), $sql)) {
			echo "<script> alert('Registrado Correctamente')</script>";
			$this->personSelect();
		} else {
			"<script> alert('Error al registrar')</script>";
			$this->personSelect();
		}
	}
	public function personDelete($codigo)
	{
		//registra los datos del person
		$sql = "DELETE FROM person where id ='$codigo'";
		mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
		$this->personSelect();
	}
	public function personSelectOne($codigo)
	{
		//registra los datos del person
		$query = "SELECT p.id,p.dni ,p.firstname,p.lastname,p.names,p.photo,p.cellphone,p.email,p.sex,p.datebirth, 
		p.positionid, po.id as positionid,day(p.datebirth)as dia,month(p.datebirth)as mes,year(p.datebirth)as anio
		 from person p inner join position po on p.positionid=po.id  where p.id ='$codigo'";
		$sql = mysqli_query($this->open(), $query);

		$r = mysqli_fetch_assoc($sql);
		$codigo = $r["id"];
		$dni = $r["dni"];
		$firstname = $r["firstname"];
		$lastname = $r["lastname"];
		$names = $r["names"];
		$cellphone = $r["cellphone"];
		$photo = base64_encode($r["photo"]);
		$positionid = $r["positionid"];
		$dia = $r["dia"];
		$mes = $r["mes"];
		$año = $r["anio"];
		$email = $r["email"];
		$sex = $r["sex"];
		if ($sex == 'M') {
			echo "<script>	document.getElementById('M').checked=true</script>";
		} else {
			echo "<script>	document.getElementById('F').checked=true</script>";
		}
		echo "<script>
		person.codigo.value='$codigo';
		person.dni.value='$dni';
		person.firstname.value='$firstname';
		person.lastname.value='$lastname';
		person.names.value='$names';
		person.cellphone.value='$cellphone';
		person.positionid.value='$positionid';
		person.Dia.value='$dia';
		person.Mes.value='$mes';
		person.Año.value='$año';
		person.email.value='$email';
		document.getElementById('blah').src='data:image/jpeg;base64,$photo';
		</script>";
		$this->personSelect();
	}
	public function personPerfil($id)
	{
		//registra los datos del person
		$sql = mysqli_query($this->open(), "SELECT p.dni ,p.firstname,p.lastname,p.names,p.photo,p.cellphone,p.email,p.sex,p.datebirth, 
		p.positionid, po.description as positionid,day(p.datebirth)as dia,month(p.datebirth)as mes,year(p.datebirth)as anio
		 from person p inner join position po on p.positionid=po.id where p.id ='$id'");

		$r = mysqli_fetch_assoc($sql);

		$photo = base64_encode($r["photo"]);
		if ($photo == "" && $r["sex"] == "M") {
			$photo = " <img src='dist/img/hombre.jpg' class='profile-user-img img-fluid img-circle'alt='User Image'>";
		} elseif ($photo == "" && $r["sex"] == "F") {
			$photo = " <img src='dist/img/mujer.jpg' class='profile-user-img img-fluid img-circle'alt='User Image'>";
		} else {
			$photo = "<img src='data:image/jpeg;base64,$photo' class='profile-user-img img-fluid img-circle'>";
		}



		$this->dni = $r["dni"];
		$this->firstname = $r["firstname"];
		$this->lastname = $r["lastname"];
		$this->names = $r["names"];
		$this->photo = $photo;
		$this->cellphone = $r["cellphone"];
		$this->email = $r["email"];
		$this->sex = $r["sex"];
		$this->positionid = $r["positionid"];
		$this->datebirth = $r["datebirth"];
		$this->dia = $r["dia"];
		$this->mes = $r["mes"];
		$this->año = $r["anio"];
	}


	public function personFiltro($criterio1)
	{
		//consulta todos los person
		$s = "SELECT p.dni ,p.firstname,p.lastname,p.names,p.photo,p.cellphone,c.names,p.email,p.sex as person from person p inner join person c on p.personid=c.personid where c.personid like '$criterio1';  ";
		$sql = mysqli_query($this->open(), $s);

		echo "
		<table class='striped responsive-table'>
		  <tr>
			<th>Dni</th>
			<th>firstname</th>
			<th>lastname</th>
			<th>names</th>
			<th>cellphone</th>
			<th height='100'>photo</th>
			<th>person</th>
			<th>Email</th>
			<th>Opción</th>
			<th>Opción</th>
		  </tr>";
		while ($row = mysqli_fetch_array($sql)) {
			echo "<tr>";
			$cod_person = $row[0];
			echo "<td>" .  $row[0] . "</td>";
			echo "<td>" .  $row[1] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[5] . "</td>";
			// decodificar base 64
			$photo = base64_encode($row[4]);
			if ($photo == "") {
				echo "<td height='100'>No Disponible</td>";
			} else {
				echo "<td height='100'><img src='data:image/jpeg;base64,$photo' width='100'height='100'></td>";
			}

			echo "<td>" . $row[6] . "</td>";
			echo "<td>" . $row[7] . "</td>";
		?>
			<!-- Modal Trigger -->
			<td><a class="waves-effect waves-light btn modal-trigger blue" href="" onclick="personSelectOne('<?php echo $cod_person ?>'); Cancelar();  return false">Seleccionar</a></td>
			<td><a class="waves-effect waves-light btn red" href="" onclick="personDelete('<?php echo $cod_person ?>'); return false">Eliminar</a></td>
		<?php
			echo "</tr>";
		}

		echo "</table>";
	}

	public function personUpdate($codigo, $dni, $positionid, $firstname, $lastname, $names, $cellphone, $dia, $mes, $año, $photo, $email, $sex)
	{
		//VALIDAR FECHA
		if ($dia < 1 || $mes < 1) {
			echo "<script type='text/javascript'> alert('Elija correctamente su Fecha de cumpleaños');</script>";
			$this->personSelect();
			exit;
		}
		//VALIDAR FECHA
		$datebirth =    $año . "-" . $mes . "-" . $dia;
		//si no hay ninguna photo eso quiere decir que no actualizaremos el campo photo
		// ya que si lo dejamos, la anterior photo lo eliminara si el valor es nulo
		if ($photo == "") {
			$sql = "UPDATE person SET dni='$dni', positionid='$positionid',firstname='$firstname',lastname='$lastname',names='$names',cellphone='$cellphone',datebirth='$datebirth',email='$email',sex='$sex' where id='$codigo'";
		} else {
			$sql = "UPDATE person SET dni='$dni',positionid='$positionid',firstname='$firstname',lastname='$lastname',names='$names',cellphone='$cellphone',datebirth='$datebirth',photo='$photo',email='$email',sex='$sex' where id='$codigo'";
		}
		mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
		echo "<script>	
		
		person.codigo.value='$codigo';
		person.dni.value='$dni';
		person.firstname.value='$firstname';
		person.lastname.value='$lastname';
		person.names.value='$names';
		person.cellphone.value='$cellphone';
		person.positionid.value='$positionid';
		person.Dia.value='$dia';
		person.Mes.value='$mes';
		person.Año.value='$año';
		person.email.value='$email';
		document.getElementById('blah').src='data:image/jpeg;base64,$photo';
			
			</script>";
		$this->personSelect();
	}
	public function personUpdatePerfil($codigo, $cellphone, $dia, $mes, $año, $photo)
	{
		//VALIDAR FECHA
		if ($dia < 1 || $mes < 1) {
			echo "<script type='text/javascript'> alert('Elija correctamente su Fecha de cumpleaños');</script>";
			exit;
		}
		//VALIDAR FECHA
		$datebirth =    $año . "-" . $mes . "-" . $dia;
		//si no hay ninguna photo eso quiere decir que no actualizaremos el campo photo
		// ya que si lo dejamos, la anterior photo lo eliminara si el valor es nulo
		if ($photo == "") {
			$sql = "UPDATE person SET cellphone='$cellphone',datebirth='$datebirth'where dni='$codigo'";
		} else {
			$sql = "UPDATE person SET cellphone='$cellphone',datebirth='$datebirth',photo='$photo' where dni='$codigo'";
		}


		if (mysqli_query($this->open(), $sql)) {
				$this->personValidatePosition($_SESSION["position"]);
		} else {
			echo "<script> alert('Error al guardar los cambios'); </script>";
		}
	}
	public function personLogin($email, $password, $positionid)
	{
		//	
		// Consulta enviada a la base de datos
		$query = "SELECT p.id,p.dni,p.email ,p.password,po.description as position from person p
		inner join position po on p.positionid=po.id  WHERE  p.email  = '$email' and p.password='$password' and p.positionid='$positionid';";
		$result = mysqli_query($this->open(), $query);
		// Que la Variable $row mantenga el resultado de la consulta
		$r = mysqli_fetch_assoc($result);
		if ($r["email"] != "" || $r["password"] != "") {
			//comprobar el person de usuario
			$_SESSION["id"] = $r["id"];
			$_SESSION["login"] = $r["dni"];
			$_SESSION["email"] = $r["email"];
			$_SESSION["password"] = $r["password"];
			$_SESSION["position"] = $r["position"];
			$_SESSION['loggedin'] = true;
			$this->personValidatePosition($r["position"]);
		} else {
			echo "<script>alert(' Usuario o Contraseña Incorrecta');</script>";
		}
	}
	public function personValidar()
	{
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		
		} else {
			echo "<script>  alert('Logueese primero');	window.location.href='index.php';</script> ";
		}
	}
	public function personValidatePosition($position)
	{
		if ($position == "Administrador") {
			echo "<script> window.location.href='admin.php';</script>";
		} else if ($position == "Alumno") {
			echo "<script> window.location.href='student.php';</script>";
		} else if ($position == "Docente") {
			echo "<script> window.location.href='teacher.php';</script>";
		}
	}
	public function personChangePassword($password, $new_password, $repetir_password)
	{

		$id = $_SESSION["id"];
		$password_sesion = $_SESSION["password"];
		$query = "UPDATE person SET password = '$new_password' WHERE  id  ='$id';";
		if ($password == $password_sesion) {
			if ($new_password == $repetir_password && strlen($password) > 3) {
				$query = "UPDATE person SET password = '$new_password' WHERE  id  ='$id';";
				if (mysqli_query($this->open(), $query)) {
					$_SESSION['password'] = $new_password;
					echo "<script type='text/javascript'>alert('Contraseña ha cambiado');</script>";
					//include "enviar_email/cambiar_password.php";
				} else {
					echo "<script type='text/javascript'>alert('Error de cambio de contraseña');</script>";
				}
			} else {
				echo "<script>alert('error de repetir password  o el tamaño de contraseña es muy corto');</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('Contraseña Incorrecta ' );</script>";
		}
	}

	public function personSearch2($criterio)
	{
		$query = "SELECT p.id,p.firstname,p.lastname,p.names from person p
	inner join position po on p.positionid=po.id
	 where po.description='$criterio'";
		//consulta todos los productos
		$sql = mysqli_query($this->open(), $query);
		while ($row = mysqli_fetch_array($sql)) {
			$id = $row[0];
			$firstname = $row[1];
			$lastname = $row[2];
			$names = $row[3];
		?>
			<script>
				countries.push("<?php echo $firstname . ' ' . $lastname . ' ' . $names . '-' . $id ?>");
			</script>
<?php
		}
	}
	public function personValidarSesion()
	{
		$login = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : "";
		if ($login == true) {
			$position=isset($_SESSION["position"])? $_SESSION["position"]:"" ;
			$this->personValidatePosition($position);
		}
	}
}

$person = new person("");
//verificamos el metodo recibido
if ($metodo == "insert") {
	$person->personInsert($dni, $positionid, $firstname, $lastname, $names, $cellphone, $dia, $mes, $año, $photo, $email, $sex);
} elseif ($metodo == "delete") {
	$person->personDelete($codigo);
} elseif ($metodo == "select") {
	$person->personSelectOne($codigo);
} elseif ($metodo == "update") {
	$person->personUpdate($codigo, $dni, $positionid, $firstname, $lastname, $names, $cellphone, $dia, $mes, $año, $photo, $email, $sex);
} elseif ($metodo == "updateperfil") {
	$person->personUpdatePerfil($codigo, $cellphone, $dia, $mes, $año, $photo, $email);
} elseif ($metodo == "login") {
	$person->personLogin($email, $password, $positionid);
} elseif ($metodo == "changePassword") {

	$person->personChangePassword($password, $new_password, $repetir_password);
} elseif ($metodo == "filtro") {

	$person->personFiltro($criterio1);
} elseif ($metodo == "search2") {

	$person->personSearch2($teacher);
}
