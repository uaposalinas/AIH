<?php

    $WorkUserName = $_GET["WorkUserName"];
    $GetANewPass = $_GET["GetANewPass"];

    require "../../../../config/com.server.config.php";

    if (isset($WorkUserName) && isset($GetANewPass)) {
        $WorkUserName = $Connection->real_escape_string($WorkUserName);
        $GetANewPass = $Connection->real_escape_string($GetANewPass);

        $DoUpdate = "UPDATE `authusers` SET `Password`='$GetANewPass' WHERE UserName = '$WorkUserName'";
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

