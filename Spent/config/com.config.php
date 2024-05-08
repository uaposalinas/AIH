<?php

   $UserName = "root";
   $ServerName = "localhost";
   $Password = "";
   $DatabaseName = "aihspends";

   # $UserName = "devlabsc_root";
   # $ServerName = "sv18.byethost18.org";
   # $Password = "Dv229011000";
   # $DatabaseName = "devlabsc_aihspends";


   $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);

?>