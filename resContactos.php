<?php
/*
 * El siguiente recibe un Json con los productos del dispositivo
*  y los inserta en mysql con la finalidad de respaldarlos
*/
    include_once("conecta.php");

    header('Content-type: application/json; charset=utf-8');

    if ($_SERVER['REQUEST_METHOD']== "POST"){

        $response = array();

        $obj = json_decode( file_get_contents('php://input'),true );   
        
        $objArr = (array)$obj;

        if (empty($objArr)){

            $response["success"] = 422;  //No encontro información 
            $response["message"] = "Error: analizar json de entrada";
        }
        else{

            $Contactos = array();

            $corruser= $objArr['correouser'];
            $contuser= $objArr['contrauser'];

            $Contactos= $objArr['contactos'];
            
            foreach ($Contactos as $value){

                $idcto = $value["idCto"];
                $nomcto = $value["nomCto"];
                $domcto = $valu["domCto"];
                $correocto = $value["correoCto"];
                $telcto = $value["telCto"];
                $celcto = $value["celCto"];
                $cumplecto = $value["cumpleCto"];
                $altacto = $value["altaCto"];
                $correouser = $value["correoUser"];
                
                $sentencia = "INSERT INTO contactos(id_cto, nom_cto, dom_cto, correo_cto, tel_cto, cel_cto, cumple_cto, alta_cto, correo_user) VALUES ($idcto, '$nomcto', '$domcto', '$correocto', '$telcto', '$celcto', '$cumplecto', '$altacto', '$correouser')"
                //echo "$sentencia";
                $result = mysqli_query($Cn,$sentencia);

                if ($result){

                    $response["success"] = 200; 
                    $response["message"] = "Se Respaldaron Correctamente";
                }
                else{

                    $response["success"] = 500;  
                    $response["message"] = "Error: No se puedo respaldar los contactos";
                }
            }
        }
    }
    else{

        $respuesta["success"] = 400;
        $respuesta["message"] = "Método incorrecto";
    }

	echo json_encode($response);
    include_once("desconecta.php");
?>
