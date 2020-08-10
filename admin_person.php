<?php
include "admin_head.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="page-header"><i class="fa fa-table"></i> Usuarios</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tabla</li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Agregar</button>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Gestionar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form accept-charset="utf-8" id="person" method="POST" action="" enctype="multipart/form-data">



                        <input type="hidden" name="codigo">
                        Elija un cargo:
                        <select name="positionid" id="cargos" class="form-control">
                            <?php
                            $con = new connection();
                            $sql = mysqli_query($con->open(), "SELECT * from position ");
                            while ($row = mysqli_fetch_array($sql)) {
                                $id = $row['id'];
                                $description = $row['description'];
                                echo "<option value='$id'>" .  $description . "</option>";
                            }

                            ?>
                        </select>
                        Dni<input name="dni" type="number" class="form-control">
                        Paterno<input name="firstname" type="text" class="form-control">
                        Materno<input name="lastname" type="text" class="form-control">
                        Nombres<input name="names" type="text" class="form-control">
                        Celular<input type="number" name="cellphone" class="form-control">
                        Email<input type="text" name="email" class="form-control">
                        Sexo

                        <div class="container">
                        <div class="row ">
                        <div class="col-md-2 container">

                        </div>
                            <div class="col-md-4 container">
                                <input class="form-check-input" type="radio" name="sex" id="M" value="M">
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-check-input" type="radio" name="sex" id="F" value="F">
                                <label class="form-check-label" for="exampleRadios1">
                                    Femenino
                                </label>
                            </div>
                        </div>
                        </div>
                   




                        <br>
                        Fecha de Nacimiento :
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
                        <p></p>
                        <div class="container">
                            <div class="form-group row">
                                Fotografía
                                <div class="col-sm-1"></div>
                                <div class="btn btn-default btn-file col-9">
                                    <i class="fas fa-paperclip"></i> Subir
                                    <input type='file' id="imgInp" name="photo" onchange="readImage(this);">
                                </div>

                                <div class="col-sm-12">
                                    <br>
                                    <img id="blah" name="fotografia" src="https://via.placeholder.com/150" alt="Tu imagen" class="img-bordered" width="50%">
                                </div>
                            </div>
                        </div>




                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="nuevo" value="Nuevo" class="btn btn-secondary" onclick="personNuevo(); return false" />

                    <input type="button" name="btn" value="Grabar" class="btn btn-success" onclick="personInsert();return false" />

                    <input type="submit" name="modificar" value="Modificar" class="btn btn-primary" onclick="personUpdate(); return false" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>



    <p></p>
    <!-- <form action="" id="filtro">
        <h4><b>Filtro</b></h4>
        <div class="row">
            <div class="col s12 l6">
                <h5>Ordenar por Cargo</h5>
                <select name="criterio1"  class="form-control" onchange="personFiltro();">
                    <option value="%">Todos</option>
                    <?php
                    // $con = new connection();
                    // $sql = mysqli_query($con->open(), "SELECT cargoid,nombre from cargo");
                    // while ($row = mysqli_fetch_array($sql)) {
                    //     $cargoid = $row[0];
                    //     $nombre = $row[1];
                    //     echo "<option value='$cargoid'>" .  $nombre . "</option>";
                    // }

                    ?>
                </select>
            </div>
            <div class="col s12 l6">

            </div>
        </div>

    </form> -->

    <p></p>

    <div id="resultado"><?php

                        $person->personSelect();
                        ?></div>

</div>

<?php
include("admin_footer.php");
?>