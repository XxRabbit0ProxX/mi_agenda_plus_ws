<?php
    // Activamos todas las notificaciones de error posibles
    error_reporting (E_ALL);
 
    // Definimos el tratamiento de errores no controlados
    set_error_handler(function () 
    {

        throw new Exception("Error");
    });

    $respuesta = array();
    try {

        $Cn = mysqli_connect("localhost", "root", "", "android");
    } catch (mysqli_sql_exception $e) {

        $respuesta["success"] = 500;
        $respuesta["message"] = "Error Interno Servidor de Bases de Datos: $e";
        
        echo json_encode($respuesta);
        die("");
    }
    
    mysqli_set_charset($Cn,"utf8");
?>