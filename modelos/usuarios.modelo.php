<?php

require_once "conexion.php";

class ModeloUsuarios{

    /*=============================================
    =            Mostrar Usuarios            =
    =============================================*/
    
    static public function mdlMostrarUsuarios($tabla, $item, $valor){

        // Filtro
        if($item != null){
           $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN Usuario ON employeer_No = Usuario_employeer_No WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();
            return $stmt -> fetch();

        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        // 
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    =            Registro de Usuario            =
    =============================================*/
    static public function mdlIngresarUsuario($tabla, $datos){
        
        

        $stmt -> bindParam(":employeer_No", $datos["nuevoNumeroE"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $datos["nuevoNombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":last_name", $datos["nuevoApellidoP"], PDO::PARAM_STR);
        $stmt -> bindParam(":second_name", $datos["nuevoApelliM"], PDO::PARAM_STR);
        $stmt -> bindParam(":employee_group", $datos["nuevoGrupoE"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["nuevoEmail"], PDO::PARAM_STR);
        $stmt -> bindParam(":address", $datos["nuevoDireccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["nuevoPerfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":cell_number", $datos["nuevoNcelular"], PDO::PARAM_STR);
        $stmt -> bindParam(":organizational_unit", $datos["nuevoUnidadO"], PDO::PARAM_STR);
        $stmt -> bindParam(":personal_subarea", $datos["nuevoSubarea"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuario (employeer_No, 'name', last_name, second_name,employee_group, email, 'address', rol, cell_number, organizational_unit,personal_subarea, 'image') VALUES (:employeer_No, :nombre, :last_name,:second_name, :employee_group, :email, :'address', :perfil, :cell_number, :organizational_unit,:personal_subarea, :foto)");

       
        $stmt -> bindParam(":Username", $datos["nuevoUsuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":Password", $datos["nuevoPassword"], PDO::PARAM_STR);
        $stmt -> bindParam(":employeer_No", $datos["nuevoNumeroE"], PDO::PARAM_STR);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Username, 'Password', Usuario_employeer_No) VALUES (:Username,:'Password',:employeer_No,)");
        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }
    /*=============================================
    =            Editar Usuario            =
    =============================================*/
    static public function mdlEditarUsuario($tabla, $datos){
    	 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ( name = :nombre, last_name = :last_name, second_name = :second_name,employee_group = :employee_group , email = :email, address = :address, rol = :perfil, cell_number = :cell_number, organizational_unit = :organizational_unit,personal_subarea =:personal_subarea , image = :foto WHERE employeer_No = :employeer_No");
       $stmt = Conexion::conectar()->prepare("UPDATE login SET  Password = :Password  WHERE Username_employeer_No = :employeer_No");

        $stmt -> bindParam(":employeer_No", $datos["nuevoNumeroE"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":last_name", $datos["apelliP"], PDO::PARAM_STR);
        $stmt -> bindParam(":second_name", $datos["apelliM"], PDO::PARAM_STR);
        $stmt -> bindParam(":employee_group", $datos["GrupoE"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":address", $datos["direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":cell_number", $datos["Ncelular"], PDO::PARAM_STR);
        $stmt -> bindParam(":organizational_unit", $datos["UnidadO"], PDO::PARAM_STR);
        $stmt -> bindParam(":personal_subarea", $datos["Subarea"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":Password", $datos["Password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    =            Borrar Usuario            =
    =============================================*/
     static public function mdlBorrarUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE employeer_No = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

}