<?php
include "admin_head.php";
include "functionblog.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="page-header"><i class="fa fa-table"></i> Blog</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tabla</li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <form action="" id="blog">
                <input type="hidden" name="codigo">
                <div class="card-header">
                    <h3 class="card-title">Publique un post</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="title" placeholder="Título:">
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
                        <button type="button" class="btn btn-primary" onclick="blogInsert();"><i class="far fa-envelope"></i> Publicar</button>
                        <input type="submit" name="modificar" value="Modificar" class="btn btn-danger"
                    onclick="blogUpdate(); return false" />
                    </div>
                    <button type="reset" onclick="blogNuevo();" class="btn btn-default"><i class="fas fa-times" ></i> Nuevo</button>
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
$blog->blogSelect();
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