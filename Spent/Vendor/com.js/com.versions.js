const Scripts = document.getElementsByTagName("script");
const Links = document.getElementsByTagName('link')

for(let Aument = 0; Aument < Scripts.length; Aument++){

    const AllScripts = Scripts[Aument];
    const GetLocation = AllScripts.getAttribute('src');

    const NewLocation = `${GetLocation}?v=${Math.random()}`;

    AllScripts.src = NewLocation;

}

for(let Aument = 0; Aument < Links.length; Aument++){

    const AllLinks = Links[Aument];
    const GetLocation = AllLinks.getAttribute('href')

    const NewLocation = `${GetLocation}?v=${Math.random()}`;

    AllLinks.href = NewLocation;

}