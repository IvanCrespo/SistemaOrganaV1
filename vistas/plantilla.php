<?php

  session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Organa</title>
  <!-- Para poder trabajar con los puntos de quiebre y diseño responsivo -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" 
  name="viewport">
  <!-- logo de la pestaña del buscador -->
  <link rel="icon" href="vistas/img/plantilla/T-S_logo_min_pink.svg">
  
<!-- Inicio de sentencia para poder entrar al sistema o permanecer en el inicio -->
<?php
  // Si una seccion esta abierta 
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

  // <!--=====================================
  // =            CUERPO DOCUMENTO           =
  // ======================================-->
  
  // Include para traer los css y js del sistema principal 
  include "plugins_link/plugins-system.php";
  echo '</head>';
  echo '<body class="body-pd">';

  /*=============================================
  =            CABEZOTE            =
  =============================================*/
  include "modulos/cabezote.php";
  /*=============================================
  =            MENU            =
  =============================================*/
  include "modulos/menu.php";
  /*=============================================
  =            CONTENIDO            =
  =============================================*/
  // Visualización de las vistas del sistema
  if (isset($_GET["views"])) {
    if ($_GET["views"] == "inicio" ||
        $_GET["views"] == "usuarios" ||
        $_GET["views"] == "activos" ||
        $_GET["views"] == "caracteristicas" ||
        $_GET["views"] == "garantia" ||
        $_GET["views"] == "finanzas" ||
        $_GET["views"] == "accesorios" ||
        $_GET["views"] == "reportes" ||
        $_GET["views"] == "categorias" ||
        $_GET["views"] == "salir") {
      include "modulos/".$_GET["views"].".php";
    }else{
      include "modulos/404.php";
    }
  }else{
    include "modulos/inicio.php";
  }
  /*=============================================
  =            FOOTER            =
  =============================================*/
  include "modulos/footer.php";
  echo'<script src="vistas/js/plantilla.js"></script>
       <script src="vistas/js/usuarios.js"></script>
  </body>
  </html>';

  // Si no esta abierta un sección, permanecemos en el inicio del sistema (login, pagina principal)
  }else if(isset($_GET["views"])) {
    if ($_GET["views"] == "login" ||
        $_GET["views"] == "pageTS" ||
        $_GET["views"] == "mantenimiento") {
      // include para traer los css y js del inicio del sistema
      include "plugins_link/plugins-init.php";
      echo '</head>';
      include "modulos/".$_GET["views"].".php";
    }else{
      include "plugins_link/plugins-init.php";
      echo '</head>';
      include "modulos/404-Error.php";
    }
  }else{
  include "plugins_link/plugins-init.php";
  echo '</head>';
  include "modulos/login.php";
  }

?>

  