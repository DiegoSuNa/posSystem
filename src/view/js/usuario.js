
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

})