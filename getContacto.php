<?php
/*
 * El siguiente código localiza un producto
 */
    include_once("conecta.php");

    if ($_SERVER['REQUEST_METHOD']== "POST"){

        $objson = json_decode(file_get_contents("php://input"), true);

        $idcto = $objson["idcto"];

        $sentencia = "SELECT * FROM contactos WHERE id_cto = $idcto";

        $res = mysqli_query($Cn,$sentencia);

        if (mysqli_num_rows($res)>0){

            $respuesta["success"] = 200;
            $respuesta["message"] = "Registro encontrado";
            $respuesta["contactos"] = array();

            if ($tupla = mysqli_fetch_array($res)){

                $Contacto = Array();
                
                $Contacto["idcto"] = $tupla['id_cto'];
                $Contacto["nomcto"] = $tupla['nom_cto'];
                $Contacto["domcto"] = $tupla['dom_cto'];
                $Contacto["correocto"] = $tupla['correo_cto'];
                $Contacto["telcto"] = $tupla['tel_cto'];
                $Contacto["celcto"] = $tupla['cel_cto'];
                $Contacto["cumplecto"] = $tupla['cumple_cto'];
                $Contacto["altacto"] = $tupla['alta_cto'];
                $Contacto["correouser"] = $tupla['correo_user'];

                array_push($respuesta["contactos"], $Contacto);
            }
        }
        else{

            $respuesta["success"] = 404;
            $respuesta["message"] = "No hay registros";    
        }
    }
    else{

        $respuesta["success"] = 400;
        $respuesta["message"] = "Método incorrecto";
    }
    echo json_encode($respuesta);
    include_once("desconecta.php");
?>