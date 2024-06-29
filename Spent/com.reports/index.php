<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver reporte mes de Mayo</title>
    <link rel="shortcut icon" href="Assets/com.img/com.icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Vendor/com.css/com.config.css">
    <link rel="stylesheet" href="../Vendor/com.css/com.reports.print.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsRoboto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="ReportsBody Scroll">

    <header>

        <div class="LeftZoneHeader">

            <t class="ReportTitle">Reporte Mensual de gastos Variables del Mes de

            <?php

                $Month = $_GET["MonthID"];
                
                if($Month == "01"){
                    echo "Enero";   
                } else if($Month == "02"){
                    echo "Febrero";   
                } else if($Month == "03"){
                    echo "Marzo";   
                } else if($Month == "04"){
                    echo "Abril";   
                } else if($Month == "05"){
                    echo "Mayo";   
                } else if($Month == "06"){
                    echo "Junio";   
                } else if($Month == "07"){
                    echo "Julio";   
                } else if($Month == "08"){
                    echo "Agosto";   
                } else if($Month == "09"){
                    echo "Septiembre";   
                } else if($Month == "10"){
                    echo "Octubre";   
                } else if($Month == "11"){
                    echo "Noviembre";   
                } else if($Month == "12"){
                    echo "Diciembre";   
                } else {
                    echo "Mes no válido";
                }
                ?>
    


            </t>

         
        </div>

    </header>


    <div class="ShowReportsPerMonth" style="top:30px;">

        <div class="Table ThisTableToPrint">

            <div class="Identifers">

                <columns>No.</columns>
                <columns>Fecha</columns>
                <columns>No de Factura</columns>
                <columns>Proveedor</columns>
                <columns>Cant</columns>
                <columns>Cuenta Cont.</columns>
                <columns>Subtotal</columns>
                <columns>Exento</columns>
                <columns>ISV 15%</columns>
                <columns>ISv 18%</columns>
                <columns>Otros Impuestos</columns>
                <columns>Total</columns>
                <columns>Pago</columns>
                <columns>Fin</columns>

            </div>

            <div class="Logs">
    <?php
    $Number = 1;
    require '../config/com.server.config.php';
    $Connection->set_charset("utf8");

    if(isset($_GET["MonthID"])){
        $Month = $_GET["MonthID"];
    } else {
        echo "<script> window.location.href = '../' </script>";
    }

    $DoQuery = "SELECT * FROM logs WHERE Month = '$Month' AND IsExempt = 'false' ORDER BY Date ASC";
    $QueryResults = $Connection->query($DoQuery);

    if($QueryResults->num_rows > 0){
        while($Row = $QueryResults->fetch_assoc()){
            $Provider = $Row["Provider"];
            $Date = $Row["Date"];
            $Amount = $Row["Amount"];
            $PayType = $Row["PayType"];
            $BillNumber = $Row["BillNumber"];
            $CountableCount = $Row["CountableCount"];
            $BuyType = $Row["BuyType"];
            $Subtotal = $Row["Subtotal"];
            $Exempt = $Row["Exempt"];
            $OtherISV = $Row["OtherISV"];
            $ISV15 = $Row["ISV15"];
            $ISV18 = $Row["ISV18"];
            $Total = $Row["Total"];
            $IsExempt = $Row["IsExempt"];

            // FormattedValues
            if($PayType == "Efectivo"){
                $PayType = "EFC";
            } else if($PayType == "Transferencia"){
                $PayType = "TRANS";
            } else if($PayType == "Tarjeta de Crédito"){
                $PayType = "T/C";
            } else if($PayType == "Pago en línea" || $PayType == "Botón de Pago"){
                $PayType = "BDP";
            }

            if($BuyType == "Personal"){
                $BuyType = "PRS";
            } else if($BuyType == "Oficina"){
                $BuyType = "OFC";
            }

            $AmountInt = floatval($Amount);

            if($Amount < 10){
                $Amount = '0'. $Amount;
            }

            if ($OtherISV === '') {
                $OtherISV = "L 0.00";
            }

                echo "
                <div class='ThisRes'>
                    <divs class='ThisNone'><p>$Number</p></divs>
                    <divs><p class='MountDate'>$Date</p></divs>
                    <divs><p>$BillNumber</p></divs>
                    <divs><p>$Provider</p></divs>
                    <divs><p>$Amount</p></divs>
                    <divs class='ThisCount'><p>$CountableCount</p></divs>
                    <divs><p class='Subtotals'>$Subtotal</p></divs>
                    <divs><p class='Exempts'>$Exempt</p></divs>
                    <divs><p class='ISV15'>$ISV15</p></divs>
                    <divs><p class='ISV18'>$ISV18</p></divs>
                    <divs><p class='Others'>$OtherISV</p></divs>
                    <divs><p class='Totals'>$Total</p></divs>
                    <divs class='ThisPayType'><p>$PayType</p></divs>
                    <divs class='ThisBuyType'><p>$BuyType</p></divs>
                </div>
                ";
                $Number++;

            

        }
    } else {
        echo "<script> try {window.close(); localStorage.setItem('NoLogKey', 'true') } catch (error) {window.location.href = '../';} </script>";
    }
    ?>
</div>


        </div>

    </div>

    <div class="ShowAllResults">

    
     <t class="PerMonthsLogTitle" style="width: 10000px;"> </t>

        <div class="Totalizate">

            <div class="Identifers">

                    <columns>Subtotal</columns>
                    <columns>ISV 15%</columns>
                    <columns>ISV 18%</columns>
                    <columns>Otros Impuestos</columns>
                    <columns>Total de Registros</columns>

            </div>

        <div class="Scapes">

        <res class='ScapeISV15'>L 277,490.587</res>

        <!--Exentos-->

                 <!--Exentos-->


            <!--ISV 15-->

            <?php

                require '../config/com.server.config.php';

                if(isset($_GET["MonthID"])){

                    $Month = $_GET["MonthID"];

                }else{

                    echo "<script> window.location.href = '../' </script>";

                }


                $DoQuery = "SELECT ISV15 FROM logs WHERE Month = '$Month'";

                $QueryResults = $Connection->query($DoQuery);

                $ISV15Add = 0;

                if ($QueryResults->num_rows > 0) {
                    
                    while($row = $QueryResults->fetch_assoc()) {
                    
                        $ISV15Add += floatval($row["ISV15"]);
                    }
                    
                    echo "<res class='ScapeISV15'>$ISV15Add</res>";

                } else {

                    echo "<res class='ScapeISV15'>$ISV15Add</res>";

                }

                $Connection->close();

                ?>

            <!--ISV15-->


            <!--ISV 18-->

                <?php

                    require '../config/com.server.config.php';

                    if(isset($_GET["MonthID"])){

                        $Month = $_GET["MonthID"];

                    }else{

                        echo "<script> window.location.href = '../' </script>";

                    }


                    $DoQuery = "SELECT ISV18 FROM logs WHERE Month = '$Month'";

                    $QueryResults = $Connection->query($DoQuery);

                    $ISV18Add = 0;

                    if ($QueryResults->num_rows > 0) {
                        
                        while($row = $QueryResults->fetch_assoc()) {
                        
                            $ISV18Add += floatval($row["ISV18"]);
                        }
                        
                        echo "<res class='ScapeISV18'>$ISV18Add</res>";

                    } else {

                        echo "<res class='ScapeISV18'>$ISV18Add</res>";

                    }

                    $Connection->close();

                    ?>

            <!--ISV18-->

            <!--OtherISV-->

            <?php

                require '../config/com.server.config.php';

                if(isset($_GET["MonthID"])){

                    $Month = $_GET["MonthID"];

                }else{

                    echo "<script> window.location.href = '../' </script>";

                }


                $DoQuery = "SELECT OtherISV FROM logs WHERE Month = '$Month'";

                $QueryResults = $Connection->query($DoQuery);

                $OtherISVAdd = 0;

                if ($QueryResults->num_rows > 0) {
                    
                    while($row = $QueryResults->fetch_assoc()) {
                    
                        $OtherISVAdd += floatval($row["OtherISV"]);
                    }
                    
                    echo "<res class='ScapeOtherISV'>$OtherISVAdd</res>";

                } else {

                    echo "<res class='ScapeOtherISV'>0</res>";

                }

                $Connection->close();

        ?>

        <!--OtherISV-->

            <?php

            require '../config/com.server.config.php';

            if(isset($_GET["MonthID"])){

                $Month = $_GET["MonthID"];

            }else{

                echo "<script> window.location.href = '../' </script>";

            }


            $DoQuery = "SELECT Total, Exempt, IsExempt FROM logs WHERE Month = '$Month' AND IsExempt = 'false'";

            $QueryResults = $Connection->query($DoQuery);

            $TotalAdd = 0;

            if ($QueryResults-> num_rows > 0) {
                
                while($row = $QueryResults->fetch_assoc()) {

                        $TotalAdd += floatval($row["Total"]);                        
                
                }
                
                echo "<res class='ScapeTotal'>$TotalAdd</res>";

            } else {

                echo "<res class='ScapeTotal'>$TotalAdd</res>";

            }

            $Connection->close();
            ?>
        </div>

        </div>
                    
    </div>


    <footer style="display: none;">

        <div class="FooterDecoration"></div>    

    </footer>

</body>


</html>

<script>
        const files = [
            "../Vendor/com.js/com.versions.js",
            "../Vendor/com.js/com.reports.js",
            "../Vendor/com.js/com.format.config.js",
            "../Vendor/com.js/com.totalizate.js"


        ];

        files.forEach(file => {
            const script = document.createElement("script");
            script.src = `${file}?v=${Math.random() * Math.random() * Math.random()}`;
            document.body.appendChild(script);
        });
    </script>
