<?php
include("admin_head.php");
include('functioninstitute.php');
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="page-header"><i class="fa fa-table"></i> Instituto</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tabla</li>
                    <li class="breadcrumb-item active">Instituto</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
            onclick="instituteNuevo();">Agregar</button>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Gestionar institute</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" id="institute" name="institute" method="POST" action=""
                enctype="multipart/form-data">
                    <div class="col s12 l6">
                        <input type="hidden" name="codigo">
                        Descripción <input name="description" type="text" class="form-control" />
          
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="nuevo" value="Nuevo" class="btn btn-secondary"
                    onclick="instituteNuevo(); return false" />

                <input type="button" name="btn" value="Grabar" class="btn btn-success"
                    onclick="instituteInsert();return false" />

                <input type="submit" name="modificar" value="Modificar" class="btn btn-primary"
                    onclick="instituteUpdate(); return false" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<p></p>

</form>




<div id="resultado" class="container-fluid">


    <?php
    $institute->instituteSelect();

    ?>

</div>






<?php
include "admin_footer.php";
?>