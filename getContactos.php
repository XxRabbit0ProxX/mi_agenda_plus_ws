<?php
/*
 * El siguiente código consulta todos los productos
*/
    include_once("conecta.php");

    if ($_SERVER['REQUEST_METHOD']== "POST"){

        $sentencia = "SELECT * From contactos ORDER BY correo_user";
        $res = mysqli_query($Cn,$sentencia);

        if (mysqli_num_rows($res)>0){

            $respuesta["success"] = 200;
            $respuesta["message"] = "Registros encontrados";
            $respuesta["contactos"] = array();

            while ($tupla = mysqli_fetch_array($res)){

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