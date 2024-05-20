document.querySelector('.ChooseFile').addEventListener('change', loadFile)

function loadFile() {
    const fileInput = document.getElementById('fileInput');
    const iframe = document.getElementById('iframeDisplay');

    if (fileInput.files.length === 0) {
        alert('Por favor, seleccione un archivo.');
        return;
    }

    const file = fileInput.files[0];

    if (file.name !== 'battery-report.html') {
        alert('Por favor, suba un archivo llamado "battery-report.html".');
        return;
    }

    const objectURL = URL.createObjectURL(file);
    iframe.src = objectURL;
}

function calculate() {
    const fullChargeCapacity = parseFloat(document.getElementById('fullChargeCapacity').value);
    const designCapacity = parseFloat(document.getElementById('designCapacity').value);
    
    if (isNaN(fullChargeCapacity) || isNaN(designCapacity)) {
        alert('Por favor, ingrese valores válidos.');
        return;
    }

    const result = Math.round((fullChargeCapacity / designCapacity) * 100);

    const WriteResult = document.querySelector('.OpResult');

    localStorage.setItem('CurrentBatteryTestPorcent', result);

}

setInterval(() => {

    const WriteResult = document.querySelector('.OpResult');
    const Result = localStorage.getItem('CurrentBatteryTestPorcent')
    
    if(Result){

        WriteResult.style.display = "flex";
        WriteResult.innerHTML = Result+"% de porcentaje de batería";

    }else{

        WriteResult.style.display = "none";

    }

}, 0);

document.querySelector('.NextStepBatteryToCharger').addEventListener('click', e=>{

    document.querySelector('.BatteryTest').style.display = "none";
    document.querySelector('.ChargeTest').style.display = "flex";

})