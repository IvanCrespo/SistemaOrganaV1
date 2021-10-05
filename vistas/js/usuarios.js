/*================================================
=         Subiendo foto de Usuario            =
================================================*/
$(".nuevaFoto").change(function(){
    var imagen = this.files[0];

    // Filtro para validar el formato de imagen (JPG o PNG)
    
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevaFoto").val("");
        Swal.fire({
            type: "error",
            icon: "error",
            title: "Error al subir imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            confirmButtonText: "Cerrar"
        });
        //2 millones = a 2MB 
    }else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");
        Swal.fire({
            type: "error",
            icon: "error",
            title: "Error al subir imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            confirmButtonText: "Cerrar"
        });
    }else{
        // FileReader clase para lectura de Archivo
        var datosImagen = new FileReader;
        // Metodo leer dato como URL
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        });
    }

})
/*=====  FIN Subiendo foto de Usuario  ======*/

/*================================================
    =         Editar Usuario            =
================================================*/
// Significa que cuando el documento ya este cargado, busque en cualquier 
// momento la clase btn, asi no se halla cargado al principio del doc 
$(document).on("click", ".btnEditarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");
    // console.log("idUsuario", idUsuario);
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
                // console.log("respuesta", respuesta);
                $("#editarNombre").val(respuesta["nombre"]);
                $("#editarLast_name").val(respuesta["apelliP"]);
                $("#editarSecond_name").val(respuesta["apelliM"]);
                $("#editarGrupoE").val(respuesta["GrupoE"]);
                $("#editarEmail").val(respuesta["email"]);
                $("#editarDireccion").val(respuesta["direccion"]);
                $("#editarCelular").val(respuesta["Ncelular"]);
                $("#editarUnidadO").val(respuesta["UnidadO"]);
                $("#editarSubarea").val(respuesta["Subarea"]);
                $("#editarPerfil").val(respuesta["perfil"]);
                $("#fotoActual").val(respuesta["foto"]);
                $("#passwordActual").val(respuesta["Password"]);

                if(respuesta["foto"] != ""){

                $(".previsualizar").attr("src", respuesta["foto"]);

            }
        }

    });
})



/*=====  FIN Editar Usuario  ======*/

/*================================================
=        Eliminar Usuario            =
================================================*/
$(document).on("click", ".btnEliminarUsuario", function(){
    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    Swal.fire({
        type: 'warning',
        icon: 'warning',
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la acción!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
        }).then((result)=>{
            if(result.value){
                window.location = "index.php?views=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
            }
    });
})

/*=====  FIN Eliminar Usuario  ======*/
