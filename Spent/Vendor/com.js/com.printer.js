const QrContainer = document.querySelector('.QrContainer');
const GetGestIDKey = window.location.search;

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