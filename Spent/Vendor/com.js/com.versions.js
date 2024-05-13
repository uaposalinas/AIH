const Scripts = document.getElementsByTagName("script");

for(let Aument = 0; Aument < Scripts.length; Aument++){

    const AllScripts = Scripts[Aument];
    const GetLocation = AllScripts.getAttribute('src');

    const NewLocation = `${GetLocation}?v=${Math.random()}`;

    AllScripts.src = NewLocation;

}