let currentCode = "";

function getPrimaryScreenResolution() {
    return {
        width: window.screen.width,
        height: window.screen.height
    };
}

function generateRandomCode(length = 6) {
    const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let code = "";
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        code += charset[randomIndex];
    }
    return code;
}

function generateCode() {
    currentCode = generateRandomCode();
    const primaryResolution = getPrimaryScreenResolution();
    const newWindow = window.open("", "Test HDMI", `width=800, height=600`);
    
    const newWindowContent = `
    <html>
    <head>
        <title>Prueba HDMI</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                background-color: #f4f4f4;
                transition: background-color 0.5s;
            }

            h1 {
                padding: 20px;
                background-color: #34495e;
                color: #ffffff;
            }

            #codeContainer {
                display: none;
                margin: 50px;
                padding: 20px;
                border-radius: 10px;
                background-color: #2ecc71;
                animation: fadeIn 1s;
            }

            @keyframes fadeIn {
                from {opacity: 0;}
                to {opacity: 1;}
            }

            button {
                margin-top: 20px;
                padding: 10px 15px;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                background-color: #e74c3c;
                color: #ffffff;
                transition: background-color 0.2s;
            }

            button:hover {
                background-color: #c0392b;
            }
        </style>
    </head>
    <body>
        <h1>Prueba HDMI</h1>
        <div id="instructionContainer">
            <p>Mueve esta ventana al monitor externo</p>
        </div>
        <div id="codeContainer">
            <h2>Tu código es:</h2>
            <h1 id="codeDisplay"></h1>
            <p>Copia el código y úsalo en la ventana principal.</p>
            <button onclick="window.close()">Cerrar ventana</button>
        </div>

        <script>
            let primaryWidth = ${primaryResolution.width};
            let primaryHeight = ${primaryResolution.height};
            let code = "${currentCode}";
            setInterval(function() {
                if (window.screenX < 0 || window.screenX > primaryWidth || window.screenY < 0 || window.screenY > primaryHeight) {
                    document.getElementById('instructionContainer').style.display = 'none';
                    document.getElementById('codeContainer').style.display = 'block';
                    document.getElementById('codeDisplay').innerText = code;
                }
            }, 1000);
        </script>
    </body>
    </html>
    `;
    
    newWindow.document.write(newWindowContent);
    document.getElementById('codeContainer').style.display = "block";
}

function checkCode() {
    const enteredCode = document.getElementById('codeInput').value;
    const resultElement = document.getElementById('result');

    if (enteredCode === currentCode) {
        ChangeNotch()
        Notch.style.backgroundImage = "url(../Assets/UI/Monitor.gif)";

        setTimeout(() => {
            
            document.querySelector('.HDMIPORTTEST').style.display = "none";
            document.querySelector('.HDMIPORTTEST').style.display = "none";
            document.querySelector('.BatteryTest').style.display = "block";
            localStorage.setItem('HDMIPORTTEST', "true");

    
        }, 3000);
    } else {
        resultElement.innerText = "Test Fallido";
    }
}

function cancelTest() {
    ChangeNotch()
    Notch.style.backgroundImage = "url(../Assets/UI/Okay.gif)";

    setTimeout(() => {
        
        document.querySelector('.HDMIPORTTEST').style.display = "none";
        document.querySelector('.BatteryTest').style.display = "block";

    }, 3000);
}
