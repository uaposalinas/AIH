

window.addEventListener('load', StartFirmware);

function StartFirmware(){


    setTimeout(() => {
        
        document.querySelector('.ShowLogPreloader').style.display = "none";
        document.querySelector('.DisplaySelected').style.display = "flex";

    }, 2000);

    const Logo = document.querySelector('.Logo');

    const Attr = Logo.getAttribute('slot');

    const ReplaceLevelOne = Attr.replace(/ /g, "%20");

    Logo.style.backgroundImage = `url(${ReplaceLevelOne})`

}

