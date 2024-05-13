

//Buttons

const BackToHome = document.querySelectorAll('.BackToHome');
const BackToLogs = document.querySelectorAll('.BackToLogs');
const BackToNewLog = document.querySelectorAll('.BackToNewLog');

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

for(let Aument = 0; Aument < BackToNewLog.length; Aument++){

    const BackToNewLogButton = BackToNewLog[Aument];

    BackToNewLogButton.addEventListener('click', BackToNewLogNow);

    function BackToNewLogNow(){

        document.querySelector('.SoftModals').style.display = "none";
        document.querySelector('.BackModal').style.display = "none";

    }

}