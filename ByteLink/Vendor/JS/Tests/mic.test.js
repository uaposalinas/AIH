document.querySelector('#openPopup').addEventListener('click', ExecuteMicTest)

function ExecuteMicTest() {
    const MicTest = window.open("https://devlabscorporation.github.io/devco.mictest/", "_blank", "width=10, height=10");

    // Escuchar el mensaje de la ventana de prueba de micrófono
    window.addEventListener("message", function (event) {
        if (event.data === true) {
            this.document.querySelector('.MicStatus').innerHTML = event.data;
        } else if (event.data === false) {
            this.document.querySelector('.MicStatus').innerHTML = event.data;
        }
    });
}

const MicListener = setInterval(() => {
    
    if(document.querySelector('.MicStatus').innerHTML == "true"){

        ChangeNotch()
        localStorage.setItem('MicTest', "true")
        Notch.style.backgroundImage = "url(../Assets/UI/microphone.gif)";
        document.querySelector('.MicTest').style.display = "none";
        document.querySelector('.CameraTest').style.display = "flex";
        document.querySelector('.MicTest').style.display = "none";
        clearInterval(MicListener);

    }else{

        
        ChangeNotch()
        localStorage.setItem('MicTest', "true")
        Notch.style.backgroundImage = "url(../Assets/UI/error.gif)";
        document.querySelector('.MicTest').style.display = "none";
        document.querySelector('.CameraTest').style.display = "flex";
        document.querySelector('.MicTest').style.display = "none";
        clearInterval(MicListener);


    }

}, 0);