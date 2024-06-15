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

    <title>AIH's Buys</title>
</head>

<body class="Spent" style="overflow:hidden">

    <div class="ProvidersPopup" style="display:none">

    <div class="BackButtonPack BackToNewLog">

        <i class="fi fi-sr-angle-left"></i>
        <p>Nuevo Registro</p>

        </div>

        <div class="PopupContent">

            <header>

                <t>Proveedores</t>
                <div class="SearchLog" style="position:relative; right:0px; left:0px; margin-left:0px; margin-right:0px; margin-top:20px">

                    <input autocomplete="off" type="text" class="SearchByProvider" placeholder="Escribe una palabra clave para buscar">
                    <i class="fi fi-br-search"></i>

                </div>

            </header>

            <content class="Scroll">

            <div class="NoResults2" style="display:none;">

                <div class="NoResultsIcon2"></div>
                <t>Este proveedor no existe, debes crearlo tú.</t>

            </div>



                <?php

                    require 'config/com.server.config.php';
                    $Connection -> set_charset("utf8");

                    $DoQuery = "SELECT Provider FROM providers WHERE 1";
                    $QueryResults = $Connection -> query($DoQuery);

                    if($QueryResults -> num_rows > 0){

                        while($Row = $QueryResults -> fetch_assoc()){

                            $GetProvider = $Row["Provider"];


                            $Image = "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.providers/$GetProvider.png";

                            echo "
                                
                                <provider class='ThisProvider' provider='$GetProvider'>

                                    <div class='ShowProviderLogoToSearch' slot='$Image'></div>
                                    <div class='Name'>$GetProvider</div>
                            
                                </provider>
                        


                            ";

                        }

                    }else{

                        echo "!OK";

                    }

                ?>


            </content>

        </div>

    </div>

    <div class="ItemsPopup">

        <div class="ItemsListContainer">

                <header>

                    <t>Items</t>
                    <i class="fi fi-br-plus AddNewItemToList"></i>
                    <i class="fi fi-rr-disk SaveAllInputs" style="right:50px;"></i>

                </header>

                <bodys class="Scroll">

                    <div class="Identifers">

                        <ID>Cant.</ID>
                        <ID>Producto</ID>
                    
                    </div>

                    <div class="AddItemResults">

                        <item>

                            <input type="text" class="GetThisAmount">
                            <input type="text" class="GetThisProductName">

                        </item>

                    </div>

                </bodys>
                    
        </div>

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
    
    <div class="SpentSelectMenu" style="animation:fadeInUp 0.5s">

        <header style="position:absolute; top:70px;">

            <div class="PrincipalLogo"></div>
            <t>Sistema de Gestión de Compras</t>

            <div class="ThisNotificationsRender" style="display:flex">

                <div class="Notification">

                <i class="fi fi-rr-file-medical-alt Icon"></i>
                    <div class="Message">Se compagino el activo "reporte" en el directorio (protocol)(host)/{com.reports}</div>
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
            <div class="SelectOptionParent">

                <div class="Icon" style="background-image:url(https://cdn-icons-png.flaticon.com/512/839/839374.png);"></div>
                <t>Configuración</t>

                <div class="SelectOption"></div>

            </div>

        </div>
    
        <footer>

            <i class="fi fi-rr-interrogation GetHelp"></i>

        </footer>


    </div>

    <div class="NewLog" style="overflow: hidden;">

    <div class="BackButtonPack BackToHome HideWhileSelectProvider">

        <i class="fi fi-sr-angle-left BackToHome"></i>
        <p>Inicio</p>

    </div>

        <header style="height:105px; top:25px;">

            <div class="Path">



                <div class="Icon"></div>
                <t class="Position">

                    <p class="Identifer">AIH</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Sistema de Compras</p>
                    <i class="fi fi-br-angle-small-right"></i>
                    <p class="Identifer">Nuevo reporte de Compra</p>

                </t>
    

            </div>

            <div class="SaveNewLog">Guardar</div>

        </header>

        <div class="Content">

            <form action="SetLog/index.php" method="post" class="ControlForm">

                <div class="ExternalInputs" hidden>

                    <input autocomplete="off" type="text" name ="GestID" class="GestID" slot="Private">
                    <input autocomplete="off" type="text" name="Month" class="Month">
                    <input autocomplete="off" type="text" name="Year" class="Year">
                    <input autocomplete="off" type="text" name="CardUsed" class="CardUsedToPay">
                    <input autocomplete="off" type="text" name="FullDate" class="FullDate">
                    <input autocomplete="off" type="text" name="CurrentDay" class="CurrentDay">
                    <input autocomplete="off" type="text" name="Items" class="SendItems">

                </div>
                
                <div class="Rows">

                    <div class="Row">

                        <div class="ProviderCont Selectable">
    
                            <input autocomplete="off" type="text" name="SendProvider" class="Provider ThisValue ProviderValue" style="width:100%; height:100%" placeholder="Proveedor">

                        </div>
    
                        <div class="AddMore AddAnotherProvider" style="cursor:pointer;"><i class="fi fi-rr-plus-small"></i></div>
    
                        <input autocomplete="off" type="number" name="SendAmount" class="Amount ThisValue" placeholder="Cantidad">
                        <input autocomplete="off" type="text" name="SendDescription" class="Description LogDescription ThisValue" placeholder="Descripción del Compra">
                        
                    </div>
    
                    <div class="Row" style="margin-top:10px;">
    
                        <div class="CountableCount Selectable">
    
                            <select name="SendCountableCount" class="CountableCountIn ThisValue SelectValue">
    
                                <option value="default">Cuenta Contable</option>
                                <option value="Alimentación">Alimentación</option>
                                <option value="Compra">Compra</option>
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
    
                                <option value="default">¿Quién realizó el Compra?</option>
                                <option value="AIH S DE RL">AIH S DE RL</option>
                                <option value="Alejandro Salinas">Alejandro Salinas</option>
                                <option value="Marjorie Santos">Marjorie Santos</option>
                                <option value="Paola Rivera">Paola Rivera</option>
                                <option value="Gary Rivera">Gary Rivera</option>
                                <option value="Mario Castellanos">Mario Castellanos</option>
                                <option value="Yenilin Manchamé">Yenilin Manchamé</option>
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

                        <input autocomplete="off" type="text" name="SendDate" class="ThisDate" placeholder="Fecha, ¿Es la de hoy? (00/00/0000)" style="display:flex; justify-content:left; text-align:left; padding-left:15px;" disabled>
                        <input autocomplete="off" type="checkbox" name="SendDateConfirmation" class="DateConfirmation" checked="true">
                        <input autocomplete="off" type="text" name="SendBillID" class="BillID ThisValue" placeholder="NO. de Factura"> 
    
                    </div>
    
                    <div class="Row Price" style="margin-top:20px; height:90px;">
    
                        <div class="GitLabels">

                        <label for="1" style="position:relative; left:0px;">Subtotal</label>
                        <label for="2" style="position:relative; left:0px;">Exento </label>
                        <label for="3" style="position:relative; left:0px;">Otros impuestos</label>
                        
                        <label for="5" style="position:relative; left:0px;">ISV 15%</label>
                        <label for="4" style="position:relative; left:0px;">Observaciones</label>

                        </div>
    
                        <input autocomplete="off" type="number" name="SendSubtotal" class="Subtotal ThisValue" placeholder=" 0.00" id="2" style="margin-left:0px;">
                        <input autocomplete="off" type="text" name="SendExempt" class="Exempt" placeholder=" 0.00" id="1" style="background-color: #141414;" value=" 0.00" disabled>
                        <input autocomplete="off" type="text" name="Other" class="Others" placeholder=" 0.00" id="3" disabled value=" 0.00">
                        <input autocomplete="off" type="text" name="ISV15" class="ISV15" placeholder=" 0.00" id="5" disabled value=" 0.00">
                        <input autocomplete="off" type="text" name="Observations" class="Observations" id="4" placeholder="Escribe algo" required>
    
                    </div>

                    <div class="Row checkboxs" style="height:13px;">

                        <div></div>
                        <div style="margin:0px;"><input autocomplete="off" type="checkbox" class="ExentStatus"></div>
                        <div><input autocomplete="off" type="checkbox" class="OtherStatus"></div>
                        <div><input autocomplete="off" type="checkbox" class="ISV15Status" checked></div>
                        <div><input autocomplete="off" type="checkbox" class="ObservationsStatus" style="opacity:0;"></div>
                       


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

                    <div class="ItemsList tooltip" data-text="Lista de Items"></div>

                    <p class="TotalLogTitle">Total del registro</p>
                    <input autocomplete="off" type="text" name="SendTotal" class="Total" placeholder=" 0.00" disabled>

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
                    <p class="Identifer">Sistema de Compras</p>
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

                <input autocomplete="off" type="date" class="FilterByDate">

                <div class="SwitchTable tooltip" data-text="Ver como tabla">

                    <i class="fi fi-rr-table-list"></i>

                </div>
                
                <div class="SearchLog">

                    <input autocomplete="off" type="text" class="SearchByLog" placeholder="Escribe el ID de Gestión para buscar.">
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

                require 'config/com.server.config.php';

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

                        require 'config/com.server.config.php';

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

            <div class="ReportsPrincipalPage">

                <div class="Icon"></div>
                <t>Reporte de Compras</t>

                <div class="Options">

                    <div class="CreateANewReport ReportOptions">

                        <ic class="Icons"></ic>
                        <p>Crear Reporte</p>

                    </div>
                    <div class="ViewOldReports ReportOptions">

                        <ic style="background-image:url(Assets/com.img/metric.png) !important;" class="Icons"></ic>
                        <p>Ver los reportes</p>

                    </div>

                </div>
            
            </div>

            <div class="ReportsPrincipalPage CreateReport ReportAnimationLeft" style="display:none !important">

                <div class="Icon" ></div>
                <t>Nuevo Reporte</t>

                <div class="Options">

                    <div class="CreateANewReport ReportOptions MensualReport">

                    <ic style="background-image:url(Assets/com.img/Month.png) !important;" class="Icons"></ic>
                        <p>Reporte Mensual</p>

                    </div>
                    <div class="CustomReportForm ReportOptions">

                        <ic style="background-image:url(Assets/com.img/custom.png) !important;" class="Icons"></ic>
                        <p>Reporte Personalizado</p>

                    </div>

                </div>

            </div>

            <div class="SelectMonth ReportAnimationLeft" style="display:none;">

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/1.png)"></divs>
                    <t class="MonthID">Enero</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/2.png)"></divs>
                    <t class="MonthID">Febrero</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/3.png)"></divs>
                    <t class="MonthID">Marzo</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/5.png)"></divs>
                    <t class="MonthID">Abril</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/5.png)"></divs>
                    <t class="MonthID">Mayo</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/6.png)"></divs>
                    <t class="MonthID">Junio</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/7.png)"></divs>
                    <t class="MonthID">Julio</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/8.png)"></divs>
                    <t class="MonthID">Agosto</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/9.png)"></divs>
                    <t class="MonthID">Septiembre</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/10.png)"></divs>
                    <t class="MonthID">Octubre</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/11.png)"></divs>
                    <t class="MonthID">Noviembre</t>
                    <ac class="Month"></ac>

                </div>

                <div>

                    <divs class="Icn" style="background-image:url(Assets/com.img/Months/12.png)"></divs>
                    <t class="MonthID">Diciembre</t>
                    <ac class="Month"></ac>

                </div>

            </div>

            <div class="CustomForm">

                <div class="CustomFormAssistant">

                    <div class="SelectForCustomReport ReportAnimationLeft" style="display:flex">

                        <t>Selecciona una opción para el reporte</t>

                        <div class="Options">

                            <div class="SelectProvider">

                                <i class="fi fi-rr-shop"></i>
                                <ion-icon name="chevron-forward-outline" class="Chev"></ion-icon>
                                <p1>Reportar por proveedor</p1>
                                <p2>Selecciona un proveedor especifico</p2>
                                <click class="ClickOption"></click>

                            </div>
                            <div class="SelectDate">

                                <i class="fi fi-rr-clock-three"></i>
                                <ion-icon name="chevron-forward-outline" class="Chev"></ion-icon>
                                <p1>Reportar por Fecha</p1>
                                <p2>Selecciona una entre fecha</p2>
                                <click class="ClickOption"></click>

                            </div>
                            <div class="SelectUser">

                                <i class="fi fi-rr-circle-user"></i>
                                <ion-icon name="chevron-forward-outline" class="Chev"></ion-icon>
                                <p1>Reportar por Comprador</p1>
                                <p2>Filtra las compras por comprador</p2>
                                <click class="ClickOption"></click>

                            </div>

                        </div>

                    </div>

                    <div class="NextButton ActivateButton" style="display:flex;">Siguiente</div>

                    <div class="SelectProviderForCustomReport ReportAnimationLeft" style="display:none">

                        <div class="Icon"></div>

                        <t>Selecciona un proveedor</t>

                        <input type="text" class="SendProviderForCustomReport" hidden>

                        <div class="SelectProviderNows">Buscar Proveedores</div>

                        <div class="ReportNextPosition ThisPulseProvider"></div>

                    </div>

                    <div class="SelectDateForCustomReport ReportAnimationLeft" style="display:none">

                        <div class="Icon"></div>

                        <t>Selecciona entre que fechas quieres filtrar</t>

                        <p style="margin-top:30px;">Desde:</p>
                        <input type="date" class="SendFirstDate">
                        <p>Hasta:</p>
                        <input type="date" class="SendSecondDate">


                        <div class="SendTimeForCustomReport ReportNextPosition">Siguiente</div>


                    </div>

                    <div class="SelectUserForCustomReport ReportAnimationLeft" style="display:none">

                        <div class="Icon"></div>

                        <t>Selecciona quien lo compro:</t>

                        <div class="CountableCount Selectable ThisNas" style="background-color:#4b4848; color:#1c1c1c; width:90%; position:relative; margin:20px;">
        
                            <select name="Realice" class="Realice ThisValue SelectValue SelectForCustomReports">

                                <option value="default">¿Quién realizó el Compra?</option>
                                <option value="AIH S DE RL">AIH S DE RL</option>
                                <option value="Alejandro Salinas">Alejandro Salinas</option>
                                <option value="Marjorie Santos">Marjorie Santos</option>
                                <option value="Paola Rivera">Paola Rivera</option>
                                <option value="Gary Rivera">Gary Rivera</option>
                                <option value="Mario Castellanos">Mario Castellanos</option>
                                <option value="Yenilin Manchamé">Yenilin Manchamé</option>
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

                        <div class="SelectUserNows ReportNextPosition">Siguiente</div>


                    </div>
                
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

            require 'config/com.server.config.php';
            $Connection->set_charset("utf8");


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

<script>
        const files = [
            "Vendor/com.js/com.island.config.js",
            "Vendor/com.js/com.navigation.js",
            "Vendor/com.js/com.frames.js",
            "Vendor/com.js/com.indexer.js",
            "Vendor/com.js/com.filter.js",
            "Vendor/com.js/com.return.js",
            "Vendor/com.js/com.do.month.js",
            "Vendor/com.js/com.custom.report.js"
        ];

        files.forEach(file => {
            const script = document.createElement("script");
            script.src = `${file}?v=${Math.random() * Math.random() * Math.random()}`;
            document.body.appendChild(script);
        });
    </script>


        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<style>

    form input:disabled{

        background-color: #141414;

    }

</style>



