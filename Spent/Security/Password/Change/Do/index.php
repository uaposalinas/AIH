<?php
    $UserName = $_POST["WorkUserName"];
    $GetANewPass = $_POST["GetANewPass"];

    require "../../../../config/com.config.php";

    if (isset($UserName) && isset($GetANewPass)) {
        // Escapar las variables para evitar inyección SQL
        $UserName = $Connection->real_escape_string($UserName);
        $GetANewPass = $Connection->real_escape_string($GetANewPass);

        $DoUpdate = "UPDATE `authusers` SET `Password`='229011000' WHERE UserName = '$UserName'";
        $QueryResults = $Connection->query($DoUpdate);

        if ($QueryResults === TRUE) {
            echo "$UserName, y $GetANewPass";
        } else {
            echo "Error: " . $Connection->error;
        }
    } else {
        echo "Error: Datos incompletos.";
    }
?>
