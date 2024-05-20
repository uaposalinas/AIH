document.getElementById('abrirVentana').addEventListener('click', function() {
    window.open('https://devlabscorporation.github.io/devco.chargertest/', '_blank', 'width=600,height=400');
});

window.addEventListener('message', function(event) {

    if(this.document.querySelector('.ChargeTest').style.display == "flex"){

        if (event.data.tipo && event.data.tipo === 'ChargerTest') {
            let valor = event.data.valor;
            document.getElementById('resultado').textContent = valor;
        }
    
        const Check = this.document.querySelector('#resultado');
    
        let interval = setInterval(() => {
            if (Check.innerHTML === "") {
                console.log("En espera de confirmación de Test de Cargador");
            } else if (Check.innerHTML === "true") {
                console.log("Confirmación de Test de cargador recibida.");
                ChangeNotch();
                Notch.style.backgroundImage = "url(../Assets/UI/charger.gif)";
                clearInterval(interval);
                setTimeout(() => {
                    this.document.querySelector('.ChargeTest').style.display = "none";
                    this.document.querySelector('.MicTest').style.display = "flex";
                    localStorage.setItem('ChargerTest', "true");
                }, 3000);
            }
        }, 0);

    }else{

        console.warn('NULL')

    }

});
