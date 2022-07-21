
// SUBIENDO FOTO DE USUARIO

$(".nuevaFoto").change(function () {


    var imagen = this.files[0];
    console.log("imagen", imagen);

    // VALIDAR EL TIPO DE ARCHIVO QUE ES LA IMAGEN

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        Swal.fire(
            'Atención!',
            'La imagen debe estar en formato JPG o PNG!',
            'warning'
        );

    } else if (imagen["size"] > 2097152) {

        $(".nuevaFoto").val("");

        Swal.fire(
            'Atención!',
            'La imagen debe no debe superar los 2MB!',
            'warning'
        );


    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);
        });
    }

});

// EDITAR USUARIO 

$(".btnEditarUsuario").click(function(){
    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#passwordActual").val(respuesta["password"]);
            
            $("#editarEstado").html(respuesta["estado"]);
            $("#editarEstado").val(respuesta["estado"]);

            if(respuesta["foto"] != ""){
                $(".previsualizar").attr("src", respuesta["foto"]);
            }

            $("#fotoActual").val(respuesta["foto"]);

        }
    });
});