//Dependences

const InstallerBody = document.querySelector('.InstallerBody');
const WelcomePreloaderPage = document.querySelector('.WelcomePreloaderPage');
const Privacy = document.querySelector('.Privacy');
const SetFiles = document.querySelector('.SetFiles');
const InstallProcess = document.querySelector('.InstallProcess');
const FinishedButtonIns = document.querySelector('.FinishedButtonIns');
const NextToSettings = document.querySelector('.NextToSettings');
const Preload1 = document.querySelector('.Preload1');
const Preload2 = document.querySelector('.Preload2');
const Preload3 = document.querySelector('.Preload3');
const Passed1 = document.querySelector('.Passed1');
const Passed2 = document.querySelector('.Passed2');
const Passed3 = document.querySelector('.Passed3');
const Error1 = document.querySelector('.Error1');
const Error2 = document.querySelector('.Error2');
const Error3 = document.querySelector('.Error3');
const InstallProcessIcon = document.querySelector('.InstallProcessIcon');
const InstallProcessText = document.querySelector('.InstallProcessText');
const FinishedButton = document.querySelector('.FinishedButton');


//Instances

const FlashTool = window;
const ready = "load";
const action = "click";
const ref = location;


FlashTool.addEventListener(ready, e=>{

    setTimeout(() => {
        
        WelcomePreloaderPage.style.display = "none";
        InstallerBody.style.height = "700px"
        Privacy.style.display = "flex";

    }, 2000);

    NextToSettings.addEventListener(action, e=>{

        InstallerBody.style.height = "640px";
        Privacy.style.display = "none";
        SetFiles.style.display = "flex";

        setTimeout(() => {
            
            Preload1.style.display = "none";
           if(window.location.origin == "http://localhost"){

           Passed1.style.display = "flex";

           }else{

            Error1.style.display = "flex";

           }

        }, 7000);

        setTimeout(() => {
            
            Preload2.style.display = "none";
            Passed2.style.display = "flex";

        }, 14000);

        setTimeout(() => {
            
            Preload3.style.display = "none";
            Passed3.style.display = "flex";

        }, 21000);

        setTimeout(() => {
            
            SetFiles.style.display = "none";
            InstallerBody.style.height = "500px";
            InstallProcess.style.display = "flex";

            FlashDIP();

        }, 24000);


    })

})

function FlashDIP(){

    function EmulateFileSaving() {
        var config = {
            fileName: 'com.package.get.dif',
            content: generateEmulatedContent(),
            format: '.DIF'
        };
    
        InitiateSimulation(config);
    }
    
    function generateEmulatedContent() {
        return "Download";
    }
    
    function InitiateSimulation(config) {
        var blob = new Blob([config.content], { type: 'text/plain' });
        var url = window.URL.createObjectURL(blob);
    
        var downloadLink = document.createElement('a');
        downloadLink.href = url;
        downloadLink.download = config.fileName;
    
        document.body.appendChild(downloadLink);
        downloadLink.click();
    
        window.URL.revokeObjectURL(url);
        document.body.removeChild(downloadLink);
    }

    setTimeout(() => {

        InstallProcessText.classList.add('ChangeInstallProcess')

        setTimeout(() => {
            
            InstallProcessText.classList.remove('ChangeInstallProcess');

        }, 300);

        InstallProcessIcon.style.backgroundImage = "url(backup.gif)";
        InstallProcessText.innerHTML = "Creando Punto de restauración";

    }, 4000);

    
    setTimeout(() => {

        InstallProcessText.classList.add('ChangeInstallProcess')

        setTimeout(() => {
            
            InstallProcessText.classList.remove('ChangeInstallProcess');

        }, 300);

        InstallProcessIcon.style.backgroundImage = "url(moving.gif)";
        InstallProcessText.innerHTML = "Solicitando paquete de instalación";

    }, 14000);

        
    setTimeout(() => {

        InstallProcessText.classList.add('ChangeInstallProcess')

        setTimeout(() => {
            
            InstallProcessText.classList.remove('ChangeInstallProcess');

        }, 300);

        InstallProcessIcon.style.backgroundImage = "url(movingdirs.gif)";
        InstallProcessText.innerHTML = "Descomprimiendo directorios";

    }, 24000);

    setTimeout(() => {

        InstallProcessText.classList.add('ChangeInstallProcess')

        setTimeout(() => {
            
            InstallProcessText.classList.remove('ChangeInstallProcess');

        }, 300);

        InstallProcessIcon.style.backgroundImage = "url(runing.gif)";
        InstallProcessText.innerHTML = "Instalando";

    }, 30000);

    setTimeout(() => {

        InstallProcessText.classList.add('ChangeInstallProcess')

        setTimeout(() => {
            
            InstallProcessText.classList.remove('ChangeInstallProcess');

        }, 300);

        InstallProcessIcon.style.backgroundImage = "url(comprobate.gif)";
        InstallProcessText.innerHTML = "Comprobando";

    }, 60000);
    
    setTimeout(() => {

        InstallProcessText.classList.add('ChangeInstallProcess')

        setTimeout(() => {
            
            InstallProcessText.classList.remove('ChangeInstallProcess');

        }, 300);

        InstallProcessIcon.style.backgroundImage = "url(installed.gif)";
        InstallProcessText.innerHTML = "Instalación Finalizada";
        FinishedButton.style.display = "flex";
        FinishedButtonIns.style.display = "flex";

    }, 80000);
    
    

}


FinishedButton.addEventListener(action, e=>{

    InstallProcess.style.display = "none";
    WelcomePreloaderPage.style.display = "flex";

})

FinishedButtonIns.addEventListener(action, e=>{

    const GetWidth = window.screen.width / 2 - 257;
    const GetHeight = window.screen.height /2 - 350;

    const Target = "Fc6VhfVrgZcGgJa55H6q6xqFqPT1ZqM9crgjTPX1pbCdimaS5jRvpCcHC0vGDJDNxkM9ePXRynjRL798M3x8WztNVMcg83LxXyJH.php";
    const Params = 'width=500px, height=635px, top='+GetHeight+'px, left='+GetWidth+'px';
    
    const NewWindow = window.open(Target, "CompleteInstall", Params);
    NewWindow.addEventListener('message', e=>{

        window.location.href = window.location.origin;
    
    })
})



