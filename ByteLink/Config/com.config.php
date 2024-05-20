<?php

//Archivo de Configuración y Conexión con la base de datos

$ServerName = "localhost";
$GrantedAccessName = "root";
$SessionAccess = "";


//Bases de Datos disponibles para "localhost"

$People = "localhost";
$Projects = "Projects";


//Tablas disponobles para "localhost"

$DevTestResults = "DevTestResults";
$Users = "Users";

//Conexión a la base de datos para futuras consultas;
//NOTA: Si falta una base de datos el Servidor rechazará la conexión.

$PeopleConnection = new mysqli($ServerName, $GrantedAccessName, $SessionAccess, $People);
$DevTestConnection = new mysqli($ServerName, $GrantedAccessName, $SessionAccess, $Projects);


if ($PeopleConnection->connect_error || $DevTestConnection -> connect_error) {
    echo "<script>alert('error en la conexion')</script>";
} else {
    echo "<script>console.log('Conexión establecida con el servidor.')</script>";
}


?>