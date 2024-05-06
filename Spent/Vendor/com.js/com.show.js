window.addEventListener('load', StartFirmware);

function StartFirmware(){

    const Logo = document.querySelector('.Logo');

    const Attr = Logo.getAttribute('slot');

    const ReplaceLevelOne = Attr.replace(/ /g, "%20");

    Logo.style.backgroundImage = `url(${ReplaceLevelOne})`

}