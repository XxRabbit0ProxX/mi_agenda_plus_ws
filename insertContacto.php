<?php
/*
 * El siguiente código Inserta un producto
 */
        include_once("Conecta.php");

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
            
            $sentencia = "INSERT INTO contactos(id_cto, nom_cto, dom_cto, correo_cto, tel_cto, cel_cto, cumple_cto, alta_cto, correo_user) VALUES ($idcto, '$nomcto', '$domcto', '$correocto', '$telcto', '$celcto', '$cumplecto', '$altacto', '$correouser')";
            
            $res = mysqli_query($Cn,$sentencia);
            if ($res){

                $respuesta["success"] = 200;
                $respuesta["message"] = "Registro Insertado";
            } else {

                $respuesta["success"] = 404;
                $respuesta["message"] = "No se inserto el Contacto";    
            }
        }
        else{

            $respuesta["success"] = 400;
            $respuesta["message"] = "Método incorrecto";
        }

    echo json_encode($respuesta);
    include_once("Desconecta.php");
?>