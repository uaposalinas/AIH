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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <script>

        const LocationFile = "Vendor/com.css/com.config.css";

        const NewStyles = document.createElement('link');
        NewStyles.rel = "stylesheet";
        NewStyles.type = "text/css";
        NewStyles.href = LocationFile+"?v"+Math.random();
        document.head.appendChild(NewStyles);

    </script>

    <script>

    
        if(sessionStorage.getItem('AuthStatus') === 'Allowed'){

            console.log('Session Iniciada');

        }else{

            window.location.href = "Auth/"

        }

    </script>

    <title>AIH's Bills</title>
</head>

<body class="Spent" style="overflow:hidden">

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
    
    <div class="SpentSelectMenu" style="animation:fadeInUp 0.5s">

        <header style="position:absolute; top:70px;">

            <div class="PrincipalLogo"></div>
            <t>Sistema de Gestión de Gastos</t>

            <div class="ThisNotificationsRender" style="display:none">

                <div class="Notification">

                    <i class="fi fi-ts-newspaper Icon"></i>
                    <div class="Message">Es hora de hacer el cierre del mes de abril, ve a "Ver Reportes" y pulsa en cierre de mes.</div>
                    <i class="fi fi-rs-circle-xmark Close"></i>

                </div>

            </div>
    
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

    <div class="BackButtonPack BackToHome">

        <i class="fi fi-sr-angle-left BackToHome"></i>
        <p>Inicio</p>

    </div>

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

                                <?php

                                    require 'config/com.config.php';

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

    <div class="ViewLogs" style="animation:fadeIn 0.5s;">

    <div class="BackButtonPack BackToHome">

        <i class="fi fi-sr-angle-left BackToHome"></i>
        <p>Inicio</p>

    </div>

        
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

                <input type="date" class="FilterByDate">

                <div class="SwitchTable tooltip" data-text="Ver como tabla">

                    <i class="fi fi-rr-table-list"></i>

                </div>
                
                <div class="SearchLog">

                    <input type="text" class="SearchByLog" placeholder="Escribe el ID de Gestión para buscar.">
                    <i class="fi fi-br-search"></i>

                </div>             

            </div>

        </header>

        <div class="ShowBarResults">

            <div class="SearchBarIndex">

                <div class="Icon"></div>
                <t>Escribe en la barra para buscar</t>
                                    
            </div>

            <div class="NoResults" style="display:none;">

                <div class="Icon"></div>
                <t>No hay resultados para este ID de gestión</t>

            </div>

        </div>

        <div class="ShowLogs">

        

            <div class="GridShow" style="display:flex;">

                <?php

                require 'config/com.config.php';

                $Connection->set_charset("utf8");

                $DoQuery = "SELECT * FROM logs WHERE 1";
                $QueryResults = $Connection -> query($DoQuery);

                if($QueryResults -> num_rows > 0){

                    while($Row = $QueryResults -> fetch_assoc()){

                        $GestID = $Row["GestID"];
                        $GetCountableCount = $Row["CountableCount"];
                        $GetDate = $Row["Date"];
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

                        echo "<cont slot='Show' GestID='$GestID' class='ShowInformation ThisLog' date='$GetDate'>

                        <header>
                    
                            <logo class='ProviderLogo' slot='$Image' style='background-image:url(Assets/com.img/defaults/nologo.png)'></logo>
                    
                    
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

                    echo "<NFC style='width:100%; height:100%; position:absolute; display:flex; justify-content:center; align-items:center;text-align:center;color:#FFFFFF; font-family:caviarDreamsBold; font-size:20px;animation:fadeInUp 0.5s'>Hmm... No hay nada por aquí</NFC>";

                }

            ?>

            </div>

            <div class="TableShow" style="display:none;">

                <div class="TableContents">

                    <p style="left:15px; font-family:GIB;"></p>
                    <p style="left:40px;">Proveedor</p>
                    <p style="left:190px;">Comprado por</p>
                    <p style="left:370px;">Comprado el</p>
                    <p style="left:560px;">Tipo de compra</p>
                    <p style="left:790px;">Tarjeta usada</p>
                    <p style="right:40px;">Total Gastado</p>

                </div>

                <divs class="ShowResults">

                    <?php

                        require 'config/com.config.php';

                        $Connection->set_charset("utf8");

                        $DoQuery = "SELECT GestID ,Provider, SpendedBy, Date, BuyType, CardUsed, Total FROM logs WHERE 1";
                        $QueryResults = $Connection -> query($DoQuery);

                        if($QueryResults -> num_rows > 0){

                            while($Row = $QueryResults -> fetch_assoc()){

                                $GestID = $Row["GestID"];
                                $Provider = $Row["Provider"];
                                $SpendedBy = $Row["SpendedBy"];
                                $Date = $Row["Date"];
                                $BuyType = $Row["BuyType"];
                                $CardUsed = $Row["CardUsed"];
                                $Total = $Row["Total"];

                                echo "
                                
                                <log class='ThisLog' GestID='$GestID'>

                                    <p class='ListNumber'></p>
                                    <p class='Provider'>$Provider</p>
                                    <p class='BuyedBy'>$SpendedBy</p>
                                    <p class='BuyedIn'>$Date</p>
                                    <p class='BuyType'>$BuyType</p>
                                    <p class='CardUsed'>$CardUsed</p>
                                    <p class='Total'>$Total</p>
                            
                                </log>
                            

                                ";

                            }

                        }

                    ?>
                 
                </div>

            </div>

    </div>

    <div class="ShowInfo" style="display:none;">

    <div class="DetectShare tooltip" data-text="Compartir Registro"></div>

    <div class="BackButtonPack BackToLogs">

        <i class="fi fi-sr-angle-left"></i>
        <p>Registros</p>

    </div>

        <iframe src="Log.php" frameborder="0" style="width:100%; height:95%; position:absolute; bottom:0px;" class="ShowLogsFrame"></iframe>

    </div>

    <div class="GenerateANewReport" style="display: none; position:absolute; top:0px; height:100vh">

    <div class="BackButtonPack BackToHome">

        <i class="fi fi-sr-angle-left BackToHome"></i>
        <p>Inicio</p>

    </div>

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

    <div class="BackModal" style="display: none;"></div>

<Modals class="SoftModals" style="display: none; z-index:9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999;">

    <div class="BackButtonPack BackToNewLog">

        <i class="fi fi-sr-angle-left BackToHome"></i>
        <p>Nuevo Registro</p>

    </div>


    <div class="SelectCards">

        <i class="fi fi-rr-credit-card CardIcon"></i>

        <div class="AddCardsButton tooltip" data-text="Agregar tarjeta nueva">

            <i class="fi fi-br-plus"></i>

        </div>

        <t>Selecciona la tarjeta que se utilizó</t>
        <select class="SentCardUsed">

        <option value="N/A">N/A</option>

        <?php

            require 'config/com.config.php';

            $DoQuery = "SELECT ID FROM cards WHERE 1";
            $QueryResults = $Connection -> query($DoQuery);

            if($QueryResults -> num_rows > 0){

                while($Row = $QueryResults -> fetch_assoc()){

                    $ID = $Row["ID"];

                    echo "<option value='$ID'>$ID</option>";
                  

                }

            }

        ?>

        </select>

        <div class="CardUsedConfirm">Siguiente</div>

    </div>

</Modals>

</body>

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
<script src="Vendor/com.js/com.navigation.js"></script>
<script src="Vendor/com.js/com.frames.js"></script>
<script src="Vendor/com.js/com.indexer.js"></script>
<script src="Vendor/com.js/com.filter.js"></script>
<script src="Vendor/com.js/com.return.js"></script>

<style>

    form input:disabled{

        background-color: #141414;

    }

</style>

