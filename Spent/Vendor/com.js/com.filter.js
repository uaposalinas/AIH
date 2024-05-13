const FilterByDate = document.querySelector('.FilterByDate');
const ElementsForFilter = document.querySelectorAll('.ThisLog');

FilterByDate.addEventListener('change', FilterNow);

function FilterNow(){

    for(let Aument = 0; Aument < ElementsForFilter.length; Aument++){

        const Elements = ElementsForFilter[Aument];
        const FilterKey = Elements.getAttribute('date');
    
        Elements.style.display = "none";

        console.log(Elements);
        console.log(FilterKey);

        if(FilterByDate.value == FilterKey){

            Elements.style.display = "flex";

        }else{

           // Elements.style.display = "none";

        }
    
    }

}

