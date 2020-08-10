<?php
if (!class_exists("session")) {
   include "session.php";
  }
include 'functionperson.php';
$person->personValidarSesion();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador | Login </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
     <!-- Funciones ajax -->
<script src="function.js"></script>
</head>
<style>
    .wallpaper{
        background-image: url("https://uploads-ssl.webflow.com/5bbc65cacbc94f1c605f9cba/5da853ab93046966d032c52a_EzgdmaCQuT84bgDL4fhXZS.jpg");
    }
</style>
<body class="login-page wallpaper">
    <div class="login-box" >
        <div class="login-logo">
                <h1 class="text-light">Inicio de Sesión</h1>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body"style="border-radius:30px">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <form action=""  id="person">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Dni" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                    <select name="positionid" id="cargos" class="form-control">
                        <?php
                        $con = new connection();
                        $sql = mysqli_query($con->open(), "select * from position order by description desc");
                        while ($row = mysqli_fetch_array($sql)) {
                            $cargoid = $row['id'];
                            $nombre = $row['description'];
                            echo "<option value='$cargoid'>" .  $nombre . "</option>";
                        }
                        ?>
                    </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <!-- <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label> -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                        <button class="btn btn-primary btn-block" type="button" onclick="personLogin(); return false">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div id="resultado"></div>
                </form>

                <!-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>