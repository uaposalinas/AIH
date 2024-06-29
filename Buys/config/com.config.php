<?php

   # $UserName = "root";
   # $ServerName = "localhost";
   # $Password = "";
   # $DatabaseName = "aihbuys";

    $UserName = "devlabsc_root";
    $ServerName = "sv18.byethost18.org";
    $Password = "Dv229011000";
    $DatabaseName = "devlabsc_aihbuys";


   $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);

   echo "<script> console.log('Archivo de conexión iniciado correctamente.') </script>"

?>