<?php

    require '../../config/com.server.config.php';
    $Connection->set_charset("utf8");

    if(isset($_POST["Card"])){

         $CardValue = $_POST["Card"];

        $DoSave = "INSERT INTO `cards`(`ID`) VALUES ('$CardValue')";
        $SaveNow = $Connection -> query($DoSave);

        if($SaveNow){

            echo "<script> window.close(); </script>";

        }else{

            echo "Error al registrar";

        }

    }else{

        echo "Acceso denegado.";

    }

?>