

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

document.querySelector('.EditReport').addEventListener('click', EditReportNow);

function EditReportNow(){

    function Statement(){

        if(window.location.hostname == "localhost"){

            Routes = "http://localhost/AIH/Spent/Edit/";
            return Routes;

        }else{

            Routes = window.location.origin + "/AIH/Gateway/Spent/Edit/";
            return Routes

        }
    }

    const Route = `${Statement()}?GestID=${GestID.value}`;
    window.open(Route, "NewWindowForEdit", "width=1700,height=864");

    

}

document.querySelector('.RemoveReport').addEventListener('click', RemoveReportNow);

function RemoveReportNow(){

    const ConfirmAction = confirm('¿Estás seguro que quieres eliminar este registro?');

    if(ConfirmAction == true){

        window.open(`com.delete/?GestID=${GestID.value}`, "none", "width=5px, height=5px");

    }else{

        alert('no')

    }

}