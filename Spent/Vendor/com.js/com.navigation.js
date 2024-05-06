

//Buttons

const BackToHome = document.querySelectorAll('.BackToHome');
const BackToLogs = document.querySelectorAll('.BackToLogs');

//Actions

for(let Aument = 0; Aument < BackToHome.length; Aument++){

    const BackToHomeButton = BackToHome[Aument];

    BackToHomeButton.addEventListener('click', BackToHomeNow);

    function BackToHomeNow(){

        NewLog.style.display = "none";
        ViewLogs.style.display = "none";
        GenerateANewReport.style.display = "none";
        SpentSelectMenu.style.display = "flex";

    }

}

const ShowInfo = document.querySelector('.ShowInfo');

for(let Aument = 0; Aument < BackToLogs.length; Aument++){

    const BackToLogsButton = BackToLogs[Aument];

    BackToLogsButton.addEventListener('click', BackToLogsNow);

    function BackToLogsNow(){

        document.querySelector('.ShowInfo').style.display = "none";
        ViewLogs.style.display = "flex";

    }

}