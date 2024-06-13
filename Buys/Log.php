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
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>

    
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
<body style="overflow: hidden;">
    
    <div class="ShowLogPreloader">
        
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

    <?php


        require 'config/com.server.config.php';
        $Connection->set_charset("utf8");


        $GestID = $_GET["GestID"];

        $DoQuery = "SELECT Date, Provider, SpendedBy, PayType, CardUsed, CountableCount, BuyType, BillDescription, BillNumber, Amount, Subtotal, Exempt, ISV18, ISV15, OtherISV, Total FROM logs WHERE GestID = '$GestID'";
        $QueryResults = $Connection -> query($DoQuery);

        if($QueryResults){

            $Row = $QueryResults -> fetch_assoc();

            $Date = $Row["Date"];
            $Provider = $Row["Provider"];
            $SpendedBy = $Row["SpendedBy"];
            $PayType = $Row["PayType"];
            $CardUsed = $Row["CardUsed"];
            $CountableCount = $Row["CountableCount"];
            $BuyType = $Row["BuyType"];
            $BillDescription = $Row["BillDescription"];
            $BillNumber = $Row["BillNumber"];
            $Amount = $Row["Amount"];
            $Subtotal = $Row["Subtotal"];
            $Exempt = $Row["Exempt"];
            $ISV18 = $Row["ISV18"];
            $ISV15 = $Row["ISV15"];
            $OtherISV = $Row["OtherISV"];
            $Total = $Row["Total"];
            $Image = "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.providers/$Provider.png";

            if($PayType === "Efectivo"){

                $PayTypeImage = "Assets/com.img/PayMethods/Money.png";
                $PayMethod = "Pago en efectivo";

            }else if($PayType === "Transferencia"){

                $PayTypeImage = "Assets/com.img/PayMethods/Transference.png";
                $PayMethod = "Pago con Transferencia";

            }else if($PayType === "Botón de Pago"){

                $PayTypeImage = "Assets/com.img/PayMethods/PayButton.png";   
                $PayMethod = "Realizado con botón de pago";

            }else if($PayType ===  "Pago en línea"){

                $PayTypeImage = "Assets/com.img/PayMethods/OnlinePay.png";
                $PayMethod = "Pagado en linea";

            }else if($PayType === "Tarjeta de Crédito"){

                $PayTypeImage = "Assets/com.img/PayMethods/atm-card.png";
                $PayMethod = "Realizado con tarjeta de crédito";


            }

            $Connection->set_charset("utf8");

            
            echo "
            
            <div class='DisplaySelected''>

            <header style='height:105px; top:25px;'>
            
                <div class='Path'>
            
                    <div class='Icon' style='background-image:url(Assets/com.img/report.png); position:absolute; left:15px;top:-8px; width:45px; height:45px;'></div>
                    <t class='Position'>
            
                        <p class='Identifer'>AIH</p>
                        <i class='fi fi-br-angle-small-right'></i>
                        <p class='Identifer'>Sistema de Compras</p>
                        <i class='fi fi-br-angle-small-right'></i>
                        <p class='Identifer'>Detalles del Compra</p>
            
                    </t>
            
            
                </div>
            
                <div class='ReportButtons'>
            
                    <div class='RemoveReport tooltip' data-text='Eliminar'> <i class='fi fi-rr-trash'></i> </div>
                    <div class='EditReport tooltip' data-text='Editar Registro'> <i class='fi fi-rr-pencil'></i> </div>       
                    <div class='ShareReport tooltip' data-text='Compartir reporte'> <i class='fi fi-ss-refer'></i> </div>
                    <div class='PrintReport tooltip' data-text='Imprimir Reporte'><i class='fi fi-rr-print'></i></div>
            
                </div>
            
            </header>
            
            <div class='Content'>
            
                <div class='DetailsHeader'>
            
                    <div class='ProviderDetails'>
            
                        <div class='Logo' slot='$Image'></div>
                        <div class='ProviderName'>Compra realizado en $Provider</div>
                        <div class='SpentType'>$CountableCount</div>
                        <div class='PaidDetail'>Pagado con:</div>
                        <div class='PaidResult tooltip' data-text='$PayMethod' style='background-image:url($PayTypeImage)'></div>
            
                    </div>
                    
                    <div class='EnterpriseLogo'></div>
            
                </div>
            
                
                <div class='TransactionDetails'>
            
                    <t>Detalles de la transacción</t>
            

                    $Connection->set_charset('utf8');

                        <div class='Row'>
            
                            <div class='GestID' style='width:300px;'>ID : $GestID</div>

                            <form action='Print.php' method='get' class='PrintForm' hidden>

                                <input type='text' name='GestID' value='$GestID' class='GestIDs'>
                                <input type='text' name='From' class='PrinterUser'>

                            </form>


                            <div class='Date'>Fecha: $Date</div>
                            <div class='Provider' style='width:300px;'>Proveedor: $Provider</div>
                            <div class='SpentedBy' style='width:360px;'>Gastado por: $SpendedBy</div>
            
                        </div>
                        <div class='Row'>
            
                            <div class='PayType' style='width:270px;'>Tipo de pago: $PayType</div>
                            <div class='PayUsed'>Tarjeta usada: $CardUsed</div>
                            <div class='CountableCount' style='width:270px'>Cuenta Contable: $CountableCount</div>
                            <div class='BuyType'>Tipo de compra: $BuyType</div>
            
                        </div>
                        <div class='Row Price Exents' style='margin-top:20px; height:80px; position:relative; '>
                    
                            <div style='width:385px; display:flex; justify-content:left; padding-left:15px; bottom:0px; position:relative '> 
                            <label for='1' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Descripción del Compra:</label>
                            $BillDescription
                            </div>
        
        
                            <div style='width:385px; display:flex; justify-content:left; padding-left:15px; bottom:0px; position:relative'>
                            <label for='2' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>NO. de Factura: </label>
                            $BillNumber</div>
        
        
                            <div style='width:105px; bottom:0px; position:relative'>
                            <label for='3' style='color:#9b9b9b; font-family: GI; position:absolute; left:18px; top:-25px;'>Cantidad</label>
        
                            $Amount</div>
        
                            <div style='width:215px; display:flex; justify-content:left; padding-left:15px; bottom:0px; position:relative'>
                            <label for='4' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Exento</label>
                            $Exempt</div>
            
            
                        </div>


                        <div class='Row Price Exents' style='width:90%; margin-top:20px; height:80px; position:relative; display:flex; justify-content:left; padding-left:30px;'>
                    
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='1' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Subtotal</label>
                            L. $Subtotal</div>
        
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='2' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px;top:-25px;'>Otros Impuestos</label>
                            $OtherISV</div>
        
                            <div style='width:215px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='4' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>ISV 15%</label>
                            $ISV15</div>

                            
                            <div style='width:415px; position:relative; justify-content:left; padding-left:20px;'>
                            <label for='3' style='color:#9b9b9b; font-family: GI; position:absolute; left:10px; top:-25px;'>Observaciones</label>
                            $ISV18</div>
        
            
            
                        </div>
            
                        <div class='Result' style='font-size:28px'>$Total</div>
            
                </div>
            
            
            </div>
            
        </div>
        

            ";


        }else{

            echo "!!ERROR!!";

        }

    ?>

</body>

<script>

    const LocationFileForShow = "Vendor/com.js/com.show.js";
    const NewShow = document.createElement("script");
    NewShow.src = LocationFileForShow+"?v="+Math.random();
    document.body.appendChild(NewShow);

</script>

</html>

