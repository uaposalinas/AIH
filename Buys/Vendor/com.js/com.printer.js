const QrContainer = document.querySelector('.QrContainer');
const GetGestIDKey = window.location.search;
const PrintRightNow = document.querySelector('.PrintRightNow');

const FormatGestID = GetGestIDKey.substr(8, 10000000);

const GestID = FormatGestID;

const Route = `https://partners.devlabsco.space/AIH/Gateway/Spent/Log.php?GestID=${GestID}`

var qrcode = new QRCode(QrContainer, {
    text: Route,
    width: 92, 
    height: 92
});



const Images = document.getElementsByTagName('img');

for(let Aument = 0; Aument < Images.length; Aument++){

    const AllImages = Images[Aument];

    AllImages.style.display = "none";

}


const PrintDate = document.querySelector('.PrintDate');
const PrintHour = document.querySelector('.PrintHour');
const PrintedBy = document.querySelector('.PrintedBy');

const CurrentDate = new Date();
const GetDate = CurrentDate.getDate();
const GetMonth = CurrentDate.getMonth();
const GetYear = CurrentDate.getFullYear();
const GetHour = CurrentDate.getHours();
const GetMinutes = CurrentDate.getMinutes();

const ArrayMonths = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

function DetectHourForFormat(){

    if(GetHour < 10){

        return "0"+GetHour;

    }else if(GetHour > 9){

        return GetHour;

    }

}


function DetectMinuteForFormat(){

    if(GetMinutes < 10){

        return "0"+GetMinutes;

    }else if(GetMinutes > 9){

        return GetMinutes;

    }

}


const TextHour = `${DetectHourForFormat()}:${DetectMinuteForFormat()}`
const TextDate = `${GetDate} de ${ArrayMonths[GetMonth]} de ${GetYear}`;

PrintDate.innerHTML = "Fecha de impresion: "+TextDate;
PrintHour.innerHTML = "Hora de impresion: "+TextHour;



PrintRightNow.addEventListener('click', PrintNowSoft);

function PrintNowSoft(){

    window.print()

}