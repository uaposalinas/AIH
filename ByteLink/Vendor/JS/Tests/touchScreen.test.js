function StartTouchScreenTest(e){

    document.querySelector('.TouchScreenTest').style.display = "none";
    document.querySelector('.TouchScreenTest').style.display = "flex";

    const touchCircle = document.getElementById('touchCircle');
const touchInfo = document.getElementById('touchInfo');
let touchCount = 0;

if ('maxTouchPoints' in navigator && navigator.maxTouchPoints > 0) {
    touchInfo.textContent = `Máximo de puntos táctiles: ${navigator.maxTouchPoints} - Tocando: 0`;

    touchCircle.addEventListener('touchstart', (e) => {
        e.preventDefault();
        touchInfo.textContent = `Máximo de puntos táctiles: ${navigator.maxTouchPoints} - Tocando: ${e.touches.length}`;

        if (touchCount < 9) {
            touchCircle.style.left = `${getRandomInt(10, 90)}%`;
            touchCircle.style.top = `${getRandomInt(10, 90)}%`;
            touchCircle.style.backgroundColor = getRandomColor();
            touchCount++;
        } else {
            document.querySelector('.TouchScreenTest').style.display = "none";
            document.querySelector('.SpeakersTest').style.display = "flex";
            localStorage.setItem('TouchScreenTest', "true")
            touchCircle.removeEventListener('touchstart', arguments.callee);
        }
    });
} else {
    
    document.querySelector('.SpeakersTest').style.display = "flex";
    document.querySelector('.TouchScreenTest').style.display = "none";
    localStorage.setItem('TouchScreenTest', "null")

}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}


}

