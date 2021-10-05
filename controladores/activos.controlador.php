<?php

class ControladorActivos{

    /*=============================================
    =            Met.Registro de Usuario            =
    =============================================*/
    static public function ctrCrearActivo() {
        if (isset($_POST["nuevoActivo"])) {
            if (preg_match('/^[a-zA-Z0-9Ã±Ã‘Ã¡Ã©Ã­Ã³ÃºÃÃ‰ÃÃ“Ãš ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

                // Validar Imagen por pesos file
                
                $ruta = "";
                // --------- tmp_name es el parametro para archivo temporal
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){
                    //guardar imagenes en 500x500px
                    //metodo list permite crear un nuevo array con los indices que le asignemos
                    //accion de PHP getimagessize
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    // var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));
                    
                    // Creamos el directorio donde vamos a guardar la foto del usuario
                    $directorio = "vistas/img/usuarios/". $_POST["nuevoUsuario"];
                    // Para crear el directorio utilizamos metodo de JS - mkdir
                    // 0755 permisos de lectura y escritura
                    mkdir($directorio, 0755);
                    // De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP
                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                        // Guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/". $_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    if($_FILES["nuevaFoto"]["type"] == "image/png"){
                        // Guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/". $_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }

                }

                $tabla ="activo";

                // Funcion crypt PHP ocupando hash de tipo blowfish
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "Username" => $_POST["nuevoUsuario"],
                    "Password" =>  $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    Swal.fire({
                        type: "success",
                        icon: "success",
                        title: "Â¡El usuario ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "usuarios";
                            }
                    });
                </script>';
                }


            }else {
                // Alerta suave: es un plugin llamado sweetalert
                echo '<script>

                    Swal.fire({
                        type: "error",
                        icon: "error",
                        title: "Â¡El usuario no puede ir vacÃ­o o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "usuarios";
                            }
                    });

                </script>';
            }
        }
    }

    /*=============================================
    =            Met. Mostrar Usuario            =
    =============================================*/
    static public function ctrMostrarActivos($item, $valor){

        $tabla = "activo";
        $respuesta = ModeloActivos::MdlMostrarActivos($tabla, $item, $valor);

        return $respuesta;
    }

}


