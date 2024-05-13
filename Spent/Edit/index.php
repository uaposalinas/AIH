<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/com.img/com.icon.png" type="image/x-icon">
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

    <div class="NewLog" style="overflow: hidden; display:flex;">
    
            <header style="height:105px; top:25px;">
    
                <div class="Path">
    
    
    
                    <div class="Icon" style="width:45px; height:45px;background-image:url(https://cdn-icons-png.flaticon.com/512/3597/3597075.png); left:50px;"></div>
                    <t class="Position">
    
                        <p class="Identifer">AIH</p>
                        <i class="fi fi-br-angle-small-right"></i>
                        <p class="Identifer">Sistema de gastos</p>
                        <i class="fi fi-br-angle-small-right"></i>
                        <p class="Identifer">Editar reporte de Gasto</p>
    
                    </t>
        
    
                </div>
    
                <div class="SaveNewLog">Guardar</div>
    
            </header>
    
            <div class="Content">
    
                <form action="SetLog/index.php" method="post" class="ControlForm">
    
                    <div class="ExternalInputs" hidden>
    
                        <input type="text" name ="GestID" class="GestID" slot="Private">
                        <input type="text" name="Month" class="Month">
                        <input type="text" name="Year" class="Year">
                        <input type="text" name="CardUsed" class="CardUsedToPay">
                        <input type="text" name="FullDate" class="FullDate">
                        <input type="text" name="CurrentDay" class="CurrentDay">
    
                    </div>
                    
                    <div class="Rows">
    
                        <div class="Row">
    
                            <div class="ProviderCont Selectable">
        
                                <select name="SendProvider" class="Provider ThisValue SelectValue">
        
                                    <option value="default">Proveedor</option>
    
                                    <?php
    
                                        require '../config/com.config.php';
    
                                        $DoQuery = "SELECT Provider FROM providers WHERE 1";
                                        $QueryResults = $Connection -> query($DoQuery);
    
                                        if($QueryResults -> num_rows > 0){
    
                                            while($Row = $QueryResults -> fetch_assoc()){
    
                                                $Provider = $Row["Provider"];
    
                                                echo "<option value='$Provider'>$Provider</option>";
    
                                            }
    
                                        }
    
                                    ?>
                                    
    
                                </select>
        
                            </div>
        
                            <div class="AddMore AddAnotherProvider" style="cursor:pointer;"><i class="fi fi-rr-plus-small"></i></div>
        
                            <input type="number" name="SendAmount" class="Amount ThisValue" placeholder="Cantidad">
                            <input type="text" name="SendDescription" class="Description LogDescription ThisValue" placeholder="Descripción del gasto">
                            
                        </div>
        
                        <div class="Row" style="margin-top:10px;">
        
                            <div class="CountableCount Selectable">
        
                                <select name="SendCountableCount" class="CountableCountIn ThisValue SelectValue">
        
                                    <option value="default">Cuenta Contable</option>
                                    <option value="Alimentación">Alimentación</option>
                                    <option value="Gasto">Gasto</option>
                                    <option value="Servicio">Servicio</option>
                                    <option value="Medicamentos">Medicamentos</option>
                                    <option value="Insumos">Insumos</option>
                                    <option value="Combustible">Combustible</option>
                                    <option value="Alimentos">Alimentos</option>
                                    <option value="Carga">Carga</option>
            
                                </select>
        
                            </div>
        
                            <div class="BuyType Selectable" style="margin-left:20px;">
        
                                <select name="SendBuyType" class="BuyTypeIn ThisValue SelectValue">
        
                                    <option value="default">Tipo de compra</option>
                                    <option value="Personal">Personal</option>
                                    <option value="Oficina">Oficina</option>
        
                                </select>
        
                            </div>
        
                            <div class="PayType Selectable" style="margin-left:20px;">
        
                                <select name="SendPayType" class="PayTypeIn ThisValue SelectValue">
        
                                    <option value="default">Tipo de pago</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Botón de Pago">Botón de pago</option>
                                    <option value="Pago en línea">Pago en Linea</option>
                                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
        
                                </select>
        
                            </div>
        
                        </div>
        
                        <div class="Row" style="margin-top:10px;">
        
                            <div class="CountableCount Selectable">
        
                                <select name="Realice" class="Realice ThisValue SelectValue">
        
                                    <option value="default">¿Quién realizó el gasto?</option>
                                    <option value="AIH S DE RL">AIH S DE RL</option>
                                    <option value="Alejandro Salinas">Alejandro Salinas</option>
                                    <option value="Marjorie Santos">Marjorie Santos</option>
                                    <option value="Paola Rivera">Paola Rivera</option>
                                    <option value="Gary Rivera">Gary Rivera</option>
                                    <option value="Mario Castellanos">Mario Castellanos</option>
                                    <option value="Yenelin Manchamé">Yenelin Manchamé</option>
                                    <option value="David Castellón">David Castellón</option>
                                    <option value="Brandon Zelaya">Brandon Zelaya</option>
                                    <option value="Nicolle Artica">Nicolle Artica</option>
                                    <option value="Alejandra Castro">Alejandra Castro</option>
                                    <option value="Delman Gallardo">Delman Gallardo</option>
                                    <option value="José Rogel">José Rogel</option>
                                    <option value="Jussely Serrano">Jussely Serrano</option>
                                    <option value="Nelly Ramirez">Nelly Ramirez</option>
                                    <option value="Kimberly Quiroz">Kimberly Quiroz</option>
                                    <option value="Victoria Rodriguez">Victoria Rodriguez</option>
                                    <option value="Josue Argueta">Josue Argueta</option>
        
                                </select>
        
                            </div>
    
                            <input type="text" name="SendDate" class="ThisDate" placeholder="Fecha, ¿Es la de hoy? (00/00/0000)" style="display:flex; justify-content:left; text-align:left; padding-left:15px;" disabled>
                            <input type="checkbox" name="SendDateConfirmation" class="DateConfirmation" checked="true">
                            <input type="text" name="SendBillID" class="BillID ThisValue" placeholder="NO. de Factura"> 
        
                        </div>
        
                        <div class="Row Price" style="margin-top:20px; height:90px;">
        
                            <div class="GitLabels">
    
                            <label for="1" style="position:relative; left:0px;">Subtotal</label>
                            <label for="2" style="position:relative; left:0px;">Exento </label>
                            <label for="3" style="position:relative; left:0px;">Otros impuestos</label>
                            <label for="4" style="position:relative; left:0px;">ISV 18%</label>
                            <label for="5" style="position:relative; left:0px;">ISV 15%</label>
    
                            </div>
        
                            <input type="number" name="SendSubtotal" class="Subtotal ThisValue" placeholder="L 0.00" id="2" style="margin-left:0px;">
                            <input type="text" name="SendExempt" class="Exempt" placeholder="L 0.00" id="1" style="background-color: #141414;" value="L 0.00" disabled>
                            <input type="text" name="Other" class="Others" placeholder="L 0.00" id="3" disabled value="L 0.00">
                            <input type="text" name="ISV18" class="ISV18" placeholder="L 0.00" id="4" disabled value="L 0.00">
                            <input type="text" name="ISV15" class="ISV15" placeholder="L 0.00" id="5" disabled value="L 0.00">
        
                        </div>
    
                        <div class="Row checkboxs" style="height:13px;">
    
                            <div></div>
                            <div style="margin:0px;"><input type="checkbox" class="ExentStatus"></div>
                            <div><input type="checkbox" class="OtherStatus"></div>
                            <div><input type="checkbox" class="ISV18Status"></div>
                            <div><input type="checkbox" class="ISV15Status" checked></div>
    
    
                        </div>
                    
    
                    </div>
    
                    <div class="FinallyRow">
    
                        <t>¿Qué tarjeta se usó?</t>
    
                        <div class="DisplayCard"></div>
    
                        <div class="CardDetails">
    
                            <div class="CardLogo"></div>
                            <p class="CardBrand">Selecciona una tarjeta</p>
                            <p class="CardID">Terminación: 0000</p>
                            <p class="FailCard"> </p>
                            <p class="CVV"> </p>
    
                        </div>
    
                        <p class="TotalLogTitle">Total del registro</p>
                        <input type="text" name="SendTotal" class="Total" placeholder="L 0.00" disabled>
    
                    </div>
                
                </form>
    
            </div>
    
        </div>
    
</body>
</html>