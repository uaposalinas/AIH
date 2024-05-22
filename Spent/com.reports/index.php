<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver reporte mes de Mayo</title>
    <link rel="stylesheet" href="../Vendor/com.css/com.config.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsRoboto.css">
</head>
<body class="ReportsBody Scroll">

    <header>

        <div class="HeaderDecoration"></div>

            <div class="QrCode"></div>


        <div class="LeftZoneHeader">

            <t>Reporte Mensual de Gastos</t>
            <p>Mayo 2024</p>

            <div class="ReportDetails">

                <t2>Detalles del reporte</t2>
                <p2> <b>Fecha de cierre de mes:</b> 31 de Mayo de 2024</p2>
                <p2> <b>ID de reporte:</b> ASC-2024-041001MR</p2>
                <p2> <b>Generado por:</b> Alejandro Salinas</p2>
            </div>

        </div>

    </header>


    <div class="ShowReportsPerMonth">

        <t class="PerMonthsLogTitle" style="width: 10px;">Registros completos del mes de Mayo</t>
        <div class="TitleBorder"></div>

        <div class="Table">

            <div class="Identifers">

                
                <columns>NO.</columns>
                <columns>Proveedor</columns>
                <columns>Fecha</columns>
                <columns>Cantidad</columns>
                <columns>Método de Pago</columns>
                <columns>Cuenta Contable</columns>
                <columns>Tipo de compra</columns>
                <columns>Subtotal</columns>
                <columns>Exento</columns>
                <columns>Otros</columns>
                <columns>ISV 15%</columns>
                <columns>ISV 18%</columns>
                <columns>Total de Gasto</columns>

            </div>

            <div class="Logs">
                
                <?php

                    $Number = 0;

                    require '../config/com.config.php';
                    $Connection -> set_charset("utf8");

                    $DoQuery = "SELECT * FROM logs WHERE 1";
                    $QueryResults = $Connection -> query($DoQuery);

                    if($QueryResults){

                        while($Row = $QueryResults -> fetch_assoc()){

                            $Provider = $Row["Provider"];
                            $Date = $Row["Date"];
                            $Amount = $Row["Amount"];
                            $PayType = $Row["PayType"];
                            $CountableCount = $Row["CountableCount"];
                            $BuyType = $Row["BuyType"];
                            $Subtotal = $Row["Subtotal"];
                            $Exempt = $Row["Exempt"];
                            $OtherISV = $Row["OtherISV"];
                            $ISV15 = $Row["ISV15"];
                            $ISV18 = $Row["ISV18"];
                            $Total = $Row["Total"];
                            $Number++;

                            echo "

                                <div class='ThisRes'>

                                <divs><n>$Number</n></divs>
                                <divs><p>$Provider</p></divs>
                                <divs><p>$Date</p></divs>
                                <divs><p>$Amount</p></divs>
                                <divs><p>$PayType</p></divs>
                                <divs><p>$CountableCount</p></divs>
                                <divs><p>$BuyType</p></divs>
                                <divs><p>$Subtotal</p></divs>
                                <divs><p>$Exempt</p></divs>
                                <divs><p>$OtherISV</p></divs>
                                <divs><p>$ISV15</p></divs>
                                <divs><p>$ISV18</p></divs>
                                <divs><p>$Total</p></divs>
            
                            </div>
                            
                            ";

                        }

                    }else{
                        
                        echo "Ocurrió un error.";

                    }

                ?>
                   
            </div>

        </div>

    </div>

    <div class="ShowAllResults"></div>

    <footer style="display: none;">

        <div class="FooterDecoration"></div>    

    </footer>

</body>

<script src="../Vendor/com.js/com.versions.js"></script>
<script src="../Vendor/com.js/com.reports.js"></script>

</html>