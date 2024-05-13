<?php

    require '../../config/com.config.php';

    if(isset($_POST["Provider"])){

         $ProviderValue = $_POST["Provider"];

        $DoSave = "INSERT INTO `providers`(`Provider`) VALUES ('$ProviderValue')";
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