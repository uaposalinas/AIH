document.querySelector('.TestButton').addEventListener('click', e=>{

    document.querySelector('.KeyboardTest').style.display = "none";
    document.querySelector('.SpeakersTest').style.display = "flex";

})

    let currentTest;
    let testsResults = {
    left: false,
    right: false,
    both: false
};

function playTone(frequency, channel = "both", duration = 1) {
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.setValueAtTime(frequency, audioContext.currentTime);
    
    const panNode = audioContext.createStereoPanner();
    panNode.pan.setValueAtTime(channel === 'left' ? -1 : channel === 'right' ? 1 : 0, audioContext.currentTime);

    oscillator.connect(panNode);
    panNode.connect(audioContext.destination);

    oscillator.start();
    oscillator.stop(audioContext.currentTime + duration);
}


async function startTest() {
    document.getElementById("testButton").disabled = true;
    document.getElementById("testButton").style.backgroundColor = "#9b9b9b";
    document.getElementById("testButton").style.cursor = "wait";

    // Left Speaker Test
    for (let i = 0; i < 3; i++) {
        document.querySelector('.LeftSpeaker').style.backgroundImage = "url(../Assets/UI/Speaker.gif)";
        document.getElementById('labelLeft').classList.add('jump');
        playTone(440, 'left');
        await new Promise(resolve => setTimeout(resolve, 1200)); 
        document.getElementById('labelLeft').classList.remove('jump');
        document.querySelector('.LeftSpeaker').style.backgroundImage = "url(../Assets/UI/Muted.gif)";
        await new Promise(resolve => setTimeout(resolve, 800)); 
    }
    askQuestion("¿Escuchaste el sonido tres veces en el altavoz izquierdo?", 'left');
}

function askQuestion(question, test) {
    currentTest = test;
    document.getElementById('question').innerText = question;
    document.getElementById('userCheck').style.display = 'block';
}

function setResult(answer) {
    testsResults[currentTest] = answer;
    document.getElementById('userCheck').style.display = 'none';
    
    if(currentTest === 'left') {
        testRightSpeaker();
    } else if(currentTest === 'right') {
        testBothSpeakers();
    } else {
        finalizeTest();
    }
}

async function testRightSpeaker() {
    for (let i = 0; i < 3; i++) {
        document.getElementById('labelRight').classList.add('jump');
        document.querySelector('.RightSpeaker').style.backgroundImage = "url(../Assets/UI/Speaker.gif)";
        playTone(550, 'right');
        await new Promise(resolve => setTimeout(resolve, 1200));
        document.getElementById('labelRight').classList.remove('jump');
        document.querySelector('.RightSpeaker').style.backgroundImage = "url(../Assets/UI/Muted.gif)";
        await new Promise(resolve => setTimeout(resolve, 800)); 
    }
    askQuestion("¿Escuchaste el sonido tres veces en el altavoz derecho?", 'right');
}

async function testBothSpeakers() {
    for (let i = 0; i < 3; i++) {
        document.getElementById('labelLeft').classList.add('jump');
        document.getElementById('labelRight').classList.add('jump');
        document.querySelector('.LeftSpeaker').style.backgroundImage = "url(../Assets/UI/Speaker.gif)";
        document.querySelector('.RightSpeaker').style.backgroundImage = "url(../Assets/UI/Speaker.gif)";
        playTone(660, 'both');
        await new Promise(resolve => setTimeout(resolve, 1200));
        document.getElementById('labelLeft').classList.remove('jump');
        document.getElementById('labelRight').classList.remove('jump');
        document.querySelector('.LeftSpeaker').style.backgroundImage = "url(../Assets/UI/Muted.gif)";
        document.querySelector('.RightSpeaker').style.backgroundImage = "url(../Assets/UI/Muted.gif)";
        await new Promise(resolve => setTimeout(resolve, 800)); 
    }
    askQuestion("¿Escuchaste el sonido tres veces en ambos altavoces?", 'both');
}

function finalizeTest() {
    localStorage.setItem("LeftSpeakerTest", String(testsResults.left));
    localStorage.setItem("RightSpeakerTest", String(testsResults.right));
    localStorage.setItem("SpeakerTest", testsResults.both && testsResults.left && testsResults.right ? "true" : "false");

    document.getElementById("testButton").disabled = false;
    ChangeNotch()
    Notch.style.backgroundImage = "url(../Assets/UI/okay.gif)";

    setTimeout(() => {
        
        Notch.style.backgroundImage = "none";
        document.querySelector('.SpeakersTest').style.display = "none";
        document.querySelector('.USBPORTSTEST').style.display = "flex";
        StartUSBPORTSTEST()

    }, 3000);
}


