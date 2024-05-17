const ThisValue = document.querySelectorAll('.ThisValue');
const SaveNewLog = document.querySelector('.SaveNewLog');
const SendPreloaders = document.querySelector('.SendPreloader');
const ControlForm = document.querySelector('.ControlForm');

for(let Aument = 0; Aument < ThisValue.length; Aument++){

    const Inputs = ThisValue[Aument];

    SaveNewLog.addEventListener('click', SendForUpdate);

    function SendForUpdate(){

        if(Inputs.value.trim() === ''){

            Inputs.style.backgroundColor = "#980721";

        }else{

            SendPreloaders.style.display = "flex";
            setTimeout(() => {
                
                ControlForm.submit();

            }, 3000);

        }

    }

}