function FormatNumberNows(Number){

    var Parts = Number.toString().split(".");

    Parts[0] = Parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    return Parts.join(".");

}

    
    const ScapeTotal = document.querySelector('.ScapeTotal');
    const GetScapeTotal = ScapeTotal.innerHTML;
    const ScapeTotalINT = parseFloat(GetScapeTotal).toFixed(2);

    ScapeTotal.innerHTML = `L ${FormatNumberNows(ScapeTotalINT)}`


    const ScapeExempt = document.querySelector('.ScapeExempt');
    const GetScapeExempt = ScapeExempt.innerHTML;
    const ScapeExemptINT = parseFloat(GetScapeExempt).toFixed(2);

    ScapeExempt.innerHTML = `L ${FormatNumberNows(ScapeExemptINT)}`;

    const ScapeISV15 = document.querySelector('.ScapeISV15');
    const GetScapeISV15 = ScapeISV15.innerHTML;
    const ScapeISV15INT = parseFloat(GetScapeISV15).toFixed(2);

    ScapeISV15.innerHTML = `L ${FormatNumberNows(ScapeISV15INT)}`;

    const ScapeISV18 = document.querySelector('.ScapeISV18');
    const GetScapeISV18 = ScapeISV18.innerHTML;
    const ScapeISV18INT = parseFloat(GetScapeISV18).toFixed(2);

    ScapeISV18.innerHTML = `L ${FormatNumberNows(ScapeISV18INT)}`

    const ScapeOtherISV = document.querySelector('.ScapeOtherISV');
    const GetScapeOtherISV = ScapeOtherISV.innerHTML;
    const ScapeOtherISVINT = parseFloat(GetScapeOtherISV).toFixed(2);

    ScapeOtherISV.innerHTML = `L ${FormatNumberNows(ScapeOtherISVINT)}`

    const GetExentTotals = document.querySelectorAll('.GetExentTotals');

    let Add = 0;

    for(let Aument = 0; Aument < GetExentTotals.length; Aument ++){

        const Total = GetExentTotals[Aument];
        const GetTotal = Total.innerHTML;
        const RemoveLetters = GetTotal.substring(2, 1000)
        const Parse = parseFloat(RemoveLetters);

        console.log(Parse);

    }

    
    const ScapeExempts = document.querySelector('.ScapeExempts');
    const GetScapeExempts = ScapeExempts.innerHTML;
    const ScapeExemptsINT = parseFloat(GetScapeExempts).toFixed(2);

    ScapeExempts.innerHTML = `L ${FormatNumberNows(ScapeExemptsINT)}`;

    
    const ScapeExemptS = document.querySelector('.ScapeExemptS');
    const GetScapeExemptS = ScapeExemptS.innerHTML;
    const ScapeExemptSINT = parseFloat(GetScapeExemptS).toFixed(2);

    ScapeExemptS.innerHTML = `L ${FormatNumberNows(ScapeExemptSINT)}`;