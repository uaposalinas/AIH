<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Reporte</title>
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
    <link rel="stylesheet" href="Vendor/com.css/com.prints.devlabsco.css">
    <link rel="stylesheet" href="Vendor/com.css/com.config.print.css">

</head>
<body>

    <div class="ConfirmArea">

        <div class="Icon"></div>
        <t>Imprimir Reporte <?php  if(isset($_GET["GestID"])){echo $GestID = $_GET["GestID"];"$GestID";} ?></t>

        <div class="PrintRightNow">Imprimir Ahora</div>

    </div>
    
    <div class="PrintArea">

        <div class="QrContainer"></div>
        <div class="BarCodeContainer">

            <svg id="barcode"></svg>

        </div>

        <?php

            if(isset($_GET["GestID"]) && isset($_GET["From"])){

                $GetGestID = $_GET["GestID"];
                $From = $_GET["From"];

            }

            require 'config/com.config.php';

            $Connection->set_charset("utf8");

            $DoQuery = "SELECT * FROM logs WHERE GestID = '$GetGestID'";
            $QueryResults = $Connection -> query($DoQuery);

            if($QueryResults -> num_rows > 0){

                $Row = $QueryResults -> fetch_assoc();

                $Date = $Row["Date"];
                $Provider = $Row["Provider"];
                $PayType = $Row["PayType"];
                $CountableCount = $Row["CountableCount"];
                $BuyType = $Row["BuyType"];
                $BillID = $Row["BillNumber"];
                $Amount = $Row["Amount"];
                $CardUsed = $Row["CardUsed"];
                $SpendedBy = $Row["SpendedBy"];
                $Subtotal = $Row["Subtotal"];
                $ISV18 = $Row["ISV18"];
                $ISV15 = $Row["ISV15"];
                $Exempt = $Row["Exempt"];
                $Total = $Row["Total"];

                echo "

                    <t class='GestIDData'>$GetGestID</t>
                    <t class='Date'>$Date</t>
                    
                    <div class='Provider'>$Provider</div>
                    <div class='PayType'>$PayType</div>
                    <div class='CountableCount'>$CountableCount</div>
                    <div class='BuyType'>$BuyType</div>
                    <div class='BillID'>$BillID</div>
                    <div class='Amount'>$Amount</div>
                    <div class='CardUsed'>$CardUsed</div>
                    <div class='SpendedBy'>$SpendedBy</div>
                    
                    <div class='Subtotal'>L. $Subtotal</div>
                    <div class='ISV18'>$ISV18</div>
                    <div class='ISV15'>$ISV15</div>
                    <div class='Exempt'>$Exempt</div>
                    <div class='Total'>$Total</div>
                    
                    <div class='PrintProcessor'>Procesador de impresion: com.devprint.dpf</div>
                    <div class='PrintDate'>Fecha de impresion: 27 de Abril de 2024</div>
                    <div class='PrintHour'>Hora de impresión: 15:06</div>
                    <div class='PrintFormat'>Formato de impresión: PDF (RAW)</div>
                    <div class='PrintedBy'>Impreso por: $From</div>
                
                
                ";

            }

        ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js" integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Vendor/com.js/com.printer.js" defer></script>
    <script src="Lib/JsBarcode.all.min.js"></script>

    <script>

        const GetGestIDKey2 = window.location.search;
        const FormatGestID2 = GetGestIDKey2.substr(8, 10000000);

        JsBarcode("#barcode", FormatGestID2);

    </script>

</body>
</html>