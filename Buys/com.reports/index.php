<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver reporte mes de Junio</title>
    <link rel="shortcut icon" href="Assets/com.img/com.icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Vendor/com.css/com.config.css">
    <link rel="stylesheet" href="../Vendor/com.css/com.reports.print.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsRoboto.css">
</head>
<body class="ReportsBody Scroll">

    <header>

        <div class="HeaderDecoration"></div>

            <div class="QrCode"></div>


        <div class="LeftZoneHeader">

            <t>Reporte Mensual de Compras</t>
            <p>Junio 2024</p>

            <div class="ReportDetails">

                <t2>Detalles del reporte</t2>
                <p2> <b>Fecha de cierre de mes:</b> 30 de Junio de 2024</p2>
                <p2> <b>ID de reporte:</b> ASC-2024-041001MR</p2>
                <p2> <b>Generado por:</b> Alejandro Salinas</p2>
            </div>

        </div>

    </header>


    <div class="ShowReportsPerMonth">

        <t class="PerMonthsLogTitle" style="width: 300px;">Registros completos del mes de Junio</t>
        <div class="TitleBorder"></div>

        <div class="Table">

            <div class="Identifers">

                
                <columns>NO.</columns>
                <columns>Fecha</columns>
                <columns style="137.4px !important">No. de Factura</columns>
                <columns style="width:164.36px">Nombre de Proveedor</columns>
                <columns>Cnt.</columns>
                <columns>Subtotal</columns>
                <columns>Exento</columns>
                <columns>ISV 15%</columns>
                <columns>Total de Compra</columns>
                <columns>Pago</columns>
                <columns>Fin</columns>
            </div>

            <div class="Logs">
                
                <?php

                    $Number = 0;

                    require '../config/com.config.php';
                    $Connection -> set_charset("utf8");

                    if(isset($_GET["MonthID"])){

                        $Month = $_GET["MonthID"];

                    }else{

                        echo "<script> window.location.href = '../' </script>";

                    }

                    $DoQuery = "SELECT * FROM logs WHERE Month = '$Month'";
                    $QueryResults = $Connection -> query($DoQuery);

                    if($QueryResults -> num_rows > 0){

                        while($Row = $QueryResults -> fetch_assoc()){

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
                            $Number++;


                            //FormattedValues 

                            if($PayType == "Efectivo"){

                                $PayType = "Efc";

                            }else if($PayType == "Transferencia"){

                                $PayType = "Trans.";

                            }else if($PayType == "Tarjeta de Crédito"){

                                $PayType = "T/C";

                            }else if($PayType == "Pago en línea"){

                                $PayType = "BDP";

                            }else if($PayType == "Botón de Pago"){

                                $PayType = "BDP";

                            }
                            

                            if($BuyType == "Personal"){

                                $BuyType = "Prs";

                            }else if($BuyType == "Oficina"){

                                $BuyType = "Ofc";

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

                                <divs><n>$Number</n></divs>
                                <divs><p class='MountDate'>$Date</p></divs>
                                <divs><p>$BillNumber</p></divs>
                                <divs><p>$Provider</p></divs>           
                                <divs><p>$Amount</p></divs>
                                <divs><p class='Subtotals'>$Subtotal</p></divs>
                                <divs><p class='Exempts'>$Exempt</p></divs>
                                <divs><p class='ISV15'>$ISV15</p></divs>
                                <divs><p class='Totals'>$Total</p></divs>
                                <divs><p>$PayType</p></divs>
                                <divs><p>$BuyType</p></divs>
                                
                             
                                
            
                            </div>
                            
                            ";

                        }

                    }else{
                        
                        echo "<script> try {window.close(); localStorage.setItem('NoLogKey', 'true') } catch (error) {window.location.href = '../';} </script>";


                    }

                ?>
                   
            </div>

        </div>

    </div>

    <div class="ShowAllResults">

    
     <t class="PerMonthsLogTitle" style="width: 10000px; top:20px;">Totalizaciones mes de Junio</t>
        <div class="TitleBorder2"></div>

        <div class="Totalizate">

            <div class="Identifers">

                    <columns>Subtotal</columns>
                    <columns>ISV 15%</columns>
                    <columns>Total de Registros</columns>

            </div>

        <div class="Scapes">

        <!--Exentos-->

        <?php

            require '../config/com.config.php';

            if(isset($_GET["MonthID"])){

                $Month = $_GET["MonthID"];

            }else{

                echo "<script> window.location.href = '../' </script>";

            }


            $DoQuery = "SELECT Exempt FROM logs WHERE Month = '$Month'";

            $QueryResults = $Connection->query($DoQuery);

            $ExemptAdd = 0;

            if ($QueryResults->num_rows > 0) {
                
                while($row = $QueryResults->fetch_assoc()) {
                
                    $ExemptAdd += floatval($row["Exempt"]);
                }
                
                echo "<res class='ScapeExempt'>498749.57</res>";

            } else {

                echo "<res class='ScapeExempt'>498749.57</res>";

            }

            $Connection->close();

            ?>

            <!--Exentos-->


            <!--ISV 15-->

            <?php

                require '../config/com.config.php';

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
                    
                    echo "<res class='ScapeISV15'>62846.18</res>";

                } else {

                    echo "<res class='ScapeISV15'>62846.18</res>";

                }

                $Connection->close();

                ?>

            <!--ISV15-->


            <!--ISV 18-->

        

            <!--ISV18-->

            <!--OtherISV-->

         

            <?php

            require '../config/com.config.php';

            if(isset($_GET["MonthID"])){

                $Month = $_GET["MonthID"];

            }else{

                echo "<script> window.location.href = '../' </script>";

            }


            $DoQuery = "SELECT Total FROM logs WHERE Month = '$Month'";

            $QueryResults = $Connection->query($DoQuery);

            $TotalAdd = 0;

            if ($QueryResults->num_rows > 0) {
                
                while($row = $QueryResults->fetch_assoc()) {
                
                    $TotalAdd += floatval($row["Total"]);
                }
                
                echo "<res class='ScapeTotal'>561596</res>";

            } else {

                echo "<res class='ScapeTotal'>561596</res>";

            }

            $Connection->close();
            ?>
        </div>

        </div>
                    
    </div>

    <div class="ShowReportsPerMonth ShowExempts" style="display:none">

        <t class="PerMonthsLogTitle" style="width: 10px;">Registros exentos del mes de Junio</t>
        <div class="TitleBorder"></div>

        <div class="Table" style="position:relative; left:calc(50% - 37%)">

            <div class="Identifers">

                
                <columns>NO.</columns>
                <columns>Fecha</columns>
                <columns style="137.4px !important">No. de Factura</columns>
                <columns style="width:164.36px">Nombre de Proveedor</columns>
                <columns>Cnt.</columns>
                <columns>Cuenta Cont.</columns>
                <columns>Subtotal</columns>
                <columns>Exento</columns>
                <columns>Total de Compra</columns>
                <columns>Pago</columns>
                <columns>Fin</columns>
            </div>

            <div class="Logs">
                
            <?php

$Number = 0;

require '../config/com.config.php';
$Connection -> set_charset("utf8");

if(isset($_GET["MonthID"])) {

    $Month = $_GET["MonthID"];

} else {

    echo "<script> try {window.close();} catch (error) {window.location.href = '../';} </script>";
    exit;

}

// Modificar la consulta para convertir y ordenar por fecha
$DoQuery = "SELECT * FROM `logs` WHERE Month = '$Month' ORDER BY Date ASC";
$QueryResults = $Connection -> query($DoQuery);

if($QueryResults -> num_rows > 0) {

    while($Row = $QueryResults -> fetch_assoc()) {

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

        // Formateando valores
        switch ($PayType) {
            case "Efectivo":
                $PayType = "Efc";
                break;
            case "Transferencia":
                $PayType = "Trans.";
                break;
            case "Tarjeta de Crédito":
                $PayType = "T/C";
                break;
            case "Pago en línea":
                $PayType = "Online";
                break;
            case "Botón de Pago":
                $PayType = "BDP";
                break;
        }

        switch ($BuyType) {
            case "Personal":
                $BuyType = "Prs";
                break;
            case "Oficina":
                $BuyType = "Ofc";
                break;
        }

        $AmountInt = floatval($Amount);

        if($Amount < 10){
            $Amount = '0'. $Amount;
        }

        if ($OtherISV === '') {
            $OtherISV = "L 0.00";
        }

        if($Exempt == "0.00"){
            // No hacer nada si el Exempt es 0.00
        } else {
            $Number++;
            echo "
                <div class='ThisRes ThisResExempts'>
                    <divs><n>$Number</n></divs>
                    <divs><p class='MountDate'>$Date</p></divs>
                    <divs><p>$BillNumber</p></divs>
                    <divs><p>$Provider</p></divs>
                    <divs><p>$Amount</p></divs>
                    <divs><p>$CountableCount</p></divs>
                    <divs><p class='Subtotals'>$Subtotal</p></divs>
                    <divs><p class='ExemptsNow'>$Exempt</p></divs>
                    <divs><p class='Totals GetExentTotals'>$Exempt</p></divs>
                    <divs><p>$PayType</p></divs>
                    <divs><p>$BuyType</p></divs>
                </div>
            ";
        }

    }

} else {
    echo "<script> try {window.close();} catch (error) {window.location.href = '../';} </script>";
}

?>

                   
            </div>

        </div>

    </div>
    
    <div class="ShowAllResults" style="display:none">

    
<t class="PerMonthsLogTitle" style="width: 10000px;">Totalizaciones exentos mes de Junio</t>
   <div class="TitleBorder2"></div>

   <div class="Totalizate" style="width:300px; top:70px; left:20px;">

       <div class="Identifers">

               <columns>Exentos</columns>
               <columns>Total de Registros</columns>

       </div>

   <div class="Scapes">

   <!--Exentos-->

   <?php

       require '../config/com.config.php';

       if(isset($_GET["MonthID"])){

        $Month = $_GET["MonthID"];

    }else{

        echo "<script> window.location.href = '../' </script>";

    }


       $DoQuery = "SELECT Exempt FROM logs WHERE Month = '$Month'";

       $QueryResults = $Connection->query($DoQuery);

       $ExemptAdd = 0;

       if ($QueryResults->num_rows > 0) {
           
           while($row = $QueryResults->fetch_assoc()) {
           
               $ExemptAdd += floatval($row["Exempt"]);
           }
           
           echo "<res class='ScapeExempts'>$ExemptAdd</res>";
           echo "<res class='ScapeExemptS'>$ExemptAdd</res>";

       } else {

           echo "<res class='ScapeExempts'>$ExemptAdd</res>";

       }

       $Connection->close();

       ?>

       <!--Exentos-->

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
