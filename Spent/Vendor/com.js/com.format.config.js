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

//FormatNumbers

function FormatNumberNow(Number){

    var Parts = Number.toString().split(".");

    Parts[0] = Parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    return Parts.join(".");

}
const Totals = document.querySelectorAll('.Totals');

for(let Aument = 0; Aument < Totals.length; Aument++){

    const Total = Totals[Aument];

    const GetTotals = Total.innerHTML;
    const Numbers = parseFloat(GetTotals);
    
    const Formated = FormatNumberNow(Numbers);

    const FinallyFormat = `L. ${Formated}.00`;

    Total.innerHTML = FinallyFormat

}

const Subtotals = document.querySelectorAll('.Subtotals');

for(let Aument = 0; Aument < Subtotals.length; Aument++){

    const Subtotal = Subtotals[Aument];
    const GetSubtotal = Subtotal.innerHTML;
    const Numbers = parseFloat(GetSubtotal);
    const Formatted = FormatNumberNow(Numbers);

    const FinallyFormat = `L. ${Formatted}`;

    Subtotal.innerHTML = FinallyFormat;

   

}

const Exempts = document.querySelectorAll('.Exempts');

for(let Aument = 0; Aument < Exempts.length; Aument++){

    const Exempt = Exempts[Aument];

    const GetExempts = Exempt.innerHTML;

    const Numbers = parseFloat(GetExempts);
    const Formated = FormatNumberNow(Numbers);

    const FinallyFormat = `L. ${Formated}`;


    Exempt.innerHTML = FinallyFormat;


}

const ISV15s = document.querySelectorAll('.ISV15');

for(let Aument = 0; Aument < ISV15s.length; Aument++){

    const ISV15 = ISV15s[Aument];

    if(ISV15.innerHTML == "L 0.00"){}else{

        const GetISV15 = ISV15.innerHTML;
        const Numbers = parseFloat(GetISV15);
        const RoundOut = Numbers.toFixed(2);
        const Formated = FormatNumberNow(RoundOut);
    
        const FinallyFormat = `L. ${Formated}`;
    
        ISV15.innerHTML = FinallyFormat;
    

    }

}


const ISV18s = document.querySelectorAll('.ISV18');

for(let Aument = 0; Aument < ISV18s.length; Aument++){

    const ISV18 = ISV18s[Aument];

    if(ISV18.innerHTML == "L 0.00"){}else{

        const GetISV18 = ISV18.innerHTML;
        const Numbers = parseFloat(GetISV18);
        const Formated = FormatNumberNow(Numbers);
    
        const FinallyFormat = `L. ${Formated}.00`;
    
        ISV18.innerHTML = FinallyFormat;
    

    }

}


const Others = document.querySelectorAll('.Other');

for(let Aument = 0; Aument < Others.length; Aument++){

    const Other = Others[Aument];

    if(Other.innerHTML == "L 0.00"){}else{

        const GetOther = Other.innerHTML;
        const Numbers = parseFloat(GetOther);
        const Formated = FormatNumberNow(Numbers);
    
        const FinallyFormat = `L. ${Formated}.00`;
    
        Other.innerHTML = FinallyFormat;
    

    }

}

