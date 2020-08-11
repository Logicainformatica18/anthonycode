function personInsert() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
    personNuevo();
}
function personDelete(codigo) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("person"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        $.ajax({
            url: "functionperson.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}
function personSelectOne(codigo) {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personSearch() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "search");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}

function personUpdate() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personUpdatePerfil() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "updateperfil");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personLogin() {
    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "login");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personChangePassword() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "changePassword");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
    //limpia por completo el formulario usando jquery
    // $("#person")[0].reset();
}
function personFiltro() {

    var formData = new FormData(document.getElementById("filtro"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "filtro");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personSearch2() {

    var formData = new FormData(document.getElementById("programaciondetalle"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "search2");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function blogInsert() {

    var formData = new FormData(document.getElementById("blog"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionblog.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function blogDelete(codigo,page) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("blog"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("page", page);
        $.ajax({
            url: "functionblog.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function blogSelectOne(codigo) {
    var formData = new FormData(document.getElementById("blog"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionblog.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function blogUpdate() {

    var formData = new FormData(document.getElementById("blog"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionblog.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function generoInsert() {

    var formData = new FormData(document.getElementById("genero"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functiongenero.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function generoDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("genero"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functiongenero.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function generoSelectOne(codigo) {
    var formData = new FormData(document.getElementById("genero"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functiongenero.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function generoUpdate() {

    var formData = new FormData(document.getElementById("genero"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functiongenero.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function catalogoInsert() {

    var formData = new FormData(document.getElementById("catalogo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioncatalogo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function catalogoDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("catalogo"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioncatalogo.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function catalogoSelectOne(codigo) {
    var formData = new FormData(document.getElementById("catalogo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioncatalogo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function catalogoUpdate() {

    var formData = new FormData(document.getElementById("catalogo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioncatalogo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}


///////////////////
function categoriaInsert() {

    var formData = new FormData(document.getElementById("categoria"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioncategoria.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function categoriaDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("categoria"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioncategoria.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function categoriaSelectOne(codigo) {
    var formData = new FormData(document.getElementById("categoria"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioncategoria.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function categoriaUpdate() {

    var formData = new FormData(document.getElementById("categoria"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioncategoria.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function servicioInsert() {

    var formData = new FormData(document.getElementById("servicio"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionservicio.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function servicioDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("servicio"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionservicio.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function servicioSelectOne(codigo) {
    var formData = new FormData(document.getElementById("servicio"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionservicio.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function servicioUpdate() {

    var formData = new FormData(document.getElementById("servicio"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionservicio.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

function proveedoresInsert() {

    var formData = new FormData(document.getElementById("proveedores"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionproveedores.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function proveedoresDelete(codigo) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("proveedores"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        $.ajax({
            url: "functionproveedores.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function proveedoresSelectOne(codigo) {

    var formData = new FormData(document.getElementById("proveedores"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionproveedores.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function proveedoresUpdate() {

    var formData = new FormData(document.getElementById("proveedores"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionproveedores.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}


function productosInsert() {

    var formData = new FormData(document.getElementById("productos"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionproductos.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function productosDelete(codigo) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("productos"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        $.ajax({
            url: "functionproductos.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function productosSelectOne(codigo) {

    var formData = new FormData(document.getElementById("productos"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionproductos.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function productosUpdate() {

    var formData = new FormData(document.getElementById("productos"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionproductos.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}
function productosDetalle(codigo) {

    var formData = new FormData(document.getElementById("productos"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "detalle");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionproductos.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

function productosdetalleInsert() {

    var formData = new FormData(document.getElementById("productosdetalle"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionproductosdetalle.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function productosdetalleDelete(codigo) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("productosdetalle"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        $.ajax({
            url: "functionproductosdetalle.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function productosdetalleSelectOne(codigo) {

    var formData = new FormData(document.getElementById("productosdetalle"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionproductosdetalle.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function productosdetalleUpdate() {

    var formData = new FormData(document.getElementById("productosdetalle"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionproductosdetalle.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}




///////////////////
function positionInsert() {

    var formData = new FormData(document.getElementById("position"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionposition.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function positionDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("position"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionposition.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function positionSelectOne(codigo) {
    var formData = new FormData(document.getElementById("position"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionposition.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function positionUpdate() {

    var formData = new FormData(document.getElementById("position"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionposition.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}
///////////////////
function instituteInsert() {

    var formData = new FormData(document.getElementById("institute"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioninstitute.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function instituteDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("institute"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioninstitute.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function instituteSelectOne(codigo) {
    var formData = new FormData(document.getElementById("institute"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioninstitute.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function instituteUpdate() {

    var formData = new FormData(document.getElementById("institute"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioninstitute.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}


///////////////////
function specialtyInsert() {

    var formData = new FormData(document.getElementById("specialty"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionspecialty.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function specialtyDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("specialty"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionspecialty.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function specialtySelectOne(codigo) {
    var formData = new FormData(document.getElementById("specialty"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionspecialty.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function specialtyUpdate() {

    var formData = new FormData(document.getElementById("specialty"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionspecialty.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function courseInsert() {

    var formData = new FormData(document.getElementById("course"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioncourse.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function courseDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("course"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioncourse.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function courseSelectOne(codigo) {
    var formData = new FormData(document.getElementById("course"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioncourse.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function courseUpdate() {

    var formData = new FormData(document.getElementById("course"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioncourse.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function scheduleInsert() {

    var formData = new FormData(document.getElementById("schedule"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionschedule.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function scheduleDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("schedule"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionschedule.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function scheduleSelectOne(codigo) {
    var formData = new FormData(document.getElementById("schedule"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionschedule.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function scheduleUpdate() {

    var formData = new FormData(document.getElementById("schedule"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionschedule.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function registryInsert() {

    var formData = new FormData(document.getElementById("registry"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionregistry.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function registryDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("registry"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionregistry.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function registrySelectOne(codigo) {
    var formData = new FormData(document.getElementById("registry"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionregistry.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function registryUpdate() {

    var formData = new FormData(document.getElementById("registry"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionregistry.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}
function registryDetail(codigo) {

    var formData = new FormData(document.getElementById("registry"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "detail");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionregistry.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function registrydetailInsert() {

    var formData = new FormData(document.getElementById("registrydetail"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionregistrydetail.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function registrydetailDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("registrydetail"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionregistrydetail.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function registrydetailSelectOne(codigo) {
    var formData = new FormData(document.getElementById("registrydetail"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionregistrydetail.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function registrydetailUpdate() {

    var formData = new FormData(document.getElementById("registrydetail"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionregistrydetail.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

function registrydetailCalification(codigo) {

    var formData = new FormData(document.getElementById("calification1"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "calification");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionregistrydetail.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}
function registrydetailCalificationUpdate() {

    var formData = new FormData(document.getElementById("calification1"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "calificationUpdate");
    $.ajax({
        url: "functionregistrydetail.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}
function noteSelectOne(codigo) {

    var formData = new FormData(document.getElementById("calification1"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionnote.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}


function envioWhatsapp(cliente){


    let url = "https://api.whatsapp.com/send?phone=51997852483&text=*Tengo una duda -*%0A" + cliente;
    window.open(url);
}




function categoriasEditar() {
    categorias.btn.disabled = true;
    categorias.nuevo.disabled = true;
    categorias.modificar.disabled = false;
  
}
function categoriasNuevo() {
    categorias.btn.disabled = false;
    categorias.nuevo.disabled = false;
    categorias.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#categorias")[0].reset();
}
function blogNuevo() {
    //limpia por completo el formulario usando jquery
    document.getElementById('post').innerHTML="";
    $("#blog")[0].reset();

}
function generoEditar() {
    genero.btn.disabled = true;
    genero.nuevo.disabled = true;
    genero.modificar.disabled = false;
  
}
function generoNuevo() {
    genero.btn.disabled = false;
    genero.nuevo.disabled = false;
    genero.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#genero")[0].reset();
}
function categoriaEditar() {
    categoria.btn.disabled = true;
    categoria.nuevo.disabled = true;
    categoria.modificar.disabled = false;
  
}
function categoriaNuevo() {
    categoria.btn.disabled = false;
    categoria.nuevo.disabled = false;
    categoria.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#categoria")[0].reset();
}
function catalogoEditar() {
    catalogo.btn.disabled = true;
    catalogo.nuevo.disabled = true;
    catalogo.modificar.disabled = false;
  
}
function catalogoNuevo() {
    catalogo.btn.disabled = false;
    catalogo.nuevo.disabled = false;
    catalogo.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#catalogo")[0].reset();
}
function servicioEditar() {
    servicio.btn.disabled = true;
    servicio.nuevo.disabled = true;
    servicio.modificar.disabled = false;
  
}
function servicioNuevo() {
    servicio.btn.disabled = false;
    servicio.nuevo.disabled = false;
    servicio.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#servicio")[0].reset();
}


function positionEditar() {
    position.btn.disabled = true;
    position.nuevo.disabled = true;
    position.modificar.disabled = false;
  
}
function positionNuevo() {
    position.btn.disabled = false;
    position.nuevo.disabled = false;
    position.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#position")[0].reset();
}

function productosEditar() {
    productos.btn.disabled = true;
    productos.nuevo.disabled = true;
    productos.modificar.disabled = false;
  
}
function productosNuevo() {
    productos.btn.disabled = false;
    productos.nuevo.disabled = false;
    productos.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#productos")[0].reset();
}

function productosdetalleEditar() {
    productosdetalle.btn.disabled = true;
    productosdetalle.nuevo.disabled = true;
    productosdetalle.modificar.disabled = false;
  
}
function productosdetalleNuevo() {
    productosdetalle.btn.disabled = false;
    productosdetalle.nuevo.disabled = false;
    productosdetalle.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#productosdetalle")[0].reset();
}


function personEditar() {
    person.btn.disabled = true;
    person.nuevo.disabled = true;
    person.modificar.disabled = false;
  
}
function personNuevo() {
   // person.btn.disabled = false;
  //  person.nuevo.disabled = false;
 //   person.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#person")[0].reset();
}

function instituteEditar() {
    institute.btn.disabled = true;
    institute.nuevo.disabled = true;
    institute.modificar.disabled = false;
  
}
function instituteNuevo() {
    institute.btn.disabled = false;
    institute.nuevo.disabled = false;
    institute.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#institute")[0].reset();
}

function specialtyEditar() {
    specialty.btn.disabled = true;
    specialty.nuevo.disabled = true;
    specialty.modificar.disabled = false;
  
}
function specialtyNuevo() {
    specialty.btn.disabled = false;
    specialty.nuevo.disabled = false;
    specialty.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#specialty")[0].reset();
}
function courseEditar() {
    course.btn.disabled = true;
    course.nuevo.disabled = true;
    course.modificar.disabled = false;
  
}
function courseNuevo() {
    course.btn.disabled = false;
    course.nuevo.disabled = false;
    course.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#course")[0].reset();
}
function scheduleEditar() {
    schedule.btn.disabled = true;
    schedule.nuevo.disabled = true;
    schedule.modificar.disabled = false;
  
}
function scheduleNuevo() {
    schedule.btn.disabled = false;
    schedule.nuevo.disabled = false;
    schedule.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#schedule")[0].reset();
}
function registryEditar() {
    registry.btn.disabled = true;
    registry.nuevo.disabled = true;
    registry.modificar.disabled = false;
  
}
function registryNuevo() {
    registry.btn.disabled = false;
    registry.nuevo.disabled = false;
    registry.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#registry")[0].reset();
}
function registrydetailEditar() {
    registrydetail.btn.disabled = true;
    registrydetail.nuevo.disabled = true;
    registrydetail.modificar.disabled = false;
  
}
function registrydetailNuevo() {
    registrydetail.btn.disabled = false;
    registrydetail.nuevo.disabled = false;
    registrydetail.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#registrydetail")[0].reset();
}




function readImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }



  function tabla_filtro(){
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

  }

