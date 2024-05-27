    /* Reset */

        localStorage.removeItem('NewTax');
        localStorage.removeItem('NewTaxValue');
        localStorage.removeItem('LogMutant')

    /* Reset */


    const SpentSelectMenu = document.querySelector('.SpentSelectMenu');
    const NewLog = document.querySelector('.NewLog');
    const ViewLogs = document.querySelector('.ViewLogs');
    const NotificationIsland = document.querySelector('.NotificationIsland');
    const GenerateANewReport = document.querySelector('.GenerateANewReport');
    const SearchByLog = document.querySelector('.SearchByLog');
    const ShowFilterFrame = document.querySelector('.ShowFilterFrame');
    const AddCardsButton = document.querySelector('.AddCardsButton');
    const EditReport = document.querySelector('.EditReport');

//Select an option from the spents menu

const SelectOption = document.querySelectorAll('.SelectOption');
const SelectOptionTotalElements = SelectOption.length;


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

            SendError('Esta caracterisitica no está disponible para usuarios comúnes aún.', "560px");

            setTimeout(() => {
                
                RemoveError()

            }, 5000);

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

         try {
            
               
            Logos.style.backgroundImage = `url(${ImageForSend})`;


         } catch (error) {

            alert(0)

         }

    }

}

window.addEventListener('load', SetLogosInLogsForProvider)

function SetLogosInLogsForProvider(){

    const ThisProviderLogo = document.querySelectorAll('.ShowProviderLogoToSearch');
    const Limit = ThisProviderLogo.length;

    for(let Aument = 0; Aument < Limit; Aument++){

        const Logos = ThisProviderLogo[Aument];
        
        const GetAttr = Logos.getAttribute('slot');

        const ImageForSend = GetAttr.replace(/ /g, "%20");

         try {
            
               
            Logos.style.backgroundImage = `url(${ImageForSend})`;


         } catch (error) {

            alert(0)

         }

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


const PressProvider = document.querySelector('.Provider');

PressProvider.addEventListener('click', OpenPopupProvider);

function OpenPopupProvider(e){

    e.preventDefault();
    this.blur();
    document.querySelector('.HideWhileSelectProvider').style.display = "none";
    document.querySelector('.ProvidersPopup').style.display = "flex";
    
    setTimeout(() => {
        
        document.querySelector('.SearchByProvider').focus()

    }, 1000);

}

const ThisProvider = document.querySelectorAll('.ThisProvider');

for(let Aument = 0; Aument < ThisProvider.length; Aument++){

    const Provider = ThisProvider[Aument];
    const GetAttr = Provider.getAttribute('provider');

    Provider.addEventListener('click', SelectThisProvider);


    function SelectThisProvider(){

        PressProvider.value = GetAttr;
        document.querySelector('.ProvidersPopup').style.display = "none";


    }

}


let OtherISV = false;

document.querySelector('.OtherStatus').addEventListener('change', SwitchAttemp);

function SwitchAttemp(){

    if(OtherISV == false){

        Others.disabled = false;
        OtherISV = true;
        Others.focus();
        Others.value = "";

        const NewTax = localStorage.getItem('NewTax');

        if(NewTax){

            const TaxValue = parseFloat(localStorage.getItem('NewTaxValue'));
            const GetTotalINT = parseFloat(Total.value);
            const Operation = GetTotalINT - TaxValue;

            Total.value = `${Operation}`;

        }

    }else{

        OtherISV.disabled = true;
        OtherISV = false;

    }

}



document.querySelector('.Others').addEventListener('keyup', SendOthers);

function SendOthers(e){

    const KeyPressed = e.keyCode;

    if(KeyPressed == 13){

            const INT = parseFloat(Total.value);
            const Taxes = parseFloat(Others.value);
            const Operation = INT + Taxes;

            Total.value = `${Operation}`;

            Others.disabled = true;


            localStorage.setItem('NewTax', true);
            localStorage.setItem('NewTaxValue', Taxes);


    }

}





setInterval(() => {
        
    const Key = localStorage.getItem('EditKey');

    if(Key && Key === "true"){

        localStorage.removeItem('EditKey');

        SendNewMessage("Se editó el registro con éxito", "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/check.png", "Low", "320px")

        setTimeout(() => {
            
            window.location.reload();

        }, 6000);

    }else if(Key && Key === 'false'){

        SendError("No se editó el registro", "230px")

    }

}, 1000);


setInterval(() => {
        
    const DeleteKey = localStorage.getItem('DeleteKey');

    if(DeleteKey && DeleteKey === "true"){

        localStorage.removeItem('DeleteKey');

        SendNewMessage("Se eliminó el registro con éxito", "https://cdn-icons-png.flaticon.com/512/7625/7625624.png", "Low", "320px")

        setTimeout(() => {
            
            window.location.reload();

        }, 6000);

    }else if(DeleteKey && DeleteKey === 'false'){

        SendError("No se eliminó el registro", "230px")

    }

}, 1000);



const ReportOptions = document.querySelectorAll('.ReportOptions');

for(let Aument = 0; Aument < ReportOptions.length; Aument++){

    const Reports = ReportOptions[Aument];
    Reports.addEventListener('click', SelectOptionInReport);

    function SelectOptionInReport(e){

        const IndexOf = Array.from(ReportOptions).indexOf(e.target);

        console.log(IndexOf)

    }
    
}





setInterval(() => {
        
    const NoLogKey = localStorage.getItem('NoLogKey');

    if(NoLogKey && NoLogKey === "true"){

        localStorage.removeItem('NoLogKey');

        SendError("No se encontró el reporte", "250px");

        setTimeout(() => {
            
            RemoveError()

        }, 3000);

    }

}, 1000);


const AllInputs = document.getElementsByName("input");

for(let Aument = 0; Aument < AllInputs.length; Aument++){

    const Input = AllInputs[Aument];
    
    Input.setAttribute("autocomplete", "off");

}

document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll("input");
    inputs.forEach(function(input) {
        input.setAttribute("autocomplete", "off");
    });
});
