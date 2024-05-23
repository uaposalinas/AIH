function FormatNumberNows(Number){

    var Parts = Number.toString().split(".");

    Parts[0] = Parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    return Parts.join(".");

}

    
    const ScapeTotal = document.querySelector('.ScapeTotal');
    const GetScapeTotal = ScapeTotal.innerHTML;
    const ScapeTotalINT = Math.round(parseInt(GetScapeTotal));

    ScapeTotal.innerHTML = `L ${FormatNumberNows(ScapeTotalINT)}`


    const ScapeExempt = document.querySelector('.ScapeExempt');
    const GetScapeExempt = ScapeExempt.innerHTML;
    const ScapeExemptINT = Math.round(parseInt(GetScapeExempt));

    ScapeExempt.innerHTML = `L ${FormatNumberNows(ScapeExemptINT)}`;

    const ScapeISV15 = document.querySelector('.ScapeISV15');
    const GetScapeISV15 = ScapeISV15.innerHTML;
    const ScapeISV15INT = Math.round(parseInt(GetScapeISV15));

    ScapeISV15.innerHTML = `L ${FormatNumberNows(ScapeISV15INT)}`;

    const ScapeISV18 = document.querySelector('.ScapeISV18');
    const GetScapeISV18 = ScapeISV18.innerHTML;
    const ScapeISV18INT = Math.round(parseInt(GetScapeISV18));

    ScapeISV18.innerHTML = `L ${FormatNumberNows(ScapeISV18INT)}`

    const ScapeOtherISV = document.querySelector('.ScapeOtherISV');
    const GetScapeOtherISV = ScapeOtherISV.innerHTML;
    const ScapeOtherISVINT = Math.round(parseInt(GetScapeOtherISV));

    ScapeOtherISV.innerHTML = `L ${FormatNumberNows(ScapeOtherISVINT)}`