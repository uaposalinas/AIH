document.querySelector('#openPopup2').addEventListener('click', ExecuteCamTest);

function ExecuteCamTest() {
    const RunWindow = window.open("https://devlabscorporation.github.io/devco.cameratest/", "_blank", "width=300, height=500");

    // Escuchar el mensaje de la ventana de prueba de cámara
    window.addEventListener("message", function (event) {
        if (event.origin === "https://devlabscorporation.github.io" && event.data === "true") {
            document.querySelector('.CamStatus').innerHTML = event.data;
            // Realiza las acciones relacionadas con la prueba de cámara
            if (document.querySelector('.CamStatus').innerHTML == "true") {
                ChangeNotch();
                Notch.style.backgroundImage = "url(../Assets/UI/camera.gif)";
                document.querySelector('.CameraTest').style.display = "none";
                document.querySelector('.KeyboardTest').style.display = "flex";
                StartKeyboardScreen();
            }
        } else if (event.origin === "https://devlabscorporation.github.io" && event.data === "false") {
            document.querySelector('.CamStatus').innerHTML = event.data;
            // Realiza las acciones relacionadas con la prueba de cámara
        }
    });

    const CamListener = setInterval(() => {
        if (document.querySelector('.CamStatus').innerHTML == "true") {
            ChangeNotch();
            localStorage.setItem('CameraTest', "true");
            Notch.style.backgroundImage = "url(../Assets/UI/camera.gif)";
            document.querySelector('.CameraTest').style.display = "none";
            document.querySelector('.KeyboardTest').style.display = "flex";
            clearInterval(CamListener);

        }else{

            if (document.querySelector('.CamStatus').innerHTML == "false") {
                ChangeNotch();
                localStorage.setItem('CameraTest', "true");
                Notch.style.backgroundImage = "url(../Assets/UI/error.gif)";
                document.querySelector('.CameraTest').style.display = "none";
                document.querySelector('.KeyboardTest').style.display = "flex";
                clearInterval(CamListener);
    
            }

        }
    }, 0);
}
