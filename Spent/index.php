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

<div class="BackModal" style="display: none;"></div>

<Modals class="SoftModals" style="display: none;">

    <div class="SelectCards">

        <i class="fi fi-rr-credit-card CardIcon"></i>

        <div class="AddCardsButton tooltip" data-text="Agregar tarjeta nueva">

            <i class="fi fi-br-plus"></i>

        </div>

        <t>Selecciona la tarjeta que se utilizó</t>
        <select class="SentCardUsed">

            <option value="0851">0851</option>

        </select>

        <div class="CardUsedConfirm">Siguiente</div>

    </div>

</Modals>

<body class="Spent">


    <div class="PrintReport"></div>

    <div class="StartPreloader" style="display: none;">



    </div>

    <div class="NotificationIslandParent">

        <div class="NotificationIsland">

            <div class="NotificationRender" style="width:100%; height:100%; position:absolute; left:0px; top:0px; display:flex; justify-content:center; align-items:center;">

                <div class="Icon"></div>
                <t class="Notification"></t>
                <div class="PriorityStatus"></div>

            </div>

            <div class="PreloaderRender" style="width:100%; height:100%; position:absolute; left:0px; top:0px; justify-content:center; align-items:center;">
            
                <div class="spinner">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                    <div class="bar4"></div>
                    <div class="bar5"></div>
                    <div class="bar6"></div>
                    <div class="bar7"></div>
                    <div class="bar8"></div>
                    <div class="bar9"></div>
                    <div class="bar10"></div>
                    <div class="bar11"></div>
                    <div class="bar12"></div>
                  </div>

                  <div class="PreloaderText" style="position:absolute; left:35px;">Generando Reporte</div>

            </div>

        </div>

    </div>
    
    <div class="SpentSelectMenu">

        <header style="position:absolute; top:70px;">

            <div class="PrincipalLogo"></div>
            <t>Sistema de Gestión de Finanzas AIH</t>
    
        </header>

        <div class="Menu">

            <div class="SelectOptionParent">

                <div class="Icon" style="background-image:url(Assets/com.img/NewReport.png);"></div>
                <t>Nuevo Reporte</t>

                <div class="SelectOption"></div>

            </div>
            
            <div class="SelectOptionParent">

                <div class="Icon" style="background-image:url(Assets/com.img/ViewReport.png);"></div>
                <t>Ver Reportes</t>

                <div class="SelectOption"></div>

            </div>
            <div class="SelectOptionParent">

                <div class="Icon" style="background-image:url(Assets/com.img/report.png); width:90px; height:90px;"></div>
                <t>Generar un Informe</t>
                <div class="SelectOption"></div>

            </div>

        </div>
    
        <footer>

            <i class="fi fi-rr-interrogation GetHelp"></i>

        </footer>


    </div>

    <div class="NewLog" style="overflow: hidden;">

        <header style="height:105px; top:25px;">

            <div class="Path">

                <div class="Icon"></div>
                <t class="Position">

                    <p class="Identifer">AIH</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Sistema de gastos</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Nuevo reporte de Gasto</p>

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
                                <option value="Estelinas">Estelinas</option>
                                <option value="Gasolinera Uno">Gasolinera Uno</option>
                                <option value="Oki Poki">Oki Poki</option>
                                <option value="Little Caesars">Little Caesars</option>
                                <option value="Friday">Friday</option>
                                <option value="Quick Box">Quick Box</option>
                                <option value="Costas Burger">Costas Burguer</option>
                                <option value="Matambritas">Matambritas</option>
                                <option value="Circle K">Circle K</option>
                                <option value="PriceSmart">PriceSmart</option>
                                <option value="Texaco">Texaco</option>
                                <option value="Gasolinera Puma">Gasolinera Puma</option>
                                <option value="Gasolinera Shell">Gasolinera Shell</option>
                                <option value="Larach y cia">Larach y cia</option>
                                <option value="La Mundial">La Mundial</option>
                                <option value="Los Andes">Los Andes</option>
                                <option value="La Colonia">La Colonia</option>
                                <option value="La Moderna">La Moderna</option>
                                <option value="Taco Pollo">Taco Pollo</option>
                                <option value="Claro">Claro</option>
                                <option value="Tigo">Tigo</option>
                                <option value="ACOSA">ACOSA</option>
                                <option value="Útiles de Honduras">Útiles de Honduras</option>
                                <option value="Burger King">Burger King</option>
                                

                            </select>
    
                        </div>
    
                        <div class="AddMore"><i class="fi fi-rr-plus-small"></i></div>
    
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
                                <option value="Alejandro Salinas">Alejandro Salinas</option>
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
    
                        <label for="1">Subtotal</label>
                        <label for="2">Exento </label>
                        <label for="3">Otros impuestos</label>
                        <label for="4">ISV 18%</label>
                        <label for="5">ISV 15%</label>
    
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
                        <p class="Brand">Selecciona una tarjeta</p>
                        <p class="CardID">Terminación: 0000</p>
                        <p class="FailCard">Fecha de Vencimiento: 00/00</p>
                        <p class="CVV">CVV: 0000 </p>

                    </div>

                    <p class="TotalLogTitle">Total del registro</p>
                    <input type="text" name="SendTotal" class="Total" placeholder="L 0.00" disabled>

                </div>
            
            </form>

        </div>

    </div>

    <div class="ViewLogs">

        
        <header style="height:105px; top:35px;">

            <div class="Path" style="left:30px;">

                <div class="Icon" style="background-image:url(Assets/com.img/ViewReport.png);"></div>
                <t class="Position">

                    <p class="Identifer">AIH</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Sistema de gastos</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Ver Reportes</p>

                </t>
    

            </div>


            <div class="RightBar">

                <div class="ReloadTable tooltip" data-text="Refrescar">

                    <i class="fi fi-br-rotate-right"></i>

                </div>

                <div class="TimeFilter tooltip" data-text="Filtrar por Fecha">

                    <i class="fi fi-rr-time-past"></i>

                </div>

                <div class="SwitchTable tooltip" data-text="Ver como tabla">

                    <i class="fi fi-rr-table-list"></i>

                </div>
                
                <div class="SearchLog">

                    <input type="text" class="SearchByLog" placeholder="Escribe el ID de Gestión o NO. de Factura para buscar.">
                    <i class="fi fi-br-search"></i>

                </div>             

            </div>

        </header>

        <div class="ShowLogs">

            <div class="GridShow" style="display:flex;">

                <?php

                require 'config/com.config.php';

                $DoQuery = "SELECT * FROM logs WHERE 1";
                $QueryResults = $Connection -> query($DoQuery);

                if($QueryResults -> num_rows > 0){

                    while($Row = $QueryResults -> fetch_assoc()){

                        $GestID = $Row["GestID"];
                        $GetCountableCount = $Row["CountableCount"];
                        $GetSaveDay = $Row["SavedDay"];
                        $GetFullDate = $Row["FullDate"];
                        $SpendedBy = $Row["SpendedBy"];
                        $BillID = $Row["BillNumber"];
                        $BuyType = $Row["BuyType"];
                        $PayType = $Row["PayType"];
                        $CardUsed = $Row["CardUsed"];
                        $Total = $Row["Total"];
                        $Provider = $Row["Provider"];
                        $Image = "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.providers/$Provider.png";

                        echo "<cont slot='Show' encode='$GestID' class='ShowInformation'>

                        <header>
                    
                            <logo class='ProviderLogo' style='background-image: url($Image);'></logo>
                    
                    
                            <t class='CountableCountShow' style='font-size:16px;'>$GetCountableCount</t>
                            <p class='Date' style='font-size:13px;'>$GetSaveDay • $GetFullDate</p>
                    
                        </header>
                    
                        <div class='Contents'>
                    
                            <p>Realizado por: $SpendedBy</p>
                            <p>Realizado el: $GetFullDate</p>
                            <p>NO. de Factura: $BillID</p>
                            <p>Tipo de compra: $BuyType</p>
                            <p>Tipo de Pago: $PayType</p>
                            <p>Tarjeta usada: $CardUsed</p>
                    
                            <div class='TotalToShow'>$Total</div>
                    
                        </div>
                    
                    </cont>
                    ";


                    }

                }else{

                    echo "!OK";

                }

            ?>

            </div>

            <div class="TableShow" style="display:none;">

                <div class="TableContents">

                    <p style="left:15px; font-family:GIB;">#</p>
                    <p style="left:40px;">Proveedor</p>
                    <p style="left:190px;">Comprado por</p>
                    <p style="left:370px;">Comprado el</p>
                    <p style="left:560px;">Tipo de compra</p>
                    <p style="left:790px;">Tarjeta usada</p>
                    <p style="right:40px;">Total Gastado</p>

                </div>

                <divs class="ShowResults">

                    <log>

                        <p class="ListNumber">1</p>
                        <p class="Provider">Estelinas</p>
                        <p class="BuyedBy">Alejandro Salinas</p>
                        <p class="BuyedIn">15/03/24</p>
                        <p class="BuyType" >Personal</p>
                        <p class="CardUsed">8951</p>
                        <p class="Total">L 130.00</p>

                    </log>
                 
                    <log>

                        <p class="ListNumber" style="left:15px; font-family:GIB;">2</p>
                        <p class="Provider" style="left:40px;">Estelinas</p>
                        <p class="BuyedBy" style="left:190px;">Alejandro Salinas</p>
                        <p class="BuyedIn" style="left:385px;">15/03/24</p>
                        <p class="BuyType" style="left:590px;">Personal</p>
                        <p class="CardUsed" style="left:830px;">8951</p>
                        <p class="Total" style="right:40px;">L 130.00</p>

                    </log>

                    <log>

                        <p class="ListNumber">1</p>
                        <p class="Provider">Estelinas</p>
                        <p class="BuyedBy">Alejandro Salinas</p>
                        <p class="BuyedIn">15/03/24</p>
                        <p class="BuyType" >Personal</p>
                        <p class="CardUsed">8951</p>
                        <p class="Total">L 130.00</p>

                    </log>
                 

                </div>

            </div>

    </div>

    <div class="DisplaySelected">

        <header style="height:105px; top:25px;">

            <div class="Path">

                <div class="Icon" style="background-image:url(Assets/com.img/report.png);"></div>
                <t class="Position">

                    <p class="Identifer">AIH</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Sistema de gastos</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Detalles del Gasto</p>

                </t>
    

            </div>

            <div class="ReportButtons">

                <div class="ShareReport" title="Compartir reporte"> <i class="fi fi-rr-send-money"></i></div>
                <div class="PrintReport" title="Imprimir Reporte Individual"><i class="fi fi-rr-print"></i></div>

            </div>

        </header>

        <div class="Content">

            <div class="DetailsHeader">

                <div class="ProviderDetails">

                    <div class="Logo"></div>
                    <div class="ProviderName">Gasto realizado en Estelinas</div>
                    <div class="SpentType">Gasto Alimetario</div>
                    <div class="PaidDetail">Pagado con:</div>
                    <div class="PaidResult tooltip" data-text="Botón de Pago"></div>

                </div>
                
                <div class="EnterpriseLogo"></div>

            </div>

            
            <div class="TransactionDetails">

                <t>Detalles de la transacción</t>

                    <div class="Row">

                        <div class="GestID">ID  : ASC-2024-041001</div>
                        <div class="Date">Fecha: 01/01/2024</div>
                        <div class="Provider">Proveedor: Estelinas</div>
                        <div class="SpentedBy" style="width:360px;">Gastado por: Alejandro Salinas</div>

                    </div>
                    <div class="Row">

                        <div class="PayType" style="width:270px;">Tipo de pago: Botón de Pago</div>
                        <div class="PayUsed">Tarjeta usada: 8951</div>
                        <div class="CountableCount">Cuenta Contable: Alimentación</div>
                        <div class="BuyType">Tipo de compra: Personal</div>

                    </div>
                    <div class="Row Price Exents" style="margin-top:20px; height:80px; position:relative;">
    
                        <label for="1" style="color:#9b9b9b; font-family: GI; position:absolute; left:80px;">Descripción del gasto:</label>
                        <label for="2" style="color:#9b9b9b; font-family: GI; position:absolute; left:520px;">NO. de Factura: </label>
                        <label for="3" style="color:#9b9b9b; font-family: GI; position:absolute; left:958px;">Cantidad</label>
                        <label for="4" style="color:#9b9b9b; font-family: GI; position:absolute; left:1110px;">Exento</label>
    
                        <div style="width:385px; display:flex; justify-content:left; padding-left:15px; ">Compra de almuerzo</div>
                        <div style="width:385px; display:flex; justify-content:left; padding-left:15px;">000-001-01-01466628</div>
                        <div style="width:105px;">3</div>
                        <div style="width:215px; display:flex; justify-content:left; padding-left:15px;">L 36.52</div>

    
                    </div>
                    <div class="Row Price Exents" style="margin-top:20px; height:80px; position:relative; display:flex; justify-content:left; padding-left:30px;">
    
                        <label for="1" style="color:#9b9b9b; font-family: GI; position:absolute; left:80px;">Subtotal 18%</label>
                        <label for="2" style="color:#9b9b9b; font-family: GI; position:absolute; left:350px;">Subtotal</label>
                        <label for="3" style="color:#9b9b9b; font-family: GI; position:absolute; left:620px;">ISV 18%</label>
                        <label for="4" style="color:#9b9b9b; font-family: GI; position:absolute; left:885px;">ISV 15%</label>
    
                        <div style="width:215px;">L 0.00</div>
                        <div style="width:215px;">L 243.00</div>
                        <div style="width:215px;">L 0.00</div>
                        <div style="width:215px;">L 36.52</div>

    
                    </div>

                    <div class="Result">L. 350.00</div>

            </div>


        </div>

    </div>

    <div class="GenerateANewReport" style="display: none;">

        <div class="Assistant">

            <div class="AssistantPreloader" style="position:relative;">

                <div class="spinner" style="position:relative;">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                    <div class="bar4"></div>
                    <div class="bar5"></div>
                    <div class="bar6"></div>
                    <div class="bar7"></div>
                    <div class="bar8"></div>
                    <div class="bar9"></div>
                    <div class="bar10"></div>
                    <div class="bar11"></div>
                    <div class="bar12"></div>
                  </div>

            </div>

        </div>

    </div>
    

    </div>

</body>

<script>

    const FileLocation = "Vendor/com.js/com.auth.js?v="+Math.random();
    const NewScript = document.createElement('script');
    NewScript.type = "text/javascript";
    NewScript.src = FileLocation;
    document.body.appendChild(NewScript)

</script>

</html>

<script>

    const ConfigFileLoc = "Vendor/com.js/com.config.js?v="+Math.random();
    const ConfigScript = document.createElement('script');
    ConfigScript.type = "text/javascript";
    ConfigScript.src = ConfigFileLoc;
    document.body.appendChild(ConfigScript)

</script>

<script>

    const AdmissionFileLoc = "Vendor/com.js/com.admission.js?v="+Math.random();
    const AdmissionScript = document.createElement('script');
    AdmissionScript.type = "text/javascript";
    AdmissionScript.src = AdmissionFileLoc;
    document.body.appendChild(AdmissionScript)

</script>

<script src="Vendor/com.js/com.island.config.js"></script>
<script src="Vendor/com.js/com.frames.js"></script>

<style>

    form input:disabled{

        background-color: #141414;

    }

</style>