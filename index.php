<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/activos.controlador.php";
require_once "controladores/accesorios.controlador.php";
require_once "controladores/reportes.controlador.php";
require_once "controladores/categorias.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/activos.modelo.php";
require_once "modelos/accesorios.modelo.php";
require_once "modelos/reportes.modelo.php";
require_once "modelos/categorias.modelo.php";


//objeto va a instanciar una clase (La clase va estar creada en plantilla.controlador.php)
$plantilla = new ControladorPlantilla();
// Ejecutamos metodos que estan dentro de la clase
$plantilla -> ctrPlantilla();

