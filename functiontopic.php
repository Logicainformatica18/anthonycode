<?php
if (!class_exists("connection")) {
    include("conexion.php");
}
if (!class_exists("session")) {
    include("session.php");
}
$courseid = isset($_POST["courseid"]) ? $_POST["courseid"] : "";
$course = isset($_POST["course"]) ? $_POST["course"] : "";
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$page = isset($_POST['page']) ? $_POST['page'] : "";
$page = str_replace(" ", "-", $page);
$title = isset($_POST['title']) ? $_POST['title'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
$imageurl = isset($_POST['imageurl']) ? $_POST['imageurl'] : "";
$videourl = isset($_POST['videourl']) ? $_POST['videourl'] : "";
$link = isset($_POST['link']) ? $_POST['link'] : "";
$post = isset($_POST['post']) ? $_POST['post'] : "";
//filtro




class topic extends connection
{

    public function topicSelect()
    {
        //consulta todos los empleados
        $sql = mysqli_query($this->open(), "SELECT t.id,t.title,t.page,t.description,c.description as course FROM topic t inner join course c on t.courseid=c.id;");
?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabla de temas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="background-color:white">

                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Tema</th>
                                            <th>Curso</th>
                                            <th>Ver topic</th>
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($sql)) {
                                            echo "<tr>";
                                            $topicid = $row[0];
                                            $page = str_replace(" ", "-", $row[2]);
                                            $page = str_replace("#", "sharp", $page);
                                            echo "<td>" .  $topicid . "</td>";
                                            echo "<td>" . $row[1] . "</td>";
                                            echo "<td>" . $row[4] . "</td>";
                                            $course=$row["course"];
                                            $course = str_replace(" ", "-", $course);
                                            $course = str_replace("#", "sharp", $course);
                                        ?>
                                            <!-- Button trigger modal -->
                                            <td><a href="cursos/<?php echo $course."/". $page . ".php" ?>" target="_blank" class="btn btn-danger">Ver</a></td>
                                            <!-- Button trigger modal -->
                                            <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="topicSelectOne('<?php echo $topicid ?>');  return false"></button>
                                            </td>
                                            <!-- <button class="note-icon-pencil" ></button> -->
                                            <td><button class="btn btn-danger  note-icon-trash" onclick="topicDelete('<?php echo $topicid ?>','<?php echo $row[2] ?>','<?php echo $course ?>');  return false"></button>
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
    public function topicSelect2()
    {
        //consulta todos los empleados
        $sql = mysqli_query($this->open(), "SELECT id,page,title,imageurl,description FROM topic;");
    ?>
        <!-- Main content -->
        <section class="mbr-gallery mbr-slider-carousel cid-s611dDivHx" id="gallery3-3b">
            <div class="container align-left">
                <div class="row">
                    <?php

                    while ($row = mysqli_fetch_array($sql)) {
                        $page = str_replace(" ", "-", $row[1]);
                        $page = str_replace("#", "sharp", $page);
                        $title = $row[2];
                        $imageurl = $row[3];
                        $description = $row[4];
                        echo "   <div class='card col-md-6 col-sm-12 col-lg-4 col-xs-12 shadow p-2 mb-2 bg-white rounded'>
                  <a href='topic/$page.php'><img  src='$imageurl' width='200' height='100' alt='...'>
                              <div class='card-body'>
                                   <h5 class='card-title'><b>$title</b></h5>
                                     <p class='card-text text-black'>$description.</p>
                                     </a>
                                      
                                            <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                                        ";


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
    public function topicDelete($codigo, $page,$course)
    {
        //registra los datos del empleados
        $sql = "DELETE FROM topic where id='$codigo';";
        if (mysqli_query($this->open(), $sql)) {

            unlink("cursos/$course/$page.php");
            echo "<script> alert('Eliminado Correctamente $page'); </script>";
        } else {
        }
        $this->topicSelect();
    }
    public function topicInsert($courseid, $title, $post, $imageurl, $description,$link,$videourl)
    {
        $videourl= str_replace("watch?v=","embed/",$videourl);
        // reemplazar espacion por guiones del title
        $page = str_replace(" ", "-", $title);
        $page = str_replace("#", "sharp", $page);
        //reemplazar comillar por apotrofo
        $post = str_replace('"', "'", $post);
        $post = '"' . $post . '"';
        //registra los datos del topic
        $sql = "INSERT INTO topic (courseid,title,post,page,description,imageurl,created_at,updated_at,link,videourl) VALUES ('$courseid','$title',$post,'$page','$description','$imageurl',now(),now(),'$link','$videourl')";
        if (mysqli_query($this->open(), $sql)) {
           
            $videourl="<iframe width='100%' height='415' src='$videourl' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><p></p>";
            $title_post = "<!DOCTYPE html';
      <html>
      <head>
          <meta charset='UTF-8'>
          <meta http-equiv='X-UA-Compatible' content='IE=edge'>
          <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1'>
          <title>$title</title>";
            $php1 = "<?php include ('../head.php') ?>";
            $php2 = "<?php include ('../footer.php') ?>";
            if($link!=""){
                $link="<a target='_blank'href='$link' style='color:gold;background-color:black' class='btn btn-sm'>
                Dale click para descargar
              </a>";
            }
          
            $disquis = "<div id='disqus_thread'></div>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anthonycode-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>";
           
            $post = str_replace('"', "", $post);
            $contenido = $title_post . $php1 . "$videourl<h1 class='text display-5'>$title</h1>$link <p></p> $disquis" . $php2;
            $query = mysqli_query($this->open(), "SELECT description from course where id='$courseid'");
            $r = mysqli_fetch_assoc($query);
            $directorio = $r["description"];
            $directorio = str_replace(" ", "-", $directorio);
            $directorio = str_replace("#", "sharp", $directorio);
            $directorio="cursos/".$directorio;
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }
            file_put_contents($directorio ."/". "$page.php", $contenido);


            echo "<script>
alert('Registrado Correctamente');

</script>";
        } else {
            //echo $sql;
            die('Error. ' . mysqli_error($sql));
        }

        $this->topicSelect();
    }
    public function topicSelectOne($codigo)
    {
        //registra los datos del empleados
        $sql = mysqli_query($this->open(), "SELECT * from topic where id ='$codigo'");
        $r = mysqli_fetch_assoc($sql);
        $codigo = $r["id"];
        $title = $r["title"];
        $post = $r["post"];
        $imageurl = $r["imageurl"];
        $description = $r["description"];
        $videourl=$r["videourl"];
    ?>
        <script>
            topic.codigo.value = "<?php echo $codigo ?>";
            topic.title.value = "<?php echo $title ?>";
            topic.imageurl.value = "<?php echo $imageurl ?>";
            topic.description.value = "<?php echo $description ?>";
            topic.videourl.value="<?php echo $videourl ?>";
        </script>

<?php
        $this->topicSelect();
    }

    public function topicUpdate($codigo, $title, $post, $imageurl, $description,$link,$videourl)
    {
        $sql = "UPDATE topic set title='$title',post='$post',imageurl='$imageurl',description='$description',videourl='$videourl', link='$link' where id='$codigo'";
        mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
        echo "<script>
topic.codigo.value = '$codigo';
topic.title.value = '$title';
</script>";

        //rename("topic/$title.php",);
        $this->topicSelect();
    }
}

$topic = new topic();
if ($metodo == "delete") {
    $topic->topicDelete($codigo, $page,$course);
} elseif ($metodo == "insert") {
    $topic->topicInsert($courseid, $title, $post, $imageurl, $description,$link,$videourl);
} elseif ($metodo == "select") {
    $topic->topicSelectOne($codigo);
} elseif ($metodo == "update") {
    $topic->topicUpdate($codigo, $title, $post, $imageurl, $description,$link,$videourl);
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
