<?php
include("teacher_head.php");
//include('functionperson.php');
include('functionregistrydetail.php');

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="page-header"><i class="fa fa-table"></i> Registros Detalle</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tabla</li>
                    <li class="breadcrumb-item active">Registros Detalle</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="registrydetailNuevo();">Agregar Alumno</button>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<style>
    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
    }

    input {
        border: 1px solid transparent;

        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {

        width: 100%;
    }



    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
       
    }
    
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"style="width:300px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Gestionar Registros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" id="registrydetail" name="registrydetail" method="POST" action="" enctype="multipart/form-data">
                 
                        <input type="hidden" name="codigo">
                        <h6><b>Agregar Alumno</b></h6>
                        <div class="autocomplete" style="width:100%;">
                            <input id="criterio2" type="text" name="student" placeholder="Ingrese Apellidos" class="form-control" autocomplete="off">
                        </div>

                        <p></p>
                        Elija un Carrera:
                        <select name="specialtyid"  class="form-control">
                            <?php
                            $con = new connection();
                            $sql = mysqli_query($con->open(), "SELECT * from specialty ");
                            while ($row = mysqli_fetch_array($sql)) {
                                $id = $row['id'];
                                $description = $row['description'];
                                echo "<option value='$id'>" .  $description . "</option>";
                            }

                            ?>
                        </select>
                        Elija un modulo:
                            <select name="module" id=""class="form-control">
                                <option value="I">I</option>
                                <option value="II">II</option>
                            </select>
             
            </div>
            <div class="modal-footer">
                <input type="submit" name="nuevo" value="Nuevo" class="btn btn-secondary" onclick="registrydetailNuevo(); return false" />

                <input type="submit" name="btn" value="Grabar" class="btn btn-success" onclick="registrydetailInsert();return false" />

                <input type="submit" name="modificar" value="Modificar" class="btn btn-primary" onclick="registrydetailUpdate(); return false" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</form>
<p></p>



<!-- Modal -->
<div class="modal fade" id="calification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Calificaciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" id="calification1" name="calification" method="POST" action="" enctype="multipart/form-data">
                    <div class="col-s12-l6">
                    <input type="hidden" name="codigo">
                        <h6><b>Notas de 0 a 20</b></h6>
                        <div class="row">
                            <div class="col-3">
                            Nota 1:  <input type="number" name="n1" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 2:  <input type="number" name="n2" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 3:  <input type="number" name="n3" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 4:  <input type="number" name="n4" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 5:  <input type="number" name="n5" class="form-control">
                            </div>
                            <div class="col-3">
                            Ex 1:  <input type="number" name="ex1" class="form-control border-danger">
                            </div>
                            <div class="col-3">
                            Nota 7:  <input type="number" name="n7" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 8:  <input type="number" name="n8" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 9:  <input type="number" name="n9" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 10:  <input type="number" name="n10" class="form-control">
                            </div>
                            <div class="col-3">
                            Nota 11:  <input type="number" name="n11" class="form-control">
                            </div>
                            <div class="col-3">
                            Ex 2:  <input type="number" name="ex2" class="form-control border-danger">
                            </div>
                            <div class="col-6">
                            Promedio 1 <input type="number" name="p1" class="form-control border-success" disabled>
                            </div>
                            <div class="col-6">
                            Promedio 2<input type="number" name="p2" class="form-control border-success" disabled>
                            </div>
                            <div class="col-12">
                            Promedio Final:  <input type="number" name="pend" class="form-control  border-warning" disabled>
                            </div>
                        </div>
        

                        <p></p>
                      
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="modificar" value="Guardar" class="btn btn-success" onclick="registrydetailCalificationUpdate(); return false" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<p></p>

</form>
<script>
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/

                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }
</script>
<script>
    var countries = [""];
</script>
<script>
    autocomplete(document.getElementById("criterio2"), countries);
</script>



<script>
    function calculatedate() {
        var hoy = registrydetail.start.value;

        var a = Date.parse(hoy);
        fecha = new Date(a);
        fecha.setDate(fecha.getDate() + 77);
        var anio = fecha.getFullYear();
        var mes = (fecha.getMonth() + 1);
        var dia = (fecha.getDate() + 1);
        if (parseInt(dia) <= 9) {
            dia = "0" + dia;
        }
        if (parseInt(mes) <= 9) {
            mes = "0" + mes;
        }
        var ff = anio + "-" + mes + "-" + dia;
        registrydetail.end.value = ff;
    }
</script>


<div id="resultado" class="container-fluid">


    <?php
    $registrydetail->registrydetailSelect();
    $person->personSearch2("Alumno");

    ?>

</div>





<?php
include "teacher_footer.php";

?>