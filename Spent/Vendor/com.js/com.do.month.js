const CreateANewReport = document.querySelector('.CreateANewReport');
const ViewOldReports = document.querySelector('.ViewOldReports');
const ReportsPrincipalPage = document.querySelector('.ReportsPrincipalPage');
const CreateReport = document.querySelector('.CreateReport');
const MensualReport = document.querySelector('.MensualReport');
const SelectMonth = document.querySelector('.SelectMonth');

CreateANewReport.addEventListener('click', GetFormForReport);

function GetFormForReport(){

    ReportsPrincipalPage.style.display = "none";
    CreateReport.style.display = "flex";

}

ViewOldReports.addEventListener('click', GetFormForViewReports);

function GetFormForViewReports(){

    alert('2')

}

MensualReport.addEventListener('click', SelectMonthForReport);

function SelectMonthForReport(){

    CreateReport.style.display = "none";
    SelectMonth.style.display = "flex";

}


//SelectMonth


const Month = document.querySelectorAll('.Month');

for(let Aument = 0; Aument < Month.length; Aument++){

    const Months = Month[Aument];

    Months.addEventListener('click', SelectThisMonth);

    function SelectThisMonth(e){

        const IndexOf = Array.from(Month).indexOf(e.target);

        if(IndexOf <= 9){

            const Route = `com.reports?MonthID=0${IndexOf}`;
            
            window.open(Route);

        }else{

          const Route = `com.reports?MonthID=${IndexOf}`;
    
          window.open(Route);

        }

    }

}


