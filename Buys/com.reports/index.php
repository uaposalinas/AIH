<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte mensual de compras</title>
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
        }
        td.exempt {
            width: 40px;
            text-align: right; 
        }
        td.subtotal, td.total, td.isv15, td.otherisv {
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

        #modalItemsTable {
            width: calc(100% - 30px);
            margin: 0 15px; 
        }

        @media print{
            .no-print{
                display:none !important;
            }
        }

        button{

            width:120px;
            height:40px;
            background-color:#85c6fe;
            border:1px #9b9b9b;
            border-radius:20px;
            cursor: pointer;

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
        "12" => "DICIEMBRE";
    ];

    $monthName = isset($monthNames[$MonthID]) ? $monthNames[$MonthID] : "";
    echo "<h1>REPORTE DE COMPRAS MES DE $monthName</h1>";
}
?>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Fecha</th>
                <th>No. de Factura</th>
                <th>Proveedor</th>
                <th class="no-print">Productos</th>
                <th>Subtotal</th>
                <th>Exento</th>
                <th>ISV 15%</th>
                <th>Otros Imp.</th>
                <th>Total</th>
                <th class="no-print">Pago</th>
                <th class="no-print">Observaciones</th>
                <th class="no-print">Cuenta Cont.</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "sv18.byethost18.org";
            $username = "devlabsc_root";
            $password = "Dv229011000";
            $dbname = "devlabsc_aihbuys"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            $conn-> set_charset("utf8");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_GET["MonthID"])){
                $MonthID = $_GET["MonthID"];
            }

            $sql = "SELECT Date, BillNumber, Provider, Amount, CountableCount, Subtotal, Exempt, ISV15, OtherISV, Total, PayType, BuyType, Observations, Items FROM logs WHERE Month = '$MonthID' ORDER BY Date ASC";
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
                    case 'Tarjeta de Crédito';
                        return 'T/C';
                    case 'Transferencia':
                        return 'Trans';
                    case 'Botón de Pago':
                        return 'BDP';
                    case 'Efectivo':
                        return 'EFC';
                    case 'Pago en línea':
                        return 'BDP';
                    default:
                        return $type;
                }
            }

            echo '<script>';
            echo 'function formatProductName(name) {';
            echo '    name = name.toLowerCase();';
            echo '    return name.charAt(0).toUpperCase() + name.slice(1);';
            echo '}';
            echo '</script>';

            if ($result->num_rows > 0) {
                $number = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $number . "</td>";
                    echo "<td>" . formatDate($row["Date"]) . "</td>";
                    echo "<td>" . $row["BillNumber"] . "</td>";
                    echo "<td class='provider'>" . $row["Provider"] . "</td>";
                    echo "<td class='no-print'><button onclick='openItemsModal(" . htmlspecialchars(json_encode($row["Items"]), ENT_QUOTES, 'UTF-8') . ")'>Ver Items</button></td>";
                    echo "<td class='subtotal'>" . formatCurrency($row["Subtotal"]) . "</td>";
                    echo "<td class='exempt'>" . formatCurrency($row["Exempt"]) . "</td>";
                    echo "<td class='isv15'>" . formatCurrency($row["ISV15"]) . "</td>";
                    echo "<td class='otherisv'>" . formatCurrency($row["OtherISV"]) . "</td>";
                    echo "<td class='total'>" . formatCurrency($row["Total"]) . "</td>";
                    echo "<td class='no-print'>" . abreviatePay($row["PayType"]) . "</td>";
                    echo "<td class='description no-print' onclick='openDescriptionModal(\"" . $row["Observations"] . "\")'>" . $row["Observations"] . "</td>";
                    echo "<td class='no-print'>" . $row["CountableCount"] . "</td>";

                    echo "</tr>";
                    $number++;
                }
            } else {
                echo "<tr><td colspan='15'>No se encontraron resultados</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <div id="descriptionModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalDescription"></p>
        </div>
    </div>

    <div id="itemsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Productos</h2>
            <table id="modalItemsTable" style="width: calc(100% - 30px); margin: 0 15px;">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Producto</th>
                    </tr>
                </thead>
                <tbody id="modalItemsList"></tbody>
            </table>
        </div>
    </div>

    <script>
        var descriptionModal = document.getElementById("descriptionModal");
        var itemsModal = document.getElementById("itemsModal");
        var descriptionSpan = descriptionModal.getElementsByClassName("close")[0];
        var itemsSpan = itemsModal.getElementsByClassName("close")[0];

        function openDescriptionModal(description) {
            var modalDescription = document.getElementById("modalDescription");
            modalDescription.textContent = description;
            descriptionModal.style.display = "block";
        }

        function openItemsModal(items) {
            var modalItemsList = document.getElementById("modalItemsList");
            modalItemsList.innerHTML = "";
            try {
                var itemsArray = JSON.parse(items);
                if (itemsArray && itemsArray.length > 0) {
                    itemsArray.forEach(function(item) {
                        var tr = document.createElement("tr");
                        var tdAmount = document.createElement("td");
                        var tdProduct = document.createElement("td");
                        tdAmount.textContent = item.Amount;
                        tdProduct.textContent = formatProductName(item.Product);
                        tr.appendChild(tdAmount);
                        tr.appendChild(tdProduct);
                        modalItemsList.appendChild(tr);
                    });
                } else {
                    var tr = document.createElement("tr");
                    var tdMessage = document.createElement("td");
                    tdMessage.colSpan = 2;
                    tdMessage.textContent = "No se encontraron productos";
                    tr.appendChild(tdMessage);
                    modalItemsList.appendChild(tr);
                }
                itemsModal.style.display = "block";
            } catch (e) {
                console.error("Error al parsear datos JSON:", e.message);
            }
        }

        descriptionSpan.onclick = function() {
            descriptionModal.style.display = "none";
        };

        itemsSpan.onclick = function() {
            itemsModal.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target == descriptionModal) {
                descriptionModal.style.display = "none";
            }
            if (event.target == itemsModal) {
                itemsModal.style.display = "none";
            }
        };
    </script>

</body>
</html>
