const PreloaderPage = document.querySelector('.PreloaderPage');
const SettingsPage = document.querySelector('.SettingsPage');
const Tests = document.querySelector('.Tests');
const StartTestButton = document.querySelector('.StartTestButton');
const WhileScan = document.querySelector('.WhileScan');
const DetectionError = document.querySelector('.DetectionError');
const GetDeviceInformation = document.querySelector('.GetDeviceInformation');

setTimeout(() => {
    
    PreloaderPage.style.display = "none";
    SettingsPage.style.display = "flex";
    document.querySelector('.DetectDevice').style.display = "flex";

}, 3000);

StartTestButton.addEventListener('click', e=>{

    SettingsPage.style.display = "none";
    Tests.style.display = "flex";

    setTimeout(() => {

        WhileScan.style.display = "none";
        DetectionError.style.display = "flex";

        setTimeout(() => {
            
            DetectionError.style.display = "none"
            GetDeviceInformation.style.display = "flex";

        }, 3000);

    }, 10000);

})

