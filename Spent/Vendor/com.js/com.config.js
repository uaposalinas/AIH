    const SpentSelectMenu = document.querySelector('.SpentSelectMenu');
    const NewLog = document.querySelector('.NewLog');
    const ViewLogs = document.querySelector('.ViewLogs');
    const NotificationIsland = document.querySelector('.NotificationIsland');
    const GenerateANewReport = document.querySelector('.GenerateANewReport');

//Select an option from the spents menu

const SelectOption = document.querySelectorAll('.SelectOption');
const SelectOptionTotalElements = SelectOption.length;

const GetHelp = document.querySelector('.GetHelp');

GetHelp.addEventListener('click', GetHelpNow);

function GetHelpNow(){

    

}

for(let Aument = 0; Aument < SelectOptionTotalElements; Aument++){

    const GetAllMenuOptions = SelectOption[Aument];

    GetAllMenuOptions.addEventListener('click', SelectAnOption);

    function SelectAnOption(e){

        const IndexOf = Array.from(SelectOption).indexOf(e.target);

        if(IndexOf == 0){

            SpentSelectMenu.style.display = "none";
            NewLog.style.display = "flex";
            NewLog.classList.add('EntranceNewLog');

            setTimeout(() => {
               
                NewLog.classList.remove('EntranceNewLog')

            }, 600);

        }else if(IndexOf == 1){

            SpentSelectMenu.style.display = "none";
            ViewLogs.style.display = "flex";

        }else if(IndexOf == 2){

            SpentSelectMenu.style.display = "none";
            GenerateANewReport.style.display = "flex";

            SendPreloader("Preparando caracteristicas y motor de impresión", "450px");

            setTimeout(() => {
                
                RemovePreloader();
                SendNewMessage("Todo listo", "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/check.png", "Low", "160px")
                document.querySelector('.AssistantPreloader').style.display = "none";

            }, 3000);

        }

    }

}

//Select an option from the spents menu

//ViewLogsPage

const ReloadTable = document.querySelector('.ReloadTable');
const TimeFilter = document.querySelector('.TimeFilter');
const SwitchTable = document.querySelector('.SwitchTable');

    /*ReloadTable*/
    
        ReloadTable.addEventListener('click', ReloadTableNow);

        function ReloadTableNow(){

            window.location.reload()

        }

    /*ReloadTable*/
    

    /*Time Filter*/

        TimeFilter.addEventListener('click', ShowFilterFromDate);

        function ShowFilterFromDate(){

                        

        }

    /*Time Filter*/


//ViewLogsPage



