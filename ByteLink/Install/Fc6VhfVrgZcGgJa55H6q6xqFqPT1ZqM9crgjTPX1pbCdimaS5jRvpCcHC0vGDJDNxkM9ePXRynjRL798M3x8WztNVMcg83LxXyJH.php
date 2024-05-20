<?php

require "com.manifest.php";

$connection = new mysqli("localhost", "root", "", "Projects");
$query = "SELECT BundleCode FROM main";
$results = $connection->query($query);

if (5 == 5) {
    $bundleCodeExists = false;

    while ($row = $results->fetch_assoc()) {
        $getAllBundleCodes = $row["BundleCode"];

        if ($BundleCode == $getAllBundleCodes) {
            $bundleCodeExists = true;
            break;  
        }
    }

    if ($bundleCodeExists) {
        echo "<script>const Actions=['Obteniendo directivas de '+window.location.origin,'Este paquete ya fue instalado, no se necesitan más acciones. Cierra la ventana y ve a '+ window.location.origin + ' para revisar la instalación'];var ActionsLimit=Actions.length-1;for(let ActionsCounter=0;ActionsCounter<=ActionsLimit;ActionsCounter++){setTimeout(()=>{if(ActionsCounter==4){setTimeout(()=>{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[4];CreatedElement.style.color='#FF0000';document.body.append(CreatedElement);},10000);}else{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[ActionsCounter];CreatedElement.style.color='#f7a000';document.body.append(CreatedElement);}},(ActionsCounter+2)*3000);}</script>";
    } else {
        
        $DoSave = "INSERT INTO `main`(`BundleName`, `IdentiferPicture`, `Version`, `DRL`, `BundleCode`) VALUES ('$BundleName','$IdentiferPicture','$BundleVersion', '$URL', '$BundleCode')";

if($connection -> query($DoSave)){

    echo "<script>const Actions=['Obteniendo directivas de '+window.location.origin,'Creando Partición temporal de instalación','Obteniendo punto de restauración','Flaseando DIP en '+window.location.host,'Instalación Finalizada'];var ActionsLimit=Actions.length-1;for(let ActionsCounter=0;ActionsCounter<=ActionsLimit;ActionsCounter++){setTimeout(()=>{if(ActionsCounter==4){setTimeout(()=>{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[4];document.body.append(CreatedElement);setTimeout(()=>{window.postMessage('TRUE','*');window.close();},2500);},10000);}else{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[ActionsCounter];document.body.append(CreatedElement);}},(ActionsCounter+2)*3000);}</script>";

}else{

   echo "<script>const Actions=['Obteniendo directivas de '+window.location.origin,'No se pudo crear la Partición temporal de instalación','No se pudo obtener el punto de restauración','Flaseando DIP en '+window.location.host,'Error en el servicio de instalación'];var ActionsLimit=Actions.length-1;for(let ActionsCounter=0;ActionsCounter<=ActionsLimit;ActionsCounter++){setTimeout(()=>{if(ActionsCounter==4){setTimeout(()=>{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[4];CreatedElement.style.color='#FF0000';document.body.append(CreatedElement);},10000);}else{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[ActionsCounter];CreatedElement.style.color='#f7a000';document.body.append(CreatedElement);}},(ActionsCounter+2)*3000);}</script>";


}

    }
} else {
    echo "<script>const Actions=['Obteniendo directivas de '+window.location.origin,'No se pudo crear la Partición temporal de instalación','No se pudo obtener el punto de restauración','Flaseando DIP en '+window.location.host,'Error en el servicio de instalación'];var ActionsLimit=Actions.length-1;for(let ActionsCounter=0;ActionsCounter<=ActionsLimit;ActionsCounter++){setTimeout(()=>{if(ActionsCounter==4){setTimeout(()=>{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[4];CreatedElement.style.color='#FF0000';document.body.append(CreatedElement);},10000);}else{const CreatedElement=document.createElement('p');CreatedElement.innerHTML=Actions[ActionsCounter];CreatedElement.style.color='#f7a000';document.body.append(CreatedElement);}},(ActionsCounter+2)*3000);}</script>";

}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevLabs Shell</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/10792/10792828.png" type="image/x-icon">
</head>
<body>

    <p>Conectado con https://devlabsco.ga/get/bundles/</p>

    <style>

        body{

            background-color:#000000;
            color:#1ED761;
            font-family:monospace;
            font-size:13px;

        }


    </style>


</body>
</html>