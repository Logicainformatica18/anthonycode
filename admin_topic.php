<?php
include "admin_head.php";
include "functiontopic.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="page-header"><i class="fa fa-table"></i> tema</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tabla</li>
                    <li class="breadcrumb-item active">tema</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <form action="" id="topic">
                <input type="hidden" name="codigo">
                <div class="card-header">
                    <h3 class="card-title">Publique un Tema</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="title" placeholder="Título">
                    </div>

                    Elija un Curso:
                    <select name="courseid" id="courseid" class="form-control">
                        <?php
                        $con = new connection();
                        $sql = mysqli_query($con->open(), "SELECT id,description from course ");
                        while ($row = mysqli_fetch_array($sql)) {
                            $id = $row['id'];
                            $description = $row['description'];
                            echo "<option value='$id'>" .  $description . "</option>";
                        }
                        ?>
                    </select>
                    Elija un orden o semana:
                    <select name="week" id="week"class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="10">19</option>
                        <option value="11">20</option>
                    </select>
                    <p></p>
                    <div class="form-group">
                        <input class="form-control" name="description" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="imageurl" placeholder="Imagen Url">
                    </div>
                    <div class="form-group">
                        <textarea name="post" id="compose-textarea" class="form-control">

                    </textarea>

                    </div>
                    <!-- <div class="form-group">
                    <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Attachment
                        <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-left">
                        <!-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> -->
                        <button type="button" class="btn btn-primary" onclick="topicInsert();"><i class="far fa-envelope"></i> Publicar</button>
                        <input type="submit" name="modificar" value="Modificar" class="btn btn-danger" onclick="topicUpdate(); return false" />
                    </div>
                    <button type="button" onclick="topicNuevo();" class="btn btn-default"><i class="fas fa-times"></i> Nuevo</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div id="resultado">

    <?php
    $topic->topicSelect();
    ?>
</div>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
    $(function() {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script>


</body>

</html>