const ShowInformationJust = document.querySelector('.ShowInformationJust');
const ShowInformation = document.querySelectorAll('.ShowInformation');
const SearchByLogs = document.querySelector('.SearchByLog');
const NoResults = document.querySelector('.NoResults');

SearchByLogs.addEventListener('keyup', SearchNow);

function SearchNow(){

    for(let Aument = 0; Aument < ShowInformation.length; Aument++){

        const AllLogs = ShowInformation[Aument];    
        const SearchKey = AllLogs.getAttribute('GestID');
        AllLogs.style.display = "none";

        if(SearchByLogs.value === SearchKey){

            AllLogs.classList.add('ShowSearchResult');

            setTimeout(() => {

                AllLogs.classList.remove('ShowSearchResult');
                
            }, 300);

            AllLogs.style.display = "flex";

        }else{

            NoResults.style.display = "none";
            SearchBarIndex.style.display = "none";

        }

    }

}