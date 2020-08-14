<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
if (!class_exists("session")) {
  include("session.php");
}
$id=isset($_SESSION["id"])? $_SESSION["id"]:"";
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$page = isset($_POST['page']) ? $_POST['page'] : "";
$page = str_replace(" ", "-", $page);
$title = isset($_POST['title']) ? $_POST['title'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
$imageurl = isset($_POST['imageurl']) ? $_POST['imageurl'] : "";
$post = isset($_POST['post']) ? $_POST['post'] : "";
//filtro




class blog extends connection
{

  public function blogSelect()
  {
    $id=isset($_SESSION["id"])? $_SESSION["id"]:"";
    //consulta todos los empleados
    $sql = mysqli_query($this->open(), "SELECT id,title,page,description FROM blog where personid='$id';");
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">


                    <div class="card-header">
                        <h3 class="card-title">Tabla de bloges</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color:white">
               
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Ver blog</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    while ($row = mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      $blogid = $row[0];
                      $page = str_replace(" ", "-", $row[2]);
                      $page = str_replace("#", "sharp", $page);
                      echo "<td>" .  $blogid . "</td>";
                      echo "<td>" . $row[1] . "</td>";
                      echo "<td>" . $row[3] . "</td>";
                    ?>
                                <!-- Button trigger modal -->
                                <td><a href="blog/<?php echo $page . ".php" ?>" target="_blank"
                                        class="btn btn-danger">Ver</a></td>
                                <!-- Button trigger modal -->
                                <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal"
                                        data-target="#exampleModal"
                                        onclick="blogSelectOne('<?php echo $blogid ?>');  return false"></button>
                                </td>
                                <!-- <button class="note-icon-pencil" ></button> -->
                                <td><button class="btn btn-danger  note-icon-trash"
                                        onclick="blogDelete('<?php echo $blogid ?>','<?php echo $row[2] ?>');  return false"></button>
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
  public function blogSelect2()
  {
    //consulta todos los empleados
    $sql = mysqli_query($this->open(), "SELECT id,page,title,imageurl,description FROM blog;");
  ?>
<!-- Main content -->
<section class="mbr-gallery mbr-slider-carousel cid-s611dDivHx" id="gallery3-3b">
        <div class="container align-center">
        <div class="row">
            




                    <?php
                    
                while ($row = mysqli_fetch_array($sql)) {
                  $page=str_replace(" ","-",$row[1]);
                  $page=str_replace("#","sharp",$row[1]);
                  $title=$row[2];
                  $imageurl=$row[3];
                  $description=$row[4];
                  echo "  <div class='card' style='width: 14rem; padding-left: 1em;'>
                            <img src='$imageurl' class='card-img-top' alt='...'>
                              <div class='card-body'>
                                   <h5 class='card-title'><b>$title</b></h5>
                                     <p class='card-text'>$description.</p>
                                        <a href='blog/$page.php' class='btn btn-success'>ir al blog</a>"; 
                
                            
                      echo "  
                          </div>
                        </div>
                       
                        ";
                }
                ?>

                
        </div>
    </div>
</section>
<!-- /.content -->
<?php
  }
  public function blogDelete($codigo, $page)
  {
    //registra los datos del empleados
    $sql = "DELETE FROM blog where id='$codigo';";
    if (mysqli_query($this->open(), $sql)) {
      unlink("blog/$page.php");
      echo "<script> alert('Eliminado Correctamente $page'); </script>";
    } else {
    }
    $this->blogSelect();
  }
  public function blogInsert($id,$title, $post,$imageurl,$description)
  {
    // reemplazar espacion por guiones del title
    $page = str_replace(" ", "-", $title);
    $page = str_replace("#", "sharp", $page);
    //reemplazar comillar por apotrofo
    $post = str_replace('"', "'", $post);
    $post='"'.$post.'"';
    //registra los datos del blog
    $sql = "INSERT INTO blog (personid,title,post,page,description,imageurl,created_at,updated_at) VALUES ('$id','$title',$post,'$page','$description','$imageurl',now(),now())";
    echo $sql;
    if (mysqli_query($this->open(), $sql)) {
      $title_post="<!DOCTYPE html>
      <html>
      <head>
          <meta charset='UTF-8'>
          <meta http-equiv='X-UA-Compatible' content='IE=edge'>
          <meta name='generator' content='Mobirise v4.12.4, mobirise.com'>
          <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1'>
          <title>$title</title>";
      $php1 = "<?php include ('head.php') ?>";
$php2 = "<?php include ('footer.php') ?>";

$facebook_comment = "<div id='fb-root'></div>
<script async defer crossorigin='anonymous' src='https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0'
    nonce='R392LXB9'></script>
<div class='fb-comments' data-href='$page.php' data-numposts='5' data-width='100%'></div>";

$disquis="<div id='disqus_thread'></div>
<script>


(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://logicainformatica.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>";
$facebook_compartir = "<div class='fb-like' data-href='$page.php' data-width='' data-layout='button_count'
    data-action='like' data-size='small' data-share='true'></div>";

$contenido =$title_post. $php1 . "<h1 class='title_post'>$title</h1>$facebook_compartir <p>$post</p>$disquis" . $php2;

file_put_contents("blog/$page.php", $contenido);


echo "<script>
alert('Registrado Correctamente');
blogNuevo();
</script>";
} else {
die('Error. ' . mysqli_error($sql));
}

$this->blogSelect();
}
public function blogSelectOne($codigo)
{
//registra los datos del empleados
$sql = mysqli_query($this->open(), "SELECT * from blog where id ='$codigo'");
$r = mysqli_fetch_assoc($sql);
$codigo = $r["id"];
$title = $r["title"];
$post = $r["post"];
$imageurl = $r["imageurl"];
$description = $r["description"];
?>
<script>

blog.codigo.value = '$codigo';
blog.title.value = '$title';
blog.imageurl.value='$imageurl';
blog.description.value='$description';
document.getElementById('post').innerHTML="<?php echo $post ?>";
</script>

<?php
$this->blogSelect();
}

public function blogUpdate($codigo, $title, $post,$imageurl,$description)
{
$sql = "UPDATE blog set title='$title',post='$post',imageurl='$imageurl',description='$description' where id='$codigo'";
mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
echo "<script>
blog.codigo.value = '$codigo';
blog.title.value = '$title';
document.getElementById('post').innerHTML='$post';
</script>";

//rename("blog/$title.php",);
$this->blogSelect();
}
}

$blog = new blog();
if ($metodo == "delete") {
$blog->blogDelete($codigo, $page);
} elseif ($metodo == "insert") {
$blog->blogInsert($id,$title, $post,$imageurl,$description);
} elseif ($metodo == "select") {
$blog->blogSelectOne($codigo);
} elseif ($metodo == "update") {
$blog->blogUpdate($codigo, $title, $post,$imageurl,$description);
}
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/

