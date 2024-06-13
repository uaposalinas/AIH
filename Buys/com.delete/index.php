<?php

    require '../config/com.server.config.php';

    if(isset($_GET["GestID"])){

        $GestID = $_GET["GestID"];

        $DeleteNow = "DELETE FROM logs WHERE GestID = '$GestID'";
        $DoDelete = $Connection -> query($DeleteNow);

        if($DoDelete){

            echo "<script> localStorage.setItem('DeleteKey', 'true'); window.close(); </script>";

        }else{

            echo "<script> localStorage.setItem('Deletekey', 'false'); window.close(); </script>";

        }

    }else{

        echo "<script> window.close() </script>";

    }

?>