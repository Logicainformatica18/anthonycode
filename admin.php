<?php
include('admin_head.php');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Perfil</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Perfil de Usuario</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php
              echo $person->photo;
              ?>
            </div>
            <h3 class="profile-username text-center"><?php echo $person->names . " " . $person->firstname . " " . $person->lastname; ?></h3>
            <p class="text-muted text-center"><?php echo $person->positionid ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>DNI</b> <a class="float-right"><?php echo $person->dni ?></a>
              </li>
              <li class="list-group-item">
                <b>Celular</b> <a class="float-right"><?php echo $person->cellphone ?></a>
              </li>
              <li class="list-group-item">
                <b>Nacimiento</b> <a class="float-right"><?php echo $person->datebirth ?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b><br> <a class="float-right"><?php echo $person->email ?></a>
              </li>
            </ul>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Cambiar Contraseña
            </button>
            <p></p>
            <button type="button" class="btn btn-success" onclick="envioWhatsapp('<?php echo $person->names ?>')">Whatsapp Desarrollador</button>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <form accept-charset="utf-8" id="person" method="POST" action="" enctype="multipart/form-data" name="person">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Configuración</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="settings">
                  <input type="hidden" name="codigo" value="<?php echo $person->dni; ?>">
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2
                              col-form-label">Fotografía</label>
                    <div class="btn btn-default btn-file col-10">
                      <i class="fas fa-paperclip"></i> Subir
                      <input type='file' id="imgInp" name="photo" onchange="readImage(this);">
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <br>
                      <img id="blah" src="https://via.placeholder.com/150" alt="Tu imagen" class="img-bordered" width="200">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputcellphone" class="col-sm-2
                              col-form-label">Celular</label>
                    <div class="col-sm-10">
                      <input type="number" name="cellphone"class="form-control" placeholder="cellphone" value="<?php echo $person->cellphone; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputdatebirth" class="col-sm-2
                              col-form-label">Nacimiento</label>
                    <div class="col-sm-10">

                      <div class="row">
                        <div class="col s4">
                          <select name="Dia" class="form-control">
                            <option>Dia</option>
                            <?php
                            for ($a = 1; $a <= 31; $a++) {
                              echo "<option value='$a'>" . $a . "</option>";
                            } ?>
                          </select>
                        </div>
                        <div class="col s4">
                          <select name="Mes" class="form-control">
                            <option>Mes</option>
                            <?php
                            $mes = array("", "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
                            for ($b = 1; $b <= 12; $b++) {
                              echo "<option value='$b'>" . $mes[$b] . "</option>";
                            } ?>
                          </select>
                        </div>
                        <div class="col s4">
                          <select name="Año" class="form-control">
                            <option>Año</option>
                            <?php
                            $c = 2020;
                            while ($c >= 1905) {

                              echo "<option value='$c'>" . $c . "</option>";
                              $c = $c - 1;
                            }


                            ?>
                          </select>


                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="button" class="btn btn-danger" onclick="personUpdatePerfil();">Guardar cambios</button>
                    </div>
                  </div>

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
         
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->






<div id="resultado">

  <?php
  echo "<script>

        person.Dia.value='$person->dia';
        person.Mes.value='$person->mes';
        person.Año.value='$person->año';
        </script>";
  ?>

</div>









<p></p>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

          <img src="imagenes/messenger.png" alt="messenger" width="100">
          <h6><b>Cambiar Contraseña</b></h6>
          <input type="password" class="form-control" name="password" placeholder="  password Actual" requerid>
          <p></p>
          <input type="password" class="form-control" name="new_password" placeholder=" Nueva Contraseña" requerid>
          <p></p>
          <input type="password" class="form-control" name="repetir_password" placeholder="  Repetir Contraseña" requerid>
          <p></p>
          <p></p>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" value="Guardar" name="btn" class="btn btn-primary" onclick="personChangePassword(); return false;">
      </div>
    </div>
  </div>
</div>
<p></p>



<!-- Modal Structure -->





<?php
include "admin_footer.php";
?>