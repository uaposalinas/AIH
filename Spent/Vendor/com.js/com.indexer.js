const ShowInformationJust = document.querySelector('.ShowInformationJust');
const ShowInformation = document.querySelectorAll('.ThisLog');
const SearchByLogs = document.querySelector('.SearchByLog');
const ShowBarResults = document.querySelector('.ShowBarResults');
const SearchBarIndex = document.querySelector('.SearchBarIndex');
const NoResults = document.querySelector('.NoResults');

SearchByLogs.addEventListener('click', InitIndex);

function InitIndex(){

    ShowBarResults.style.display = "flex";
    NoResults.style.display = "none";
    SearchBarIndex.style.display = "flex";

    for(let Hide = 0; Hide < ShowInformation.length; Hide++){

        const Hides = ShowInformation[Hide];

        Hides.style.display = "none";

    }

}

SearchByLogs.addEventListener('keyup', SearchNow);

function SearchNow(){

    for(let Aument = 0; Aument < ShowInformation.length; Aument++){

        const AllLogs = ShowInformation[Aument];    
        const SearchKey = AllLogs.getAttribute('GestID');
        ShowInformation[Aument].style.display = "none";
        NoResults.style.display = "none";

        if(SearchByLogs.value.length <= 25 && SearchByLogs.value === SearchKey){


            AllLogs.style.display = "flex";
            ShowBarResults.style.display = "none";
            AllLogs.classList.add('ShowSearchResult');

            setTimeout(() => {
                
                AllLogs.classList.remove('ShowSearchResult');

            }, 300);
            
            break

        }else if(SearchByLogs.value.length <= 25 && SearchByLogs.value != SearchKey){

            console.log('No se encontro un resultado');
            ShowBarResults.style.display = "flex";
            SearchBarIndex.style.display = "none";
            NoResults.style.display = "flex";

        }else if(SearchByLogs.value.length < 25 || SearchByLogs.value.length > 25 || SearchByLogs.value.trim() === ''){

            console.log("La solicitud no cumple con los parametros");
            ShowBarResults.style.display = "flex";
            SearchBarIndex.style.display = "flex";
            NoResults.style.display = "none";

        }

    }

}


window.addEventListener('keydown', ExitToSearcher);

function ExitToSearcher(e){

    const KeyPressed = e.keyCode;

    if(KeyPressed == 27 && ShowBarResults.style.display == "flex"){

        SearchByLogs.blur();

        ShowBarResults.classList.add('RemoveSearcher');

        setTimeout(() => {
            
            ShowBarResults.classList.remove('RemoveSearcher');
            ShowBarResults.style.display = "none";
            ViewLogs.style.display = "flex";
   

        }, 300);

        for(let Logs = 0; Logs < ShowInformation.length; Logs++){

            const Log = ShowInformation[Logs];
            Log.style.display = "flex";
    
        }

    }

}