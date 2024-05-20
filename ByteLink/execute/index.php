<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Test de PC</title>
    <link rel="shortcut icon" href="../../../root/testIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/com.main.css">
    <link rel="stylesheet" href="../../../root/animate.min.css">

    <link rel="stylesheet" href="../../../root/Fonts/IndexFontsCaviarDreams.css">
    <link rel="stylesheet" href="../../../root/Fonts/IndexFontsInter.css">
    <link rel="stylesheet" href="../../../root/Fonts/IndexFontsRoboto.css">

</head>
<body>


    <div class="PreloaderPage" style="display: flex;">

        <div class="showbox">
            <div class="loader">
              <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
              </svg>
            </div>
          </div>

    </div>

    <div class="SettingsPage" style="display: none;">

        <div class="LogoContainer"> <div class="logo"></div> </div>
        <t>Test de estación de trabajo</t>

        <div class="TestOptions">

            <div class="TestMode001">Analisis del equipo</div>
            <div class="DeviceIsTested">Analisis del equipo</div>
            <div class="TestMode002">Seleccionar exámenes</div>
            <div class="TestMode003">Estresar equipo</div>
            <div class="TestMode004">Diagnosticar Equipo</div>
            <div class="ViewCertificate">Ver Certificado de Prueba</div>
            

            <?php
$ServerName = "localhost";
$UserName = "root";
$Password = "";

$Connection = new mysqli($ServerName, $UserName, $Password, "Projects");

if ($Connection->connect_error) {
    die("Error de conexión a la base de datos: " . $Connection->connect_error);
}

$DoConsult = "SELECT Serial FROM DevTestResults";
$ConsultResults = $Connection->query($DoConsult);

if ($ConsultResults->num_rows > 0) {
    // Crear una matriz para almacenar todas las series de la base de datos
    $serials = [];

    while ($Row = $ConsultResults->fetch_assoc()) {
        $serials[] = $Row["Serial"];
    }

    echo "<script>";
    echo "var databaseSerials = " . json_encode($serials) . ";"; // Pasa las series a JavaScript
    echo "var localStorageSerial = localStorage.getItem('TestSerial');";

    echo "
        if (localStorageSerial) {
            if (databaseSerials.includes(localStorageSerial)) {
                document.querySelector('.DeviceIsTested').style.display = 'flex';
                document.querySelector('.TestMode001').style.display = 'none';
            } else {
                document.querySelector('.DeviceIsTested').style.display = 'none';
                document.querySelector('.TestMode001').style.display = 'flex';
            }
        } else {
            document.querySelector('.DeviceIsTested').style.display = 'none';
            document.querySelector('.TestMode001').style.display = 'flex';
        }
    ";
    echo "</script>";
} else {
    echo "No se encontraron registros en la base de datos.";
}

$Connection->close();
?>



        </div>


        <div class="TestUsersContainer">
        <div class="TestUsers">

            <?php

                /*ServerName = "localhost";
                $UserName = "root";
                $Password = "";

                $Connection = new mysqli($ServerName, $UserName, $Password, "organization");   
                $GetAllProfilePhotos = "SELECT ProfilePhoto, Name FROM users";
                $ConsultResult = $Connection -> query($GetAllProfilePhotos);

                if($ConsultResult -> num_rows > 0){

                    while($Row = $ConsultResult -> fetch_assoc()){

                        $ProfilePhoto = $Row["ProfilePhoto"];
                        $Name = $Row["Name"];

                        echo "<div style='background-image:url(../../../root/Priv_US/ProfilePhotos/$ProfilePhoto)' title='$Name'></div>";

                    }

                }else{

                    echo "No hay usuarios disponibles";

                }*/

            ?>
        

        </div>

        </div>

        <div class="button StartTestButton" style="background-color:#7668AF; position:absolute; bottom:90px;">Empezar</div>
        <div class="FirstFormError">Error</div>

    </div>

    <div class="Tests" style="display: none;">

        <header class="TestsHeader">

            <div class="Notch"></div>

        </header>

       <div class="TestBody">

        <div class="DetectDevice" style="display: none;">

            <div class="WhileScan">

                <t>Detectando tu equipo, esto podría tardar <br> unos minutos</t>
                <div class="PrivacyDeclaration">

                    <div class="icon"></div>
                    <p style="color:#9b9b9b">Esto recopila identificadores de hardware del equipo con la finalidad de identificarlo y examinarlo en nuestro servicio.</p>

                </div>

            </div>

            <div class="DetectionError" style="display: none;">

                <p style="font-size:25px; color:#9b9b9b">No se pudo ejecutar la detección automatica</p>

            </div>

            <div class="GetDeviceInformation" style="display: none;">

                <div class="Form Form001">

                    <t style="font-size:20px; position:absolute; top:20px;">Debes ingresar los datos tu mismo</t>
                    <input type="text" placeholder="Marca" class="GetDeviceBrand">
                    <input type="text" placeholder="Modelo" class="GetDeviceModel"> 
                    <input type="text" placeholder="Serie" class="GetDeviceSerial">
                    <bt class="button SendFormWithCompleteData" style="background-color: #7668AF; width: auto; position:absolute; bottom:30px; height:25px;">Enviar</bt>

                </div>

            </div>

            <div class="Results001" style="display: none;">

                <div class="PcInformation">

                    <div class="BrandImage Image"></div>
                    <div class="AllInfo">Dispositivo Desconocido</div>
                    <p class="Brand BrandStyles">Marca: Desconocida</p>
                    <div class="OtherInfo">

                        <div class="Model">Modelo: XXXX</div> <st style="font-size:40px; margin-left:10px; margin-right:10px; color:#9b9b9b">•</st>
                        <div class="Serial">Serie: XXXX</div>


                    </div>

                    <div class="SystemIcon"></div>

                </div>

                <div class="OtheSystemInformation">

                    <p class="OsVersion">Sistema Operativo: Desconocido</p>
                    <p class="ProcesorBase">Arquitectura: Procesador desconocido</p>
                    <p class="GPUInfo">Controlador de gráficos básico de DevLabs </p>
                    <p class="TestID">ID del testeo (Generado por el sistema): 00000000000000</p>


                </div>

                <div class="LinksBar">

                    <bt class="button BackToDetect" style="background-color:#1ED761; position:absolute; left: 30px;">Volver a detectar</bt>
                    <bt class="button SaveInfo" style="background-color: #7668AF; position:absolute; right:30px;">Continuar</bt>

                </div>

            </div>

        </div>

        <div class="ScreenTest" style="display: none; background-color: #000000;">

            <div class="IconPage IconScreenTest">
                <icon></icon>
                <t style="font-size:20px; color:#FFFFFF;">Exámen de Pantalla</t>
            </div>

            <div class="screenInfo">Iniciando prueba...</div>

            <div class="testUniformity" style="background-color: gray;">Verifica uniformidad del color.</div>
            <div class="testColorDistance">
                <div style="background-color: red;">1</div>
                <div style="background-color: #ff6666;">2</div>
                <div style="background-color: #ffcccc;">3</div>
            </div>
            <div class="testGradient" style="background: linear-gradient(red, blue);">Verifica degradado.</div>
            <div class="testSharpness" style="background-color: white;">
                <p>Verifica la nitidez de este texto.</p>
            </div>
            <div class="testViewAngle" style="background-color: #0f0;">Mueve tu cabeza y verifica el color.</div>
            <div class="testResponseTime">
                <div class="movingBox"></div>
            </div>
            

        </div>

        <div class="FormErrorScreenTest" style="background-color: #000000; display: none;">

            <div class="Form">

                <label for="SelectWhereAreTheError" style="position:absolute; top:30px; color:#9b9b9b">Selecciona dónde viste el problema</label>
                <select name="SelectWhereAreTheError" class="SelectWhereAreTheError" style="font-size:13px;">
    
                    <option value="0">Selecciona una opción</option>
                    <option value="Part001">Uniformidad de color</option>
                    <option value="Part002">Distancias de color</option>
                    <option value="Part003">Degradado</option>
                    <option value="Part004">Nitidez del texto</option>
                    <option value="Part005">Verificación del texto</option>
                    <option value="Part006">Nitidez del texto</option>
                    <option value="Part007">Pixeles muertos en rojo</option>
                    <option value="Part008">Pixeles muertos en verde</option>
                    <option value="Part009">Pixeles muertos en azul</option>
                    <option value="Part010">Pixeles muertos en blanco</option>
                    <option value="Part011">Pixeles muertos en negro</option>
    
                </select>
                <input type="text" class="GetUserInformationForScreenError" placeholder="¿Qué error notaste en la prueba?" style="position:absolute; top: 140px; font-size: 13px;">
                <bt class="button SendScreenReport" style="background-color:#7668AF; position:absolute; bottom:20px;">Continuar</bt>

            </div>

        </div>        

        <div class="TouchPadTest" style="display: none;">

            <div id="circle"><p>Haz click aquí</p></div>
            <div id="instruction">Selecciona la siguiente frase: "Texto aleatorio para selección de prueba"</div>
        </div>
        
        <div class="TouchScreenTest" style="display: none;">

            <div id="touchCircle">Toca aquí</div>
            <div id="touchInfo"></div>

        </div>

        <div class="SpeakersTest" style="display:none;">

            <div class="speakers">

                <div class="LeftSpeaker SpeakerIDN"></div>
                <div class="RightSpeaker SpeakerIDN"></div>

            </div>
            <div class="labels">
                <p id="labelLeft" style="position:absolute; left: 180px; bottom:180px; font-size:30px;color:#9b9b9b">L</p>
                <p id="labelRight" style="position:absolute; right: 180px; bottom:180px; font-size:30px; color:#9b9b9b">R</p>
            </div>
            <button id="testButton" class="button TestButton" style="background-color: #7668AF; margin-top:20px; transition:all 300ms;" onclick="startTest()">Iniciar Prueba</button>
            
            <div id="userCheck" style="display: none; transition:all 300ms;">
                <p id="question"></p>
                <button class="ChooseButton" onclick="setResult(true)">Sí</button>
                <button class="ChooseButton" onclick="setResult(false)">No</button>
            </div>

        </div>

        <div class="USBPORTSTEST" style="display:none;">
            <label for="usbPorts" style="font-size:28px;">¿Cuántos puertos USB tiene esta PC?</label>
            <p class="InformationForPortsTest" style="color:#FFFFFF; margin-top:30px;">Escribe la cantidad de puertos USB tipo "A", luego conecta una unidad usb certificada</p>

            <input type="number" id="usbPorts" min="1" max="6" required>
            <button onclick="askForFiles()" class="button" style="background-color:#7668AF; margin-top:50px;">Siguiente</button>
    
            <div id="fileInputs">

            </div>
        </div>

        <div class="HDMIPORTTEST" style="display:none;">
            <h1 style="color:#FFFFFF">¿Vas a probar el puerto HDMI?</h1>
            <button onclick="generateCode()" style="width:60px;">Sí</button>
            <button onclick="cancelTest()">No</button>
    
            <div id="codeContainer" class="hidden">
                <label for="codeInput">Ingresa el código que ves en la pantalla HDMI:</label>
                <input type="text" id="codeInput">
                <button onclick="checkCode()">Verificar</button>
                <p id="result"></p>
            </div>
        </div>

        <div class="BatteryTest" style="display: none;">

            <div class="SelectFileButton"> <input type="file" style="display: flex;" id="fileInput" class="ChooseFile" accept=".html"/> <p>Selecciona el archivo</p> </div>

            <iframe id="iframeDisplay"></iframe>

            <div class="form-section">
                <p>Busca "FULL CHARGE CAPACITY"</p>
                <input type="number" id="fullChargeCapacity" placeholder="Escribelo aquí">
                
                <p>Busca "DESIGN CAPACITY"</p>
                <input type="number" id="designCapacity" placeholder="Escribelo aquí">
                
                <button onclick="calculate()" class="button" style="background-color: #7668AF; position: relative;top:20px;margin-bottom: 50px; left:calc(50% - 49px)">Calcular</button>
                <p id="result" class="OpResult">0</p>

                <div class="button NextStepBatteryToCharger" style="background-color: #7668AF;">Continuar</div>
            </div>

        </div>

        <div class="ChargeTest" style="display:none;">
            <button id="abrirVentana" class="OpenChargerTest button" style="background-color: #7668AF;">Ejecutar Prueba de Cargador</button>
            <p id="resultado" style="display: none;"></p>
        </div>

        <div class="MicTest" style="display: none;">

            <button id="openPopup" class="button" style="background-color: #7668AF;">Ejecutar Test de Mircrofono</button>
            <div class="MicStatus" style="display: none;"></div>

        </div>

        <div class="CameraTest" style="display: none; display: none;">

            <button id="openPopup2" class="button" style="background-color: #7668AF;">Ejecutar Test de Cámara</button>
            <div class="CamStatus" style="display: none;"></div>

        </div>


        <div class="KeyboardTest" style="display: none;">

            <div id="keyboard"></div>
            <div id="generatedText"></div>

        </div>

        </div>

       </div>

    <div class="FinishTest" style="display:none;">

        <p style="color:#FFFFFF"></p>

    </div>
    </div>

    <form action="save.php" method="post" class="ControlForm hide">

        <!--Detect Device-->
        <input type="text" name="ShareTestID" class="TestIDValue">
        <input type="text" name="ShareBrand" class="BrandIn">
        <input type="text" name="ShareModel" class="ModelIn">
        <input type="text" name="ShareSerial" class="SerialIn">
        <!--Detect Device-->

        <!--Tests-->
        <input type="text" name="ShareScreenTest" class="ScreenTestIn">
        <input type="text" name="ShareErrorType" class="ErrorType">
        <input type="text" name="ShareErrorNote" class="ErrorNote">
        <input type="text" name="ShareTouchPadTest" class="TouchPadTestIn">
        <input type="text" name="ShareTouchScreenTest" class="TouchScreenTestIn">
        <input type="text" name="ShareLeftSpeakerTest" class="LeftSpeakerTest">
        <input type="text" name="ShareSpeakerTest" class="SpeakersTests">
        <input type="text" name="ShareRightSpeakerTest" class="RightSpeakerTest">
        <input type="text" name="ShareUsbPortsTest" class="UsbPortsTest">
        <input type="text" name="ShareHdmiPortTest" class="HdmiPortTest">
        <input type="text" name="ShareBatteryLifePercentage" class="BatteryLifePercentage">
        <input type="text" name="ShareChargerTest" class="ChargerTest">
        <input type="text" name="ShareMicrophoneTest" class="MicrophoneTest">
        <input type="text" name="ShareCameraTest" class="CameraTestIn">
        <input type="text" name="ShareKeyboardTest" class="KeyboardTestIn">
        <!--Tests-->
                

    </form>

    <script>

        function ChangeNotch(){

            const Notch = document.querySelector('.Notch');

            Notch.classList.add('ShowNotch001');

            setTimeout(() => {
                
                Notch.classList.remove('ShowNotch001');
                Notch.style.backgroundImage = "none";

            }, 3000);


        }



    </script>

</body>

<script src="../Vendor/JS/com.main.js"></script>
<script src="../SRC/GetPCInformation.js"></script>
<script src="../Vendor/JS/Tests/screen.test.js"></script>
<script src="../Vendor/JS/Tests/touchpad.test.js"></script>
<script src="../Vendor/JS/Tests/touchScreen.test.js"></script>
<script src="../Vendor/JS/Tests/keyboard.test.js"></script>
<script src="../Vendor/JS/Tests/speaker.test.js"></script>
<script src="../Vendor/JS/Tests/usb.ports.test.js"></script>
<script src="../Vendor/JS/Tests/hdmi.ports.test.js"></script>
<script src="../Vendor/JS/Tests/battery.test.js"></script>
<script src="../Vendor/JS/Tests/charger.test.js"></script>
<script src="../Vendor/JS/Tests/mic.test.js"></script>
<script src="../Vendor/JS/Tests/cam.test.js"></script>
<script src="../Vendor/JS/com.validations.js"></script>
<script src="../Vendor/JS/com.detect.keyboardTest.js"></script>
<script src="../Vendor/JS/com.test.handler.js"></script>
<script src="../Vendor/JS/com.events.handler.js"></script>
<script src="../Vendor/JS/com.saver.handler.js "></script>

<script>

    const Notch = document.querySelector('.Notch');

</script>

</html>



<div class="Obsolet hide">

    <input type="text" class="WriteTesterName" name="DeviceTester">
    <input type="text" class="WriteDeviceBrand" name="DeviceBrand">
    <input type="text" class="WriteDeviceModel" name="DeviceModel">
    <input type="text" class="WriteDeviceSerial" name="DeviceSerial">
    <input type="text" class="WriteScreenTest" name="ScreenTest">
    <input type="text" class="WriteTouchPadTest" name="Touchpad">
    <input type="text" class="WriteTouchScreen" name="TouchScreen">
    <input type="text" class="WriteKeyboardTest" name="KeyboardTest">

    <!--Error Reports-->
    <input type="text" class="WriteWhereErrorScreen">
    <input type="text" class="CommentScreenError">


</div>



<script>

    window.addEventListener('click', e=>{

        document.querySelector('.CameraTest').style.display = "none";

    })

</script>