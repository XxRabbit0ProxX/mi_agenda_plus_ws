<?php
/*
 * El siguiente código Actualiza un producto
*/
    include_once("conecta.php");

    if ($_SERVER['REQUEST_METHOD']== "POST"){

        $objson = json_decode(file_get_contents("php://input"), true);

        $idcto = $objson["idCto"];
        $nomcto = $objson["nomCto"];
        $domcto = $objson["domCto"];
        $correocto = $objson["correoCto"];
        $telcto = $objson["telCto"];
        $celcto = $objson["celCto"];
        $cumplecto = $objson["cumpleCto"];
        $altacto = $objson["altaCto"];
        $correouser = $objson["correoUser"];

        $sentencia = "UPDATE contactos SET nom_cto = '$nomcto', dom_cto = $domcto, correo_cto = $correocto, tel_cto = $telcto, celcto = $celcto, cumple_cto = $cumplecto, alta_cto = $altacto, correo_user = $correouser Where id_cto = $idcto";

        $res = mysqli_query($Cn,$sentencia);

        if ($res){

            if (mysqli_affected_rows($Cn) > 0){

                $respuesta["success"] = 200;
                $respuesta["message"] = "Registro Actualizado";
            }
            else{

                $respuesta["success"] = 404;
                $respuesta["message"] = "No se actualizo el Contacto";        
            }
        } else {

            $respuesta["success"] = 404;
            $respuesta["message"] = "No se actualizo el Contacto";    
        }
    }
    else{

        $respuesta["success"] = 400;
        $respuesta["message"] = "Método incorrecto";
    }

    echo json_encode($respuesta);
    include_once("desconecta.php");
?>