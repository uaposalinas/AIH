<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte mensual de gastos exentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: auto;
            border-collapse: collapse;
            margin: 20px auto;
            border: 0.5px solid black;
        }
        table, th, td {
            border: 0.5px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #85c6fe;
        }
        td.provider {
            width: 180px;
            text-align:left;
        }
        td.exempt {
            width: 40px;
            text-align: right; 
        }
        td.subtotal, td.total, td.isv15, td.isv18, td.otherisv {
            text-align: right; 
        }
        td.description {
            max-width: 200px; 
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer; 
            text-decoration: none; 
        }
        h1 {
            text-align: center;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            overflow-wrap: break-word; 
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<?php
if (isset($_GET["MonthID"])) {
    $MonthID = $_GET["MonthID"];
    $monthNames = [
        "01" => "ENERO",
        "02" => "FEBRERO",
        "03" => "MARZO",
        "04" => "ABRIL",
        "05" => "MAYO",
        "06" => "JUNIO",
        "07" => "JULIO",
        "08" => "AGOSTO",
        "09" => "SEPTIEMBRE",
        "10" => "OCTUBRE",
        "11" => "NOVIEMBRE",
        "12" => "DICIEMBRE"
    ];

    $monthName = isset($monthNames[$MonthID]) ? $monthNames[$MonthID] : "";
    echo "<h1>REPORTE DE GASTOS EXENTOS MES DE $monthName</h1>";
}
?>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Fecha</th>
            <th>No. de Factura</th>
            <th>Proveedor</th>
            <th>Cant.</th>
            <th class="no-print">Cuenta Cont.</th>
            <th>Exento</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th class="no-print">Tipo</th>
            <th class="no-print">Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $servername = "sv18.byethost18.org";
        $username = "devlabsc_root";
        $password = "Dv229011000";
        $dbname = "devlabsc_aihspends"; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        $conn->set_charset("utf8");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_GET["MonthID"])){
            $MonthID = $_GET["MonthID"];
        }

        $sql = "SELECT Date, BillNumber, Provider, Amount, CountableCount, Subtotal, Exempt, ISV15, OtherISV, Total, PayType, BuyType, BillDescription FROM logs WHERE Month = '$MonthID' AND IsExempt = 'true' ORDER BY Date ASC ";
        $result = $conn->query($sql);

        function formatCurrency($number) {
            if (is_numeric($number)) {
                return 'L ' . number_format((float)$number, 2, '.', ',');
            }
            return $number;
        }

        function formatDate($date) {
            $timestamp = strtotime($date);
            return date('d/m/Y', $timestamp);
        }

        function abreviatePay($type) {
            switch ($type) {
                case 'Tarjeta de Crédito':
                    return 'T/C';
                case 'Transferencia':
                    return 'Trans';
                case 'Boton de pago':
                    return 'BDP';
                case 'Efectivo':
                    return 'EFC';
                case 'Pago en línea':
                    return 'BDP';
                default:
                    return $type;
            }
        }

        $totalExempt = 0;
        $totalSubtotal = 0;
        $totalAmount = 0;

        if ($result->num_rows > 0) {
            $number = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $number . "</td>";
                echo "<td>" . formatDate($row["Date"]) . "</td>";
                echo "<td>" . $row["BillNumber"] . "</td>";
                echo "<td class='provider'>" . $row["Provider"] . "</td>";
                echo "<td>" . $row["Amount"] . "</td>";
                echo "<td class='no-print'>" . $row["CountableCount"] . "</td>";
                echo "<td class='exempt'>" . formatCurrency($row["Exempt"]) . "</td>";
                echo "<td class='subtotal'>" . formatCurrency($row["Subtotal"]) . "</td>";
                echo "<td class='total'>" . formatCurrency($row["Total"]) . "</td>";
                echo "<td class='no-print'>" . abreviatePay($row["PayType"]) . "</td>";
                echo "<td class='no-print'>" . $row["BuyType"] . "</td>";
                echo "</tr>";

                $totalExempt += $row["Exempt"];
                $totalSubtotal += $row["Subtotal"];
                $totalAmount += $row["Total"];

                $number++;
            }
        } else {
            echo "<tr><td colspan='15'>No results found</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<table style="width:68%">
    <thead>
        <tr>
            <th>Total Exento</th>
            <th>Total Subtotal</th>
            <th>Total General</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo formatCurrency($totalExempt); ?></td>
            <td><?php echo formatCurrency($totalSubtotal); ?></td>
            <td><?php echo formatCurrency($totalAmount); ?></td>
        </tr>
    </tbody>
</table>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modalDescription"></p>
    </div>
</div>

<script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    function openModal(description) {
        var modalDescription = document.getElementById("modalDescription");
        modalDescription.textContent = description;
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>

</body>
</html>
