





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la búsqueda</title>
    <link rel="stylesheet" href="../../com.config.css">
    <link rel="shortcut icon" href="../../../../../../root/DS_Logo_SF.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../../../Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../../../../../Fonts/IndexFontsRoboto.css">
    <link rel="stylesheet" href="../../../../../Fonts/IndexFontsInter.css">
    
</head>
<body class="DeviceBody">

<div class="BackButton"></div>

<script>

document.querySelector('.BackButton').addEventListener('click', e=>{

    window.location.href = "../../";

})

</script>
    
    
    <div class="ContainerResults">

    <?php

    $ServerName = "localhost";
    $UserName = "root";
    $Password = "";

    $Connection = new mysqli($ServerName, $UserName, $Password, "Projects");

    $GetFilterStatus = $_GET["Filter"];
    $GetAllDevTestResults = "SELECT TestID, Brand, Model, Serial, ScreenTest, TouchPadTest, TouchScreenTest, LeftSpeakerTest, RightSpeakerTest, UsbPortsTest, HdmiPortTest, BatteryLifePercentage, ChargerTest, MicrophoneTest, CameraTest, KeyboardTest, TestStatus, TestCode FROM DevTestResults WHERE TestStatus = '$GetFilterStatus'";
    $GetConsultResults = $Connection->query($GetAllDevTestResults);
    
    if($GetConsultResults -> num_rows > 0){

        while($Row = $GetConsultResults -> fetch_assoc()){

            $GetTestID = $Row["TestID"];
            $GetBrand = $Row["Brand"];
            $GetModel = $Row["Model"];
            $GetSerial = $Row["Serial"];
            $GetScreenTest = $Row["ScreenTest"];
            $GetTouchPadTest = $Row["TouchPadTest"];
            $GetTouchScreenTest = $Row["TouchScreenTest"];
            $GetLeftSpeakerTest = $Row["LeftSpeakerTest"];
            $GetRightSpeakerTest = $Row["RightSpeakerTest"];
            $GetUsbPortsTest = $Row["UsbPortsTest"];
            $GetHdmiPortTest = $Row["HdmiPortTest"];
            $GetBatteryLifePercentage = $Row["BatteryLifePercentage"];
            $GetChargerTest = $Row["ChargerTest"];
            $GetMicrophoneTest = $Row["MicrophoneTest"];
            $GetCameraTest = $Row["CameraTest"];
            $GetKeyboardTest = $Row["KeyboardTest"];
            $GetTestStatus = $Row["TestStatus"];
            

            $GetScreenTest = $Row["ScreenTest"];
            if ($GetScreenTest == "true") {
                $ScreenTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetScreenTest == "false") {
                $ScreenTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetScreenTest == "null") {
                $ScreenTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetTouchPadTest = $Row["TouchPadTest"];
            if ($GetTouchPadTest == "true") {
                $TouchPadTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetTouchPadTest == "false") {
                $TouchPadTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetTouchPadTest == "null") {
                $TouchPadTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetTouchScreenTest = $Row["TouchScreenTest"];
            if ($GetTouchScreenTest == "true") {
                $TouchScreenTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetTouchScreenTest == "false") {
                $TouchScreenTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetTouchScreenTest == "null") {
                $TouchScreenTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetLeftSpeakerTest = $Row["LeftSpeakerTest"];
            if ($GetLeftSpeakerTest == "true") {
                $LeftSpeakerTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetLeftSpeakerTest == "false") {
                $LeftSpeakerTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetLeftSpeakerTest == "null") {
                $LeftSpeakerTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetRightSpeakerTest = $Row["RightSpeakerTest"];
            if ($GetRightSpeakerTest == "true") {
                $RightSpeakerTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetRightSpeakerTest == "false") {
                $RightSpeakerTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetRightSpeakerTest == "null") {
                $RightSpeakerTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetUsbPortsTest = $Row["UsbPortsTest"];
            if ($GetUsbPortsTest == "true") {
                $UsbPortsTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetUsbPortsTest == "false") {
                $UsbPortsTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetUsbPortsTest == "null") {
                $UsbPortsTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetHdmiPortTest = $Row["HdmiPortTest"];
            if ($GetHdmiPortTest == "true") {
                $HdmiPortTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetHdmiPortTest == "false") {
                $HdmiPortTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetHdmiPortTest == "null") {
                $HdmiPortTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetChargerTest = $Row["ChargerTest"];
            if ($GetChargerTest == "true") {
                $ChargerTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetChargerTest == "false") {
                $ChargerTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetChargerTest == "null") {
                $ChargerTestValue = ' <ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetMicrophoneTest = $Row["MicrophoneTest"];
            if ($GetMicrophoneTest == "true") {
                $MicrophoneTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetMicrophoneTest == "false") {
                $MicrophoneTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetMicrophoneTest == "null") {
                $MicrophoneTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetCameraTest = $Row["CameraTest"];
            if ($GetCameraTest == "true") {
                $CameraTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetCameraTest == "false") {
                $CameraTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetCameraTest == "null") {
                $CameraTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }

            $GetKeyboardTest = $Row["KeyboardTest"];
            if ($GetKeyboardTest == "true") {
                $KeyboardTestValue = '<ion-icon name="checkmark-circle-outline" style="color:#1ED761" title="Pasó la prueba" class="ResultIcon"></ion-icon>';
            } elseif ($GetKeyboardTest == "false") {
                $KeyboardTestValue = '<ion-icon name="build-outline" style="color:#FF0000" title="Se requiere reparación" class="ResultIcon"></ion-icon>';
            } elseif ($GetKeyboardTest == "null") {
                $KeyboardTestValue = '<ion-icon name="remove-circle-outline" style="color:#f77113" title="El test no evaluó esto." class="ResultIcon"></ion-icon>';
            }


                echo "
                
                <div class='Result'>

                    <header>

                        <p class='CardTitle'>$GetBrand $GetModel</p>
                        <a href='EditLog.php?testID=$GetTestID'> <ion-icon name='create-outline' class='CardUIButton2' title='Editar Detalles'></ion-icon> </a>
                        <a href='DeleteLog.php?testID=$GetTestID'> <ion-icon name='trash-outline' class='CardUIButton1' title='Liberar Registro'></ion-icon> </a>
                        <a href='#?testID=$GetTestID'> <ion-icon name='print-outline' class='CardUIButton3' title='Imprimir Certificado'></ion-icon> </a>
                         <a href='Product?testID=$GetTestID'><ion-icon name='eye-outline' class='CardUIButton4'></ion-icon> </a>

                    </header>

                    <div class='ResultCardBody'>

                        <p>Test ID: <rs class='TextResult'>$GetTestID</rs> </p>
                        <p>Marca: <rs class='TextResult'>$GetBrand</rs></p>
                        <p>Modelo: <rs class='TextResult'>$GetModel</rs></p>
                        <p>Serie: <rs class='TextResult'>$GetSerial</rs></p>
                        <p>Test de Pantalla: $ScreenTestValue</p>
                        <p>Test de TouchPad: $TouchPadTestValue</p>
                        <p>Test de TouchScreen:$TouchScreenTestValue</p>
                        <p>Test de Altavoz Derecho:$RightSpeakerTestValue</p>
                        <p>Test de Altavoz Izquierdo:$LeftSpeakerTestValue</p>
                        <p>Test de Puertos USB:$UsbPortsTestValue</p>
                        <p>Test de Puerto HDMI:$HdmiPortTestValue</p>
                        <p>Test de Cargador: $ChargerTestValue</p>
                        <p>Test de Micrófono:$MicrophoneTestValue</p>
                        <p>Test de Cámara:$CameraTestValue</p>
                        <p>Test de Teclado:$KeyboardTestValue</p>
                        <p>Porcentaje de batería:<rs class='TextResult' style='margin-top:5px'>$GetBatteryLifePercentage%</rs></p>
                        <p>Estado de Prueba:<rs class='TextResult' style='margin-top:3px;'>$GetTestStatus</rs></p>


</div>

</div>

                
                ";

        }

    }else{

        echo "<p style='color:#1c1c1c; font-family:caviarDreamsBold'>No hay dispositivos registrados con este filtro.</p>";

    }

?>

    </div>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>