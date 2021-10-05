<?php

class ControladorUsuarios{
    /*=============================================
    =            Met.Ingreso de Usuario            =
    =============================================*/
   static public function ctrIngresoUsuario(){
        if (isset($_POST["ingUsuario"])) {
            // Validacion por parte del servidor que permitira caracteres (a-zA-Z y numeros)
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[-a-zA-Z0-9-áéíóúÁÉÍÓÚñÑ]+$/', $_POST["ingContraseña"])) {

               // $encriptar = crypt($_POST["ingContraseña"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "login";
                // Consultar la columna usuario
                $item = "Username";
                // Valora consultar
                $valor = $_POST["ingUsuario"];
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                //if($respuesta["Username"] == $_POST["ingUsuario"] && $respuesta["Password"] = $encriptar){
                if($respuesta["Username"] == $_POST["ingUsuario"] && $respuesta["Password"] == $_POST["ingContraseña"]){   
                    // echo '<div class="alert alert-success">Bienvenido al Sistema</div>';
                    $_SESSION["iniciarSesion"] = "ok";
                    // Sesiones creadas del usuario
                    $_SESSION["name"] = $respuesta["name"];
                    $_SESSION["Username"] = $respuesta["Username"];
                    $_SESSION["image"] = $respuesta["image"];
                    $_SESSION["perfil"] = $respuesta["rol"];
                    echo '<script>
                        window.location = "inicio";
                    </script>';
                }else{
                    echo '<div class="alert alert-danger">Error al ingresar, vuelve a interntarlo</div>';
                }
            }
        }
    }
    /*=============================================
    =            Met. Mostrar Usuario            =
    =============================================*/
    static public function ctrMostrarUsuarios($item, $valor){

        $tabla = "usuario";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }


 /*=============================================
    =            Met.Registro de Usuario            =
    =============================================*/
    static public function ctrCrearUsuario() {
        if (isset($_POST["nuevoNumeroE"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9-áéíóúÁÉÍÓÚñÑ]+$/', $_POST["nuevoPassword"])) {

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
                    $directorio = "vistas/img/usuarios/". $_POST["nuevoNumeroE"];
                    // Para crear el directorio utilizamos metodo de JS - mkdir
                    // 0755 permisos de lectura y escritura
                    mkdir($directorio, 0755);
                    // De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP
                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                        // Guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/". $_POST["nuevoNumeroE"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    if($_FILES["nuevaFoto"]["type"] == "image/png"){
                        // Guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/". $_POST["nuevoNumeroE"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }

                }

                $tabla ="usuario";

                // Funcion crypt PHP ocupando hash de tipo blowfish
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("employeer_No" => $_POST["nuevoNumeroE"],
                	"nombre" => $_POST["nuevoNombre"],
                	"apelliP" => $_POST["nuevoApellidoP"],
                	"apelliM" => $_POST["nuevoApellidoM"],
                	"GrupoE" => $_POST["nuevoGrupoE"],
                	"email" => $_POST["nuevoEmail"],
                	"direccion" => $_POST["nuevoDireccion"],
                	"perfil" => $_POST["nuevoPerfil"],
                	"Ncelular" => $_POST["nuevoNcelular"],
                	"UnidadO" => $_POST["nuevoUnidadO"],
                	"Subarea" => $_POST["nuevoSubarea"],
                	"foto" => $ruta,
                    "Username" => $_POST["nuevoUsuario"],
                    "Password" =>  $encriptar);
                   

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    Swal.fire({
                        type: "success",
                        icon: "success",
                        title: "¡El usuario ha sido guardado correctamente!",
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
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
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
    =            Met. Editar Usuario            =
    =============================================*/

    static public function ctrEditarUsuario(){

        if(isset($_POST["editarNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                /*=============================================
                                Validar imagen
                =============================================*/

                $ruta = $_POST["fotoActual"];

                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
                    Creamos directorio para guardar foto del usuario
                    =============================================*/

                    $directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

                    /*=============================================
                    Preguntamos si existe otra img en la BD
                    =============================================*/

                    if(!empty($_POST["fotoActual"])){

                        unlink($_POST["fotoActual"]);

                    }else{

                        mkdir($directorio, 0755);

                    }   

                    /*=============================================
                    De acuerdo al tipo de img aplicamos las funciones por defecto de PHP
                    =============================================*/

                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){

                        /*=============================================
                        Guardamos img en el directorio
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);                       

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if($_FILES["editarFoto"]["type"] == "image/png"){

                        /*=============================================
                        Guardamos img en el directorio
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);                        

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "usuario";

                if($_POST["editarPassword"] != ""){

                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    }else{

                        echo'<script>

                                Swal.fire({
                                      type: "error",
                                      icon: "error",
                                      title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                      showConfirmButton: true,
                                      confirmButtonText: "Cerrar"
                                      }).then((result)=>{
                                        if (result.value) {

                                        window.location = "usuarios";

                                        }
                                    });

                            </script>';

                    }

                }else{

                    $encriptar = $_POST["passwordActual"];

                }

                

                 $datos = array(
                	"nombre" => $_POST["editarNombre"],
                	"apelliP" => $_POST["editarLast_name"],
                	"apelliM" => $_POST["editarSecond_name"],
                	"GrupoE" => $_POST["editarGrupoE"],
                	"email" => $_POST["editarEmail"],
                	"direccion" => $_POST["nuevoDireccion"],
                	"perfil" => $_POST["editarPerfil"],
                	"Ncelular" => $_POST["editarNcelular"],
                	"UnidadO" => $_POST["editarUnidadO"],
                	"Subarea" => $_POST["editarSubarea"],
                	"foto" => $ruta,
                    "Password" =>  $encriptar);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                    Swal.fire({
                          type: "success",
                          icon: "success",
                          title: "El usuario ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then((result) => {
                            if (result.value) {

                                window.location = "usuarios";

                                }
                            });

                    </script>';

                }


            }else{

                echo'<script>

                    Swal.fire({
                          type: "error",
                          icon: "error",
                          title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then((result) => {
                            if (result.value) {

                            window.location = "usuarios";

                            }
                        });

                </script>';

            }

        }

    }
  /*=============================================
    =            Met. Borrar Usuario            =
    =============================================*/

    static public function ctrBorrarUsuario(){
        if (isset($_GET["idEmployeer_No"])) {

            $tabla = "usuario";
            $datos = $_GET["idEmployeer_No"];

            if ($_GET["fotoUsuario"] != "") {
                unlink($_GET["fotoUsuario"]);
                rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                
                echo'<script>

                    Swal.fire({
                          type: "success",
                          icon: "success",
                          title: "El usuario ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                          }).then((result) => {
                            if (result.value) {

                                window.location = "usuarios";

                                }
                            });

                    </script>';

            }
        }
    }


}
