<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Producto</title>
    <link rel="stylesheet" href="../../../../CSS/com.main.css">
    <link rel="stylesheet" href="../../../../Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../../../../Fonts/IndexFontsInter.css">
    <link rel="stylesheet" href="../../../../Fonts/IndexFontsRoboto.css">
</head>
<body>
    
<div class="Results001" style="display: flex;">

<div class="PcInformation">

<?php

$ServerName = "localhost";
$UserName = "root";
$ServerPass = "";
$GETtestID = $_GET["testID"];

$Connection = new mysqli($ServerName, $UserName, $ServerPass, "Projects");

$GetResults = "SELECT TestID, Brand, Model, Serial FROM devtestresults WHERE TestID = '$GETtestID'";
$DoConsult = $Connection -> query($GetResults);

if($DoConsult -> num_rows > 0){

    $Row = $DoConsult -> fetch_assoc();

    $TestIDValue = $Row["TestID"];
    $BrandValue = $Row["Brand"];
    $ModelValue = $Row["Model"];
    $SerialValue = $Row["Serial"];



}

?>

    <div class="BrandImage Image"></div>
    <div class="AllInfo"></div>
    <p class="Brand BrandStyles">Marca: Desconocida</p>
    <div class="OtherInfo">

        <div class="Model">Modelo: XXXX</div> <st style="font-size:40px; margin-left:10px; margin-right:10px; color:#9b9b9b">•</st>
        <div class="Serial">Serie: XXXX</div>


    </div>

    <div class="SystemIcon"></div>

</div>

<div class="OtheSystemInformation">

    <p class="OsVersion">Sistema Operativo: Desconocido</p>
    <p class="ProcesorBase">Arquitectura: Procesador desconocido</p>
    <p class="GPUInfo">Controlador de gráficos básico de DevLabs </p>
    <p class="TestID">ID del testeo (Generado por el sistema): 00000000000000</p>


</div>

<div class="LinksBar">

    <bt class="button BackToDetect" style="background-color:#1ED761; position:absolute; left: 30px;">Volver a detectar</bt>
    <bt class="button SaveInfo" style="background-color: #7668AF; position:absolute; right:30px;">Continuar</bt>

</div>

</div>

</body>
</html>