<?php

    $UserName = "root";
    $ServerName = "localhost";
    $Password = "";
    $DatabaseName = "aihspends";

   $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);

   echo "<script> console.log('Archivo de conexión iniciado correctamente.') </script>";;

?>