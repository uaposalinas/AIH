<?php

    $WorkUserName = $_GET["WorkUserName"];
    $GetANewPass = $_GET["GetANewPass"];

    require "../../../../config/com.config.php";

    if (isset($WorkUserName) && isset($GetANewPass)) {
        $WorkUserName = $Connection->real_escape_string($WorkUserName);
        $GetANewPass = $Connection->real_escape_string($GetANewPass);

        $DoUpdate = "UPDATE `authusers` SET `Password`='229011000' WHERE UserName = '$WorkUserName'";
        $QueryResults = $Connection->query($DoUpdate);

        if ($QueryResults === TRUE) {
         
            echo "<script> window.location.href = '../../../../' </script>";

        } else {
            echo "Error: " . $Connection->error;
        }
    } else {
        echo "Error: Datos incompletos.";
    }

?>

