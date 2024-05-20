function StartTouchPadTest(){

    document.querySelector('.TouchPadTest').style.display = "flex";
    document.querySelector('.ScreenTest').style.display = "none";
    document.querySelector('.FormErrorScreenTest').style.display = "none";
    const circle = document.getElementById('circle');
const instruction = document.getElementById('instruction');
let clickCount = 0;

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

circle.addEventListener('click', () => {
    if (clickCount < 9) {
        circle.style.left = `${getRandomInt(10, 90)}%`;
        circle.style.top = `${getRandomInt(10, 90)}%`;
        circle.style.backgroundColor = getRandomColor();
        clickCount++;
    } else {
        circle.textContent = 'Haz click derecho';
        circle.removeEventListener('click', arguments.callee);
    }
});

circle.addEventListener('contextmenu', (e) => {
    e.preventDefault();
    circle.style.display = 'none';
    localStorage.setItem('TouchPadTest', "true");
    StartTouchScreenTest();
});



}