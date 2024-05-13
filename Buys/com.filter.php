<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/com.img/com.icon.png" type="image/x-icon">
    <link rel="stylesheet" href="Fonts/IndexFontsCaviarDreams.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-thin-straight/css/uicons-thin-straight.css'>  
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="Fonts/IndexFontsGlacialIndifference.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">    
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="Vendor/com.css/com.config.css">

    
</head>
<body>
    
    <div class="ViewLogs" style="display:flex">

        <div class="ShowLogs">

        <div class="GridShow">

<?php

if(isset($_GET["Filter"])){

    $FilterParams = $_GET["Filter"];



require 'config/com.config.php';

require 'config/com.config.php';

$Connection->set_charset("utf8");

$DoQuery = "SELECT * FROM logs WHERE Date = '$FilterParams'";
$QueryResults = $Connection -> query($DoQuery);

if($QueryResults -> num_rows > 0){

    while($Row = $QueryResults -> fetch_assoc()){

        $GestID = $Row["GestID"];
        $GetCountableCount = $Row["CountableCount"];
        $GetSaveDay = $Row["SavedDay"];
        $GetFullDate = $Row["FullDate"];
        $SpendedBy = $Row["SpendedBy"];
        $BillID = $Row["BillNumber"];
        $BuyType = $Row["BuyType"];
        $PayType = $Row["PayType"];
        $CardUsed = $Row["CardUsed"];
        $Total = $Row["Total"];
        $Provider = $Row["Provider"];
        $Image = "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.providers/$Provider.png";

        echo "<cont slot='Show' GestID='$GestID' class='ShowInformation ThisLog'>

        <header>
    
            <logo class='ProviderLogo' slot='$Image' style='background-image:url(Assets/com.img/defaults/nologo.png)'></logo>
    
    
            <t class='CountableCountShow' style='font-size:18px; top:17px;'>$GetCountableCount</t>
            <p class='Date' style='font-size:13px;'>$GetSaveDay • $GetFullDate</p>
    
        </header>
    
        <div class='Contents'>
    
            <p>Realizado por: $SpendedBy</p>
            <p>Realizado el: $GetFullDate</p>
            <p>NO. de Factura: $BillID</p>
            <p>Tipo de compra: $BuyType</p>
            <p>Tipo de Pago: $PayType</p>
            <p>Tarjeta usada: $CardUsed</p>
    
            <div class='TotalToShow'>$Total</div>
    
        </div>
    
    </cont>
    ";


    }

}else{

    echo "<NFC style='width:100%; height:100%; position:absolute; display:flex; justify-content:center; align-items:center;text-align:center;color:#FFFFFF; font-family:caviarDreamsBold; font-size:20px;animation:fadeInUp 0.5s'>Hmm... No hay nada por aquí</NFC>";

}

}
?>


        </div>

    </div>


</div>


</body>
</html>