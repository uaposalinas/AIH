

//Buttons

const BackToHome = document.querySelectorAll('.BackToHome');

//Actions

for(let Aument = 0; Aument < BackToHome.length; Aument++){

    const BackToHomeButton = BackToHome[Aument];

    BackToHomeButton.addEventListener('click', BackToHomeNow);

    function BackToHomeNow(){

        NewLog.style.display = "none";
        ViewLogs.style.display = "none";
        SpentSelectMenu.style.display = "flex";

    }

}