<?php
include("admin_head.php");
include('functionspecialty.php');
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="page-header"><i class="fa fa-table"></i> Carreras</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tabla</li>
                    <li class="breadcrumb-item active">Carreras</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
            onclick="specialtyNuevo();">Agregar</button>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Gestionar carreras</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" id="specialty" name="specialty" method="POST" action=""
                enctype="multipart/form-data">
                    <div class="col s12 l6">
                    Elija un instituto:
                        <select name="instituteid" id="cargos" class="form-control">
                            <?php
                            $con = new connection();
                            $sql = mysqli_query($con->open(), "SELECT * from institute ");
                            while ($row = mysqli_fetch_array($sql)) {
                                $id = $row['id'];
                                $description = $row['description'];
                                echo "<option value='$id'>" .  $description . "</option>";
                            }

                            ?>
                        </select>
                        <input type="hidden" name="codigo">
                        Descripción <input name="description" type="text" class="form-control" />
          
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="nuevo" value="Nuevo" class="btn btn-secondary"
                    onclick="specialtyNuevo(); return false" />

                <input type="submit" name="btn" value="Grabar" class="btn btn-success"
                    onclick="specialtyInsert();return false" />

                <input type="submit" name="modificar" value="Modificar" class="btn btn-primary"
                    onclick="specialtyUpdate(); return false" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<p></p>

</form>




<div id="resultado" class="container-fluid">


    <?php
    $specialty->specialtySelect();

    ?>

</div>






<?php
include "admin_footer.php";
?>