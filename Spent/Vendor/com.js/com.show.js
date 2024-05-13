

window.addEventListener('load', StartFirmware);

function StartFirmware(){


    setTimeout(() => {
        
        document.querySelector('.ShowLogPreloader').style.display = "none";
        document.querySelector('.DisplaySelected').style.display = "flex";

    }, 2000);

    const Logo = document.querySelector('.Logo');

    const Attr = Logo.getAttribute('slot');

    const ReplaceLevelOne = Attr.replace(/ /g, "%20");

    Logo.style.backgroundImage = `url(${ReplaceLevelOne})`

}


const PrintForm = document.querySelector('.PrintForm');
const PrintReport = document.querySelector('.PrintReport');
const GestID = document.querySelector('.GestIDs');

PrintReport.addEventListener('click', PrintReportNow);

function PrintReportNow(){


    const UserNameForPrint = sessionStorage.getItem('UserName');

    function Statement(){

        if(window.location.hostname == "localhost"){

            Routes = "http://localhost/AIH/Spent/Print.php";
            return Routes;

        }else{

            Routes = window.location.origin + "/AIH/Gateway/Spent/Print.php";
            return Routes

        }
    }

    const Route = `${Statement()}?GestID=${GestID.value}&From=${UserNameForPrint}`;
    window.open(Route)

}