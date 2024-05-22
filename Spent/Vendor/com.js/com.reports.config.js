const MountDate = document.querySelectorAll('.MountDate');

for(let Aument = 0; Aument < MountDate.length; Aument++){

    const Dates = MountDate[Aument];

    const CurrentDate = Dates.innerHTML;

    const GetYear = CurrentDate.substr(0, 4);
    const GetMonth = CurrentDate.substring(5, 7);
    const GetDate = CurrentDate.substring(8, 10)

    class FormatDate{

        constructor(Date, Month, Year){

            this.Date = Date;
            this.Month = Month;
            this.Year = Year;

        }

    }

    const SetDate = new FormatDate(GetDate, GetMonth, GetYear);

    const Formatted = `${SetDate.Date}/${SetDate.Month}/${SetDate.Year}`;

    Dates.innerHTML = Formatted;

}



function FormatNumberNow(Number){

    var Parts = Number.toString().split(".");

    Parts[0] = Parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    return Parts.join(".");

}
const Totals = document.querySelectorAll('.Totals');
const Subtotals = document.querySelector('.Subtotals');

for(let Aument = 0; Aument < Totals.length; Aument++){

    const Total = Totals[Aument];

    const GetTotals = Total.innerHTML;
    const RemoveLetters = GetTotals.substring(3, 1000);
    const Numbers = parseInt(RemoveLetters);
    
    const Formated = FormatNumberNow(Numbers);

    const FinallyFormat = `L. ${Formated}.00`;

    Total.innerHTML = FinallyFormat

}




