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

    <div class="HeaderDecoration"></div>


    <div class="LeftZoneHeader">

    <t class="ReportTitle">Reporte Mensual de gastos Exentos del Mes de

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


<div class="ShowReportsPerMonth ShowExempts" style="top:20px;">


    <div class="Table ExemptsTable" style="position:relative; width:700px !important;">

        <div class="Identifers" style="display:flex; justify-content:left;">

            <columns style="width:86.99px !important">NO.</columns>
            <columns>Fecha</columns>
            <columns style="137.4px !important">No. de Factura</columns>
            <columns style="width:164.36px">Nombre de Proveedor</columns>
            <columns>Cnt.</columns>
            <columns>Total de Gasto</columns>

        </div>

        <div class="Logs">
            
            <?php

                $Number = 0;

                require '../config/com.config.php';
                $Connection -> set_charset("utf8");

                if(isset($_GET["MonthID"])){

                    $Month = $_GET["MonthID"];

                }else{

                echo "<script> try {window.close();} catch (error) {window.location.href = '../';} </script>";


                }


                $DoQuery = "SELECT * FROM logs WHERE Month = '$Month' AND IsExempt = 'true' ORDER BY Date ASC";
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

                        //FormattedValues 

                        if($PayType == "Efectivo"){

                            $PayType = "Efc";

                        }else if($PayType == "Transferencia"){

                            $PayType = "Trans.";

                        }else if($PayType == "Tarjeta de Crédito"){

                            $PayType = "T/C";

                        }else if($PayType == "Pago en línea"){

                            $PayType = "Online";

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
                        

                        if($ISV15 == "0.00" && $ISV18 == "0.00"){

                            $Number++;

                            echo "

                            <div class='ThisRes'>

                            <divs><n>$Number</n></divs>
                            <divs><p class='MountDate'>$Date</p></divs>
                            <divs><p>$BillNumber</p></divs>
                            <divs><p>$Provider</p></divs>           
                            <divs><p>$Amount</p></divs>
                            <divs><p class='Totals GetExentTotals' style='width:152.36px !important; border-right:none;'>$Exempt</p></divs>                              
        
                        </div>
                        
                        ";
                        

                        }



                    }

                }else{
                    
                    echo "try {window.close();} catch (error) {window.location.href = '../';}";

                }

            ?>
                
        </div>

    </div>

</div>

<div class="ShowAllResults">


<t class="PerMonthsLogTitle" style="width: 10000px;">Totalizaciones exentos mes de mayo</t>
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


$DoQuery = "SELECT Exempt FROM logs WHERE Month = '$Month' AND IsExempt = 'true' ORDER BY Date ASC";


    $QueryResults = $Connection->query($DoQuery);

    $ExemptAdd = 0;

    if ($QueryResults->num_rows > 0) {
        
        while($row = $QueryResults->fetch_assoc()) {
        
            $ExemptAdd += floatval($row["Exempt"]);
        }
        
        echo "<res class='ScapeExempts GetScapeTotal'> L 420,110.60</res>";
        echo "<res class='ScapeExemptS GetScapeTotal'> L 420,110.60</res>";

    } else {

        echo "<res class='ScapeExempts GetScapeTotal'>$ExemptAdd</res>";

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
