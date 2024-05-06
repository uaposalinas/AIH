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

    
        <script>
    
            const LocationFile = "Vendor/com.css/com.config.css";
    
            const NewStyles = document.createElement('link');
            NewStyles.rel = "stylesheet";
            NewStyles.type = "text/css";
            NewStyles.href = LocationFile+"?v"+Math.random();
            document.head.appendChild(NewStyles);
    
        </script>
    
        <title>AIH's Expenses</title>
    </head>
<body style="overflow: hidden;">
    
    <?php

        header('Content-Type: text/html; charset=utf-8');

        require 'config/com.config.php';

        $GestID = $_GET["GestID"];

        $DoQuery = "SELECT Date, Provider, SpendedBy, PayType, CardUsed, CountableCount, BuyType, BillDescription, BillNumber, Amount, Subtotal, Exempt, ISV18, ISV15, OtherISV, Total FROM logs WHERE GestID = '$GestID'";
        $QueryResults = $Connection -> query($DoQuery);

        if($QueryResults){

            $Row = $QueryResults -> fetch_assoc();

            $Date = $Row["Date"];
            $Provider = $Row["Provider"];
            $SpendedBy = $Row["SpendedBy"];
            $PayType = $Row["PayType"];
            $CardUsed = $Row["CardUsed"];
            $CountableCount = $Row["CountableCount"];
            $BuyType = $Row["BuyType"];
            $BillDescription = $Row["BillDescription"];
            $BillNumber = $Row["BillNumber"];
            $Amount = $Row["Amount"];
            $Subtotal = $Row["Subtotal"];
            $Exempt = $Row["Exempt"];
            $ISV18 = $Row["ISV18"];
            $ISV15 = $Row["ISV15"];
            $OtherISV = $Row["OtherISV"];
            $Total = $Row["Total"];
            $Image = "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.providers/$Provider.png";

            
            echo "
            
            <div class='DisplaySelected' style='display:flex;'>

            <header style='height:105px; top:25px;'>
            
                <div class='Path'>
            
                    <div class='Icon' style='background-image:url(Assets/com.img/report.png); position:absolute; left:15px;top:-8px; width:45px; height:45px;'></div>
                    <t class='Position'>
            
                        <p class='Identifer'>AIH</p>
                        <i class='fi fi-br-angle-small-right'></i>
                        <p class='Identifer'>Sistema de gastos</p>
                        <i class='fi fi-br-angle-small-right'></i>
                        <p class='Identifer'>Detalles del Gasto</p>
            
                    </t>
            
            
                </div>
            
                <div class='ReportButtons'>
            
                    <div class='ShareReport tooltip' data-text='Compartir reporte'> <i class='fi fi-rr-send-money'></i></div>
                    <div class='PrintReport tooltip' data-text='Imprimir Reporte'><i class='fi fi-rr-print'></i></div>
            
                </div>
            
            </header>
            
            <div class='Content'>
            
                <div class='DetailsHeader'>
            
                    <div class='ProviderDetails'>
            
                        <div class='Logo' slot='$Image'></div>
                        <div class='ProviderName'>Gasto realizado en $Provider</div>
                        <div class='SpentType'>$CountableCount</div>
                        <div class='PaidDetail'>Pagado con:</div>
                        <div class='PaidResult tooltip' data-text='Botón de Pago'></div>
            
                    </div>
                    
                    <div class='EnterpriseLogo'></div>
            
                </div>
            
                
                <div class='TransactionDetails'>
            
                    <t>Detalles de la transacción</t>
            
                        <div class='Row'>
            
                            <div class='GestID' style='width:300px;'>ID : $GestID</div>
                            <div class='Date'>Fecha: $Date</div>
                            <div class='Provider'>Proveedor: $Provider</div>
                            <div class='SpentedBy' style='width:360px;'>Gastado por: $SpendedBy</div>
            
                        </div>
                        <div class='Row'>
            
                            <div class='PayType' style='width:270px;'>Tipo de pago: $PayType</div>
                            <div class='PayUsed'>Tarjeta usada: $CardUsed</div>
                            <div class='CountableCount' style='width:270px'>Cuenta Contable: $CountableCount</div>
                            <div class='BuyType'>Tipo de compra: $BuyType</div>
            
                        </div>
                        <div class='Row Price Exents' style='margin-top:20px; height:80px; position:relative; '>
                    
                            <div style='width:385px; display:flex; justify-content:left; padding-left:15px; bottom:0px; position:relative '> 
                            <label for='1' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Descripción del gasto:</label>
                            $BillDescription
                            </div>
        
        
                            <div style='width:385px; display:flex; justify-content:left; padding-left:15px; bottom:0px; position:relative'>
                            <label for='2' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>NO. de Factura: </label>
                            $BillNumber</div>
        
        
                            <div style='width:105px; bottom:0px; position:relative'>
                            <label for='3' style='color:#9b9b9b; font-family: GI; position:absolute; left:18px; top:-25px;'>Cantidad</label>
        
                            $Amount</div>
        
                            <div style='width:215px; display:flex; justify-content:left; padding-left:15px; bottom:0px; position:relative'>
                            <label for='4' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Exento</label>
                            $Exempt</div>
            
            
                        </div>


                        <div class='Row Price Exents' style='margin-top:20px; height:80px; position:relative; display:flex; justify-content:left; padding-left:30px;'>
                    
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='1' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Subtotal</label>
                            L. $Subtotal</div>
        
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='2' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px;top:-25px;'>Otros Impuestos</label>
                            $OtherISV</div>
        
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='3' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>ISV 18%</label>
                            $ISV18</div>
        
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='4' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>ISV 15%</label>
                            $ISV15</div>
            
            
                        </div>
            
                        <div class='Result' style='font-size:28px'>$Total</div>
            
                </div>
            
            
            </div>
            
        </div>
        

            ";


        }else{

            echo "!!ERROR!!";

        }

    ?>

</body>

<script src="Vendor/com.js/com.show.js"></script>

</html>