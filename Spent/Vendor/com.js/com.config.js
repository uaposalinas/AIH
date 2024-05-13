    const SpentSelectMenu = document.querySelector('.SpentSelectMenu');
    const NewLog = document.querySelector('.NewLog');
    const ViewLogs = document.querySelector('.ViewLogs');
    const NotificationIsland = document.querySelector('.NotificationIsland');
    const GenerateANewReport = document.querySelector('.GenerateANewReport');
    const SearchByLog = document.querySelector('.SearchByLog');
    const ShowFilterFrame = document.querySelector('.ShowFilterFrame');
    const AddCardsButton = document.querySelector('.AddCardsButton')

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

            SetLogosInLogs()

        }else if(IndexOf == 2){

            SpentSelectMenu.style.display = "none";
            GenerateANewReport.style.display = "flex";

            SendPreloader("Preparando caracteristicas y motor de impresión", "450px");

            setTimeout(() => {
                
                RemovePreloader();
                SendNewMessage("Todo listo", "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/check.png", "Low", "160px")
                document.querySelector('.AssistantPreloader').style.display = "none";

            }, 3000);

        }else if(IndexOf == 3){

            SendError('Esta caracterisitica no está disponible para usuarios comúnes aún.', "560px")

        }

    }

}

const ReloadTable = document.querySelector('.ReloadTable');
const TimeFilter = document.querySelector('.TimeFilter');
const SwitchTable = document.querySelector('.SwitchTable');

        ReloadTable.addEventListener('click', ReloadTableNow);

        function ReloadTableNow(){

            window.location.reload()

        }

        TimeFilter.addEventListener('click', ShowFilterFromDate);

        function ShowFilterFromDate(){

                        

        }



const CardUsed = document.querySelector('.SentCardUsed');
const CardUsedConfirm = document.querySelector('.CardUsedConfirm');

CardUsedConfirm.addEventListener('click', SendACardUsed);

function SendACardUsed(){

    document.querySelector('.CardUsedToPay').value = CardUsed.value;
    BackModal.style.display = "none";
    SoftModals.style.display = "none";
    SelectCards.style.display = "none";

    document.querySelector('.CardID').innerHTML = "Termincación: "+CardUsed.value;
    document.querySelector('.CardBrand').innerHTML = "Visa";
    DisplayCard.style.backgroundImage = "url(Assets/com.img/PayMethods/card.png)"

}









//Swith Table


let State = false;

SwitchTable.addEventListener('click', SwitchTableNow);

function SwitchTableNow(){

    const GridShow = document.querySelector('.GridShow');
    const TableShow = document.querySelector('.TableShow');

    if(State == false){

        GridShow.style.display = "none"
        TableShow.style.display = "flex";
        State = true;

    }else if(State == true){

        GridShow.style.display = "flex"
        TableShow.style.display = "none";
        State = false;  

    }

}



function SetLogosInLogs(){

    const ThisProviderLogo = document.querySelectorAll('.ProviderLogo');
    const Limit = ThisProviderLogo.length;

    for(let Aument = 0; Aument < Limit; Aument++){

        const Logos = ThisProviderLogo[Aument];
        
        const GetAttr = Logos.getAttribute('slot');

        const ImageForSend = GetAttr.replace(/ /g, "%20");

            
            Logos.style.backgroundImage = `url(${ImageForSend})`;


    }

}


const ThisLog = document.querySelectorAll('.ThisLog');
const Limit = ThisLog.length;
const DisplaySelected = document.querySelector('.ShowInfo');
const ShowLogsFrame = document.querySelector('.ShowLogsFrame');

for(let Aument = 0; Aument < Limit; Aument++){

    const Logs = ThisLog[Aument];

    Logs.addEventListener('click', ExecuteThisLog);

    function ExecuteThisLog(){

        SendNewMessage("Acá están los detalles de ese registro", "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/Show.png", "Low", "360px")

        const GetGestID = Logs.getAttribute('GestID');

        ViewLogs.style.display = "none";
        DisplaySelected.style.display = "flex";

        const FrameSRC = `${window.location.origin}${window.location.pathname}/Log.php`;

     ShowLogsFrame.src = `${FrameSRC}?GestID=${GetGestID}`;


       
    }

}

const DetectShare = document.querySelector('.DetectShare');

DetectShare.addEventListener('click', CopyGestIDLink);

function CopyGestIDLink() {

    const GestIDParams = document.querySelector('.ShowLogsFrame').src;

    const Code = document.createElement('textarea');
    Code.value = GestIDParams;
    document.body.appendChild(Code);

    Code.select();
    Code.setSelectionRange(0, 99999); 

    document.execCommand('copy');
    document.body.removeChild(Code);

    SendNewMessage('Enlace copiado en el portapapeles', 'https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/link.png', "Low", "360px")

}

const AddAnotherProvider = document.querySelector('.AddAnotherProvider');

AddAnotherProvider.addEventListener('click', NewProvider);

function NewProvider(){

    window.open("com.new/Provider/", "NewWindowForAddProvider", "width=500,height=400")

}

AddCardsButton.addEventListener('click', NewCard);

function NewCard(){

    window.open("com.new/Card/", "NewWindowForAddCard", "width=500,height=400")

}

let ActivateFilter = false

TimeFilter.addEventListener('click', InitFilter);

function InitFilter(){

    if(ActivateFilter == false){

        FilterByDate.style.display = "flex";
        ActivateFilter = true;

    }else if(ActivateFilter == true){

        FilterByDate.style.display = "none";
        ActivateFilter = false;

    }


}
