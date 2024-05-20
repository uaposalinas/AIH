function StartKeyboardScreen(){

    document.querySelector('.MicTest').style.display = "none";

    if(document.querySelector('.KeyboardTest').style.display == "flex"){

        
    document.querySelector('.TouchScreenTest').style.display = "none";

    window.addEventListener('keydown', e=>{

        e.preventDefault();
    
    })
    
    
    const keyboardDiv = document.getElementById('keyboard');
    
    const keyLayout = [
        ['ESC', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10', 'F12'],
        ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '¡', 'BACKSPACE'],
        ['TAB', 'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', '+', 'ENTER'],
        ['CAPS', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ñ' ],
        ['SHIFT', 'Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '-', 'UP'],
        ['CTRL', 'ALT', 'Espacio', 'ALTGR','LEFT', 'DOWN', 'RIGHT']
    ];
    
    const arrowMapping = {
        "UP": "↑",
        "DOWN": "↓",
        "LEFT": "←",
        "RIGHT": "→"
    };
    
    for (let row of keyLayout) {
        const rowDiv = document.createElement('div');
        rowDiv.classList.add('key-row');
        for (let key of row) {
            const keyElement = document.createElement('div');
            keyElement.classList.add('key');
            if (arrowMapping[key]) {
                keyElement.classList.add('arrow');
                keyElement.innerText = arrowMapping[key];
            } else {
                keyElement.innerText = key;
            }
            keyElement.setAttribute('data-key', key);
            rowDiv.appendChild(keyElement);
        }
        keyboardDiv.appendChild(rowDiv);
    }
    
    const specialKeyMap = {
        " ": "Espacio",
        "Enter": "ENTER",
        "Shift": "SHIFT",
        "Control": "CTRL",
        "Alt": "ALT",
        "AltGraph": "ALTGR",
        "CapsLock": "CAPS",
        "Backspace": "BACKSPACE",
        "Tab": "TAB",
        "ArrowUp": "UP",
        "ArrowDown": "DOWN",
        "ArrowLeft": "LEFT",
        "ArrowRight": "RIGHT",
        "Escape": "ESC",
        "Delete": "DEL"
    };
    
    document.addEventListener('keydown', (event) => {
        let keyName = event.key.toUpperCase();
        if (specialKeyMap[event.key]) {
            keyName = specialKeyMap[event.key];
        }
        const keyElement = document.querySelector(`.key[data-key="${keyName}"]`);
        if (keyElement) {
            keyElement.classList.add('selected');
            checkAllKeysSelected();
        }
    });
    
    function checkAllKeysSelected() {
        const allKeys = document.querySelectorAll('.key');
        const selectedKeys = document.querySelectorAll('.key.selected');
        if (allKeys.length === selectedKeys.length) {
          document.querySelector('.KeyboardTest').style.display = "none";
          localStorage.setItem('KeyboardTest', "true");
          document.querySelector('.KeyboardTest').style.display = "none";
          document.querySelector('.Tests').style.display = "none";
          document.querySelector('.FinishTest').style.display = "flex";
          document.querySelector('.PreloaderPage').style.display = "flex";
          setTimeout(() => {
            
            WriteToSendForm()

          }, 5000);
          
          const selectedKeys = document.querySelectorAll('.key.selected');
            let i = 0;
    
            while (i < selectedKeys.length) {
                const element = selectedKeys[i];
                
               element.style.display = "none";
               document.querySelector('.KeyboardTest').style.display = "none";
               document.querySelector('.Tests').style.display = "none";
               document.querySelector('.PreloaderPage').style.display = "flex";

               setTimeout(() => {
                
               }, 5000);
               localStorage.setItem('KeyboardTest', "true");
                
                i++;
            }
    
        }
    }
    
    }

}