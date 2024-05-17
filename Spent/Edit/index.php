<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/com.i mg/com.icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-thin-straight/css/uicons-thin-straight.css'>  
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="../Fonts/IndexFontsGlacialIndifference.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">    
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <script>

        const LocationFile = "../Vendor/com.css/com.config.css";

        const NewStyles = document.createElement('link');
        NewStyles.rel = "stylesheet";
        NewStyles.type = "text/css";
        NewStyles.href = LocationFile+"?v"+Math.random();
        document.head.appendChild(NewStyles);

    </script>

    <title>Editar Registro</title>
</head>
<body>

    <?php

        if(isset($_GET["GestID"])){

            $GestID = $_GET["GestID"];

        }else{

           // echo "<script> window.location.href = 'https://partners.devlabsco.space/AIH/Gateway/Spent/' </script>";

        }

        require '../config/com.config.php';
        $Connection->set_charset("utf8");

        $DoQuery = "SELECT * FROM logs WHERE GestID = '$GestID'";
        $QueryResults = $Connection -> query($DoQuery);

        if($QueryResults -> num_rows > 0){

            $Row = $QueryResults -> fetch_assoc();
            
            $Provider = $Row["Provider"];
            $Amount = $Row["Amount"];
            $BillDescription = $Row["BillDescription"];
            $CountableCount = $Row["CountableCount"];
            $BuyType = $Row["BuyType"];
            $PayType = $Row["PayType"];
            $SpendedBy = $Row["SpendedBy"];
            $Date = $Row["Date"];
            $BillNumber = $Row["BillNumber"];
            $Subtotal = $Row["Subtotal"];
            $Exempt = $Row["Exempt"];
            $OtherISV = $Row["OtherISV"];
            $ISV15 = $Row["ISV15"];
            $ISV18 = $Row["ISV18"];
            $ISV15 = $Row["ISV15"];
            $Total = $Row["Total"];
            $CardUsed = $Row["CardUsed"];


            echo "
            
            <div class='NewLog' style='overflow: hidden; display:flex;'>
            
            <div class='bar SendPreloader' style='width:100%'>
            <div></div>
            </div>


            <header style='height:105px; top:25px;'>
        
                <div class='Path'>
        
                    <div class='Icon' style='background-image: url(https://cdn-icons-png.flaticon.com/512/1828/1828270.png); width:45px; height:45px; left:20px; top:-6px; position:absolute;'></div>
                    <t class='Position'>
        
                        <p class='Identifer'>AIH</p>
                        <i class='fi fi-br-angle-small-right'></i>
                        <p class='Identifer'>Sistema de gastos</p>
                        <i class='fi fi-br-angle-small-right'></i>
                        <p class='Identifer'>Editar registro</p>
        
                    </t>
        
                </div>
        
                <div class='SaveNewLog'>Guardar</div>
        
            </header>
        
            <div class='Content'>
        
                <form action='com.save.php' method='get' class='ControlForm'>

                <input type='text' name='GestID' value='$GestID' hidden>
        
                    <div class='Rows'>
        
                        <div class='Row'>
        
                            <div class='ProviderCont Selectable'>
        
                                <input type='text' name='SendProvider' class='Provider ThisValue ProviderValue' style='width:100%; height:100%' placeholder='Proveedor' value='$Provider'>
        
                            </div>
        
                            <input type='number' name='SendAmount' class='Amount ThisValue' placeholder='Cantidad' value='$Amount'>
                            <input type='text' name='SendDescription' class='Description LogDescription ThisValue' placeholder='Descripción del gasto' value='$BillDescription'>
        
                        </div>
        
                        <div class='Row' style='margin-top:10px;'>
        
                            <div class='CountableCount Selectable'>
        
                                <select name='SendCountableCount' class='CountableCountIn ThisValue SelectValue'>
        
                                    <option value='$CountableCount'>$CountableCount</option>
                                    <option value='Alimentación'>Alimentación</option>
                                    <option value='Gasto'>Gasto</option>
                                    <option value='Servicio'>Servicio</option>
                                    <option value='Medicamentos'>Medicamentos</option>
                                    <option value='Insumos'>Insumos</option>
                                    <option value='Combustible'>Combustible</option>
                                    <option value='Alimentos'>Alimentos</option>
                                    <option value='Carga'>Carga</option>
        
                                </select>
        
                            </div>
        
                            <div class='BuyType Selectable' style='margin-left:20px;'>
        
                                <select name='SendBuyType' class='BuyTypeIn ThisValue SelectValue'>
        
                                    <option value='$BuyType'>$BuyType</option>
                                    <option value='Personal'>Personal</option>
                                    <option value='Oficina'>Oficina</option>
        
                                </select>
        
                            </div>
        
                            <div class='PayType Selectable' style='margin-left:20px;'>
        
                                <select name='SendPayType' class='PayTypeIn ThisValue SelectValue'>
        
                                    <option value='$PayType'>$PayType</option>
                                    <option value='Efectivo'>Efectivo</option>
                                    <option value='Transferencia'>Transferencia</option>
                                    <option value='Botón de Pago'>Botón de pago</option>
                                    <option value='Pago en línea'>Pago en Línea</option>
                                    <option value='Tarjeta de Crédito'>Tarjeta de Crédito</option>
        
                                </select>
        
                            </div>
        
                        </div>
        
                        <div class='Row' style='margin-top:10px;'>
        
                            <div class='CountableCount Selectable'>
        
                                <select name='Realice' class='Realice ThisValue SelectValue'>
        
                                    <option value='$SpendedBy'>$SpendedBy</option>
                                    <option value='AIH S DE RL'>AIH S DE RL</option>
                                    <option value='Alejandro Salinas'>Alejandro Salinas</option>
                                    <option value='Marjorie Santos'>Marjorie Santos</option>
                                    <option value='Paola Rivera'>Paola Rivera</option>
                                    <option value='Gary Rivera'>Gary Rivera</option>
                                    <option value='Mario Castellanos'>Mario Castellanos</option>
                                    <option value='Yenelin Manchamé'>Yenelin Manchamé</option>
                                    <option value='David Castellón'>David Castellón</option>
                                    <option value='Brandon Zelaya'>Brandon Zelaya</option>
                                    <option value='Nicolle Artica'>Nicolle Artica</option>
                                    <option value='Alejandra Castro'>Alejandra Castro</option>
                                    <option value='Delman Gallardo'>Delman Gallardo</option>
                                    <option value='José Rogel'>José Rogel</option>
                                    <option value='Jussely Serrano'>Jussely Serrano</option>
                                    <option value='Nelly Ramirez'>Nelly Ramirez</option>
                                    <option value='Kimberly Quiroz'>Kimberly Quiroz</option>
                                    <option value='Victoria Rodriguez'>Victoria Rodriguez</option>
                                    <option value='Josue Argueta'>Josue Argueta</option>
        
                                </select>
        
                            </div>
        
                            <input type='date' name='SendDate' class='ThisDate' value='$Date'>
                            <input type='text' name='SendBillID' class='BillID ThisValue' placeholder='NO. de Factura' value='$BillNumber'>
        
                        </div>
        
                        <div class='Row Price' style='margin-top:20px; height:90px;'>
        
                            <div class='GitLabels'>
        
                                <label for='1' style='position:relative; left:0px;'>Subtotal</label>
                                <label for='2' style='position:relative; left:0px;'>Exento</label>
                                <label for='3' style='position:relative; left:0px;'>Otros impuestos</label>
                                <label for='4' style='position:relative; left:0px;'>ISV 18%</label>
                                <label for='5' style='position:relative; left:0px;'>ISV 15%</label>
        
                            </div>
        
                            <input type='number' name='SendSubtotal' class='Subtotal ThisValue' value='$Subtotal' id='2' style='margin-left:0px;'>
                            <input type='text' name='SendExempt' class='Exempt ThisValue' placeholder='L 0.00' id='1' value='$Exempt'>
                            <input type='text' name='Other' class='Others ThisValue' placeholder='L 0.00' id='3' value='$OtherISV'>
                            <input type='text' name='ISV18' class='ISV18 ThisValue' placeholder='L 0.00' id='4' value='$ISV18'>
                            <input type='text' name='ISV15' class='ISV15 ThisValue' placeholder='L 0.00' id='5' value='$ISV15'>
        
                        </div>
        
                       
                    </div>
        
                    <div class='FinallyRow'>
        
                        <input type='text' name='CardUsed' class='CardUsedToPay ThisValue' value='$CardUsed'>
        
                        <p class='CardTitle'>Tarjeta Usada</p>
                        <p class='TotalLogTitle'>Total del registro</p>
                        <input type='text' name='SendTotal' class='Total' placeholder='Total' value='$Total'>
        
                    </div>
        
                </form>
        
            </div>
        
        </div>
        

            ";


        }else{

            echo "<script> window.location.href = 'https://partners.devlabsco.space/AIH/Gateway/Spent/' </script>";

        }

    ?>


    
    
</body>
</html>

<script>
    const files = [
      
        "../Vendor/com.js/com.edit.config.js"

    ];

    files.forEach(file => {
        const script = document.createElement("script");
        script.src = `${file}?v=${Math.random() * Math.random() * Math.random()}`;
        document.body.appendChild(script);
    });
</script>
