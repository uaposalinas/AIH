


const AllTotals = document.querySelector('.AllTotals');

const Totalss = document.querySelectorAll('.Totals');
let TotalAdd = 0;

for(let Aument = 0; Aument < Totalss.length; Aument++){
    const Total = Totalss[Aument];
    const GetTotal = Total.innerHTML;
    const RemoveLetters = GetTotal.substring(3,1000);
    const Parse = parseInt(RemoveLetters);

    TotalAdd += Parse;


    AllTotals.innerHTML = `L. ${FormatNumberNow(TotalAdd)}`;


}


