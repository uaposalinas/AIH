const GetDeviceBrand = document.querySelector('.GetDeviceBrand');
const GetDeviceModel = document.querySelector('.GetDeviceModel');
const GetDeviceSerial = document.querySelector('.GetDeviceSerial');
const SendFormWithCompleteData = document.querySelector('.SendFormWithCompleteData');

SendFormWithCompleteData.addEventListener('click', ValidateInputsInformation) 

GetDeviceSerial.addEventListener('keyup', e=>{

    const GetKey = e.keyCode;

    if(GetKey == 13){

        ValidateInputsInformation();

    }

})

function ValidateInputsInformation(){

    const GetDeviceBrand = document.querySelector('.GetDeviceBrand');
    const GetDeviceModel = document.querySelector('.GetDeviceModel');
    const GetDeviceSerial = document.querySelector('.GetDeviceSerial');


    const NewObject = {

        Brand: GetDeviceBrand.value.toUpperCase(),
        Model: GetDeviceModel.value.toUpperCase(),
        Serial: GetDeviceSerial.value.toUpperCase()

    }

    const PackInformation = JSON.stringify(NewObject);

    if(GetDeviceBrand.value.trim() === "" || GetDeviceModel.value.trim() === "" || GetDeviceSerial.value.trim() === ""){

        alert('Debes llenar todos los campos');

    }else{

        localStorage.setItem('CurrentTestDeviceInformation', PackInformation);
        Notch.style.backgroundImage = "url(../Assets/UI/PCIdentified.gif)"
        ChangeNotch();
        WriteResultsInformation();

    }


    function WriteResultsInformation(){

        const Results001 = document.querySelector('.Results001')
        const GetDeviceInformation = document.querySelector('.GetDeviceInformation');
        const Brand = document.querySelector('.Brand');
        const Model = document.querySelector('.Model');
        const Serial = document.querySelector('.Serial');
        const AllInfo = document.querySelector('.AllInfo');
        const BrandImage = document.querySelector('.BrandImage');
        const SystemIcon = document.querySelector('.SystemIcon');

        const WriteDeviceBrand = document.querySelector('.WriteDeviceBrand');
        const WriteDeviceModel = document.querySelector('.WriteDeviceModel');
        const WriteDeviceSerial = document.querySelector('.WriteDeviceSerial');

        const UnpackDeviceInformation = JSON.parse(localStorage.getItem('CurrentTestDeviceInformation'));

        document.querySelector('.BrandIn').value = UnpackDeviceInformation.Brand.toUpperCase();
        document.querySelector('.ModelIn').value = UnpackDeviceInformation.Model.toUpperCase();
        document.querySelector('.SerialIn').value = UnpackDeviceInformation.Serial.toUpperCase();

        if(UnpackDeviceInformation.Brand == "DELL"){

            BrandImage.style.backgroundImage = "url(../Assets/Products/Brand/Dell/dell.png)";

        }else if(UnpackDeviceInformation.Brand == "HP"){

            BrandImage.style.backgroundImage = "url(../Assets/Products/Brand/HP/hp.png)";

        }else if(UnpackDeviceInformation.Brand == "LENOVO"){

            BrandImage.style.backgroundImage = "url(../Assets/Products/Brand/Lenovo/lenovo.png)"


        }else if(UnpackDeviceInformation.Brand == "MAC" || UnpackDeviceInformation.Brand == "MACBOOK" || UnpackDeviceInformation.Brand == "MACBOOK PRO" || UnpackDeviceInformation.Brand == "MACS" || UnpackDeviceInformation.Brand == "MACBOOK STUDIO"){

            BrandImage.style.backgroundImage = "url(../Assets/Products/Brand/MacBook/apple-logo.png)"


        }else{

            BrandImage.style.backgroundImage = "url(../Assets/Products/Brand/unknown.png)"


        }

        if(navigator.platform == "Win32" || navigator.platform == "Win64"){

            document.querySelector('.SystemIcon').style.backgroundImage = "url(../Assets/Products/OS/windows.png)";


        }else  if(navigator.platform == "MacIntel" || navigator.platform == "MacPPC" || navigator.platform == "Mac68K"){

            document.querySelector('.SystemIcon').style.backgroundImage = "url(../Assets/Products/OS/macOs.png)";


        }else  if(navigator.platform == "Linux x86_64" || navigator.platform == "Linux i686" || navigator.platform == "Linux armv7l"){

            document.querySelector('.SystemIcon').style.backgroundImage = "url(../Assets/Products/OS/Linux.png)";


        }

        function getOS() {
            const userAgent = window.navigator.userAgent;
        
            if (userAgent.indexOf("Windows NT 10.0") !== -1) return "Windows 10 o Windows 11";
            if (userAgent.indexOf("Windows NT 6.3") !== -1) return "Windows 8.1";
            if (userAgent.indexOf("Windows NT 6.2") !== -1) return "Windows 8";
            if (userAgent.indexOf("Windows NT 6.1") !== -1) return "Windows 7";
            if (userAgent.indexOf("Windows NT 6.0") !== -1) return "Windows Vista";
            if (userAgent.indexOf("Windows NT 5.1") !== -1) return "Windows XP";
            if (userAgent.indexOf("Windows NT 5.0") !== -1) return "Windows 2000";
            // Añade aquí más versiones si lo necesitas
        
            return "Unknown OS"; // Si no coincide con ninguno de los anteriores
        }
        
        document.querySelector('.OsVersion').innerHTML = "Sistema Operativo: " +  getOS();

        function getSystemArchitecture() {
            const platform = navigator.platform.toLowerCase();
        
            // Determinar arquitectura basada en la plataforma
            if (platform.indexOf('win32') !== -1 || platform.indexOf('win64') !== -1) {
                if (navigator.userAgent.indexOf("WOW64") !== -1 || 
                    navigator.userAgent.indexOf("Win64") !== -1) {
                    return 'Sistema de 64 Bits';
                } else {
                    return 'Sistema de 32 Bits';
                }
            }
        
            if (platform.indexOf('linux') !== -1) {
                if (platform.indexOf('x86_64') !== -1) {
                    return 'Sistema de 64 Bits';
                } else {
                    return 'Sistema de 32 Bits';
                }
            }
        
            if (platform.indexOf('mac') !== -1) {
                // La mayoría de las Macs modernas son Sistema de 64 Bits
                return 'Sistema de 64 Bits';
            }
        
            // Añadir más casos si es necesario
        
            return 'Unknown architecture';
        }
        
        document.querySelector('.ProcesorBase').innerHTML = "Arquitectura del Procesador: "+ getSystemArchitecture();
        
        
        function getGPUInfo() {
            const canvas = document.createElement('canvas');
            let gl;
        
            try {
                gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
            } catch (e) {
                return "No se pudo obtener el contexto WebGL.";
            }
        
            if (!gl) {
                return "WebGL no está soportado por tu navegador.";
            }
        
            const debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
        
            if (!debugInfo) {
                return "No se pudo obtener la extensión WEBGL_debug_renderer_info.";
            }
        
            const vendor = gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL);
            const renderer = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);
        
            return `${vendor} | ${renderer}`;
        }
        
        
        document.querySelector('.GPUInfo').innerHTML = "Controlador de Gráficos: " +getGPUInfo().substr(21,100);

        const GetCurrentDate = new Date();

const TestID = document.querySelector('.TestID')
const GetYear = GetCurrentDate.getFullYear();
const GetMonth = GetCurrentDate.getMonth();
const GetDay = GetCurrentDate.getDate();

function GenerateUniqueID() {

    return Math.floor(Math.random() * 1000000) + 1;

}

var ID = GenerateUniqueID().toString().padStart(6, '0');
console.log(ID);


const ArrayMonths = [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", ]

    if(GetMonth < 9){

        TestID.innerHTML = "ID del testeo: "+GetYear+ 0 +ArrayMonths[GetMonth]+GetDay+ID;
        document.querySelector('.TestIDValue').value = GetYear+ 0 +ArrayMonths[GetMonth]+GetDay+ID;

    }else if(GetDay < 9){

        TestID.innerHTML = "ID del testeo: "+GetYear+ArrayMonths[GetMonth]+ 0 + GetDay+ID;
        document.querySelector('.TestIDValue').value = GetYear+ArrayMonths[GetMonth]+ 0 + GetDay+ID;

    }else{

        TestID.innerHTML = "ID del testeo: "+GetYear+ArrayMonths[GetMonth]+GetDay+ID;
        document.querySelector('.TestIDValue').value = GetYear+ArrayMonths[GetMonth]+GetDay+ID;

        

    }

        

        AllInfo.innerHTML = UnpackDeviceInformation.Brand + " "+UnpackDeviceInformation.Model;
        Brand.innerHTML = "Marca: "+UnpackDeviceInformation.Brand;
        Model.innerHTML = "Modelo: "+UnpackDeviceInformation.Model;
        Serial.innerHTML = "Serie: "+UnpackDeviceInformation.Serial;

        setTimeout(() => {

            GetDeviceInformation.style.display = "none";
            Results001.style.display = "flex"

        }, 4000);

    }

}


