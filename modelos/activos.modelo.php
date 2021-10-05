<?php

require_once "conexion.php";

class ModeloActivos{

    /*=============================================
    =            Mostrar Activos               =
    =============================================*/
    
    static public function mdlMostrarActivos($tabla, $item, $valor){

        // Filtro
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM Activo");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM Activo");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        // 
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    =            Registro de Activo            =
    =============================================*/
    static public function mdlIngresarUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Username, Password, Usuario_employeer_No) VALUES (:nombre, :Username, :Password, :perfil, :foto)");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":Username", $datos["Username"], PDO::PARAM_STR);
        $stmt -> bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }
}