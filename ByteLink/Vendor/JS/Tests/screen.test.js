let tests = [
    { class: 'testUniformity', background: 'gray', message: 'Verifica uniformidad del color.' },
    { class: 'testColorDistance', background: 'red', message: 'Verifica distancias de color.' },
    { class: 'testGradient', background: 'linear-gradient(-20deg, #d558c8 0%, #24d292 100%)', message: 'Verifica degradado.' },
    { class: 'testSharpness', background: 'white', message: 'Verifica la nitidez de este texto.' },
    { class: 'testViewAngle', background: '#00ff00', message: 'Mueve tu cabeza y verifica el color.' },
    { class: 'testPixelsRed', background: 'red', message: 'Verifica píxeles muertos en rojo.' },
    { class: 'testPixelsGreen', background: 'green', message: 'Verifica píxeles muertos en verde.' },
    { class: 'testPixelsBlue', background: 'blue', message: 'Verifica píxeles muertos en azul.' },
    { class: 'testPixelsWhite', background: 'white', message: 'Verifica píxeles muertos en blanco.' },
    { class: 'testPixelsBlack', background: 'black', message: 'Verifica píxeles muertos en negro.' }
];

let currentTestIndex = 0;

function StartTestScreen(){

    document.querySelector('.Results001').style.display = "none";
    document.querySelector('.ScreenTest').style.display = "flex";
    document.querySelector('.IconScreenTest').style.display = "flex";

    setTimeout(() => {
        
        startScreenTest()

    }, 2000);

}

function startScreenTest() {
    const screenTestElement = document.querySelector('.ScreenTest');
    document.querySelector('.IconScreenTest').style.opacity = "0";
    document.querySelector('.TestBody').style.top = "0px";
    
    if (currentTestIndex < tests.length) {
        const test = tests[currentTestIndex];
        screenTestElement.style.display = 'block';
        screenTestElement.style.background = test.background;
        screenTestElement.querySelector('.screenInfo').innerText = test.message;

        currentTestIndex++;
        setTimeout(startScreenTest, 5000);
    } else {
        document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 10';

        const TerminalTimeOutScreenTest9 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 9';

        }, 1000);

        const TerminalTimeOutScreenTest8 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 8';

        }, 2000);


        const TerminalTimeOutScreenTest7 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 7';

        }, 3000);

        const TerminalTimeOutScreenTest6 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 6';

        }, 4000);

        const TerminalTimeOutScreenTest5 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 5';

        }, 5000);

        const TerminalTimeOutScreenTest4 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 4';

        }, 6000);

        const TerminalTimeOutScreenTest3 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 3';

        }, 7000);

        const TerminalTimeOutScreenTest2 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 2';

        }, 8000);

        const TerminalTimeOutScreenTest1 = setTimeout(() => {
            
            document.querySelector('.screenInfo').innerText = '¿Notaste errores? Si es asi, pulsa esc antes de  en 1';

            StartTouchPadTest()

        }, 9000);

        const TerminalTimeOutScreenTest0 = setTimeout(() => {
            

        }, 10000);

        //IFAnErrorhas Detected;

window.addEventListener('keyup', e => {
    const KeyPress = e.keyCode;

    // Verificar si el elemento .ScreenTest existe en el documento
    const screenTestElement = document.querySelector('.ScreenTest');

    if (KeyPress == 27 && screenTestElement && screenTestElement.style.display == "block") {
        // Limpiar las temporizaciones
        clearTimeout(TerminalTimeOutScreenTest0);
        clearTimeout(TerminalTimeOutScreenTest1);
        clearTimeout(TerminalTimeOutScreenTest2);
        clearTimeout(TerminalTimeOutScreenTest3);
        clearTimeout(TerminalTimeOutScreenTest4);
        clearTimeout(TerminalTimeOutScreenTest5);
        clearTimeout(TerminalTimeOutScreenTest6);
        clearTimeout(TerminalTimeOutScreenTest7);
        clearTimeout(TerminalTimeOutScreenTest8);
        clearTimeout(TerminalTimeOutScreenTest9);

        // Esperar 3 segundos
        setTimeout(() => {
            // Código a ejecutar después de 3 segundos
        }, 3000);

        // Actualizar el contenido de .screenInfo
        document.querySelector('.screenInfo').innerText = 'Preparando...';

        // Ocultar .ScreenTest y mostrar .FormErrorScreenTest después de 2 segundos
        setTimeout(() => {
            screenTestElement.style.display = "none";
            document.querySelector('.FormErrorScreenTest').style.display = "flex";
        }, 2000);
    } else {
        console.warn('Seguridad e integridad de DevLabs Networks bloqueó el acceso a esta tecla');
        console.warn('DevLabs Networks integrity and security has blocked this key access.');
    }
});




        document.querySelector('.IconScreenTest').style.opacity = "1";
        document.querySelector('.WriteScreenTest').value = "1";
        localStorage.setItem('ScreenTest', "true");

    }
}


