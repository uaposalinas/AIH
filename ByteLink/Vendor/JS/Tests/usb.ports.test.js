function StartUSBPORTSTEST(){

    document.querySelector('.DetectDevice').style.display = "none";
    document.querySelector('.TouchPadTest').style.display = "none";

}

function askForFiles() {
    const usbPorts = document.getElementById('usbPorts').value;
    if (!usbPorts || usbPorts <= 0 || usbPorts > 6) {
        alert("Por favor, ingresa un número válido de puertos USB (1-6).");
        return;
    }

    const fileInputsDiv = document.getElementById('fileInputs');
    fileInputsDiv.innerHTML = "";

    for (let i = 1; i <= usbPorts; i++) {
        createFileInput(fileInputsDiv, i, `.dtf${i}`, usbPorts);
    }

    const informationP = document.querySelector('.InformationForPortsTest');

    // Si es la primera vez que se presiona "Siguiente"
    if (!informationP.dataset.clickedBefore) {
        informationP.dataset.clickedBefore = "true";
        informationP.innerText = "Conecta una unidad usb certificada, seleccionala abajo y busca el archivo com.package.port.";
    } else {
        // Si es la segunda vez que se presiona "Siguiente"
        informationP.innerText = "Seleccionala abajo y busca el archivo com.package.port";
        document.querySelector(`[for=fileInput1]`).style.display = "block";
    }
}

function createFileInput(parent, id, extension, totalInputs) {
    const label = document.createElement('label');
    label.htmlFor = `fileInput${id}`;
    label.classList.add("fileLabel");
    label.innerText = `Selecciona el archivo ${extension}`;

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.id = `fileInput${id}`;
    fileInput.accept = extension;
    fileInput.dataset.extension = extension;
    fileInput.dataset.totalInputs = totalInputs;
    fileInput.addEventListener('change', function () {
        generateScript(id, extension, totalInputs);
    });

    parent.appendChild(label);
    parent.appendChild(fileInput);
}

function generateScript(id, extension, totalInputs) {
    const fileInput = document.getElementById(`fileInput${id}`);
    const file = fileInput.files[0];

    const fileName = file.name.toLowerCase();
    const isValidFile = fileName.slice(extension.length * -1) === extension;

    const informationP = document.querySelector('.InformationForPortsTest');

    if (file && isValidFile) {
        const objectURL = URL.createObjectURL(file);
        const scriptTag = document.createElement('script');
        scriptTag.src = objectURL;
        document.body.appendChild(scriptTag);

        if (id < totalInputs) {
            document.querySelector(`[for=fileInput${id}]`).style.display = "none";
            document.querySelector(`[for=fileInput${id + 1}]`).style.display = "block";
            informationP.innerText = "Desconecta la unidad usb, conectala en el siguiente puerto y busca el archivo com.package.port.";
        } else {
            ChangeNotch();
            Notch.style.backgroundImage = "url(../Assets/UI/UsbCorrect.gif)";
            localStorage.setItem('PortTested', "true");

            setTimeout(() => {
                
                document.querySelector('.USBPORTSTEST').style.display = "none";
                document.querySelector('.HDMIPORTTEST').style.display = "flex";

            }, 3000);
        }
    } else {
        alert(`Por favor, carga un archivo ${extension} válido.`);
    }
}
