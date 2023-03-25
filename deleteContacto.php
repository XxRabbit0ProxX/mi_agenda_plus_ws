<?php
/*
 * El siguiente código Elimina un producto
*/
    include_once("conecta.php");

    if ($_SERVER['REQUEST_METHOD']== "POST"){

        $objson = json_decode(file_get_contents("php://input"), true);

        $idcto = $objson["idcto"];

        $sentencia = "DELETE FROM contactos WHERE id_cto = $idcto";

        $res = mysqli_query($Cn,$sentencia);

        if ($res){

            if (mysqli_affected_rows($Cn) > 0){

                $respuesta["success"] = 200;
                $respuesta["message"] = "Registro Eliminado";
            }
            else{

                $respuesta["success"] = 404;
                $respuesta["message"] = "No se elimino el Contacto";        
            }
        } else {

            $respuesta["success"] = 404;
            $respuesta["message"] = "No se elimino el Contacto";    
        }
    }
    else{

        $respuesta["success"] = 400;
        $respuesta["message"] = "Método incorrecto";
    }

    echo json_encode($respuesta);
    include_once("desconecta.php");
?>