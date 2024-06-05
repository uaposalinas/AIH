setInterval(() => {
    
    const WiriteHourIn = document.querySelector('.WiriteHourIn');
const WiriteDateIn = document.querySelector('.WiriteDateIn');

const CurrentDates = new Date();
const GetHours = CurrentDates.getHours();
const GetMinutess = CurrentDates.getMinutes();
const GetDates = CurrentDates.getDate();
const GetMonths = CurrentDates.getMonth();
const GetDays = CurrentDates.getDay();

const WeekDay = ["Lunes", "Martes", "Miercóles", "Jueves", "Viernes", "Sábado", "Domingo"];
const Months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

function Hour(){

    if(GetHours < 10){

        return `0${GetHours}`

    }else{

        return GetHours;

    }

}

function Minutes(){

    if(GetMinutess < 10){

        return `0${GetMinutess}`;

    }else{

        return GetMinutess;

    }

}


const DoHour = `${Hour()}:${Minutes()}`;
const DoDate = `${WeekDay[GetDays]}, ${GetDates} de ${Months[GetMonths]}`;

WiriteHourIn.innerHTML = DoHour;
WiriteDateIn.innerHTML = DoDate;
}, 0);