let filterActivated = false;

function toggleFilter() {
    filterActivated = !filterActivated;

    document.querySelector('.FilterOptions').style.display = filterActivated ? "flex" : "none";
    document.querySelector('.SubFilterOptions1').style.display = "none";
    document.querySelector('.SubFilterOptions2').style.display = "none";
    document.querySelector('.SubFilterOptions3').style.display = "none";
}

document.querySelector('.ActivateFilter').addEventListener('click', toggleFilter);


document.querySelector('.Filter001').addEventListener('click', e=>{

    document.querySelector('.SubFilterOptions1').style.display = "flex";
    document.querySelector('.SubFilterOptions2').style.display = "none";
    document.querySelector('.SubFilterOptions3').style.display = "none";

})

document.querySelector('.Filter002').addEventListener('click', e=>{

    document.querySelector('.SubFilterOptions1').style.display = "none";
    document.querySelector('.SubFilterOptions2').style.display = "flex";
    document.querySelector('.SubFilterOptions3').style.display = "none";

})

document.querySelector('.Filter003').addEventListener('click', e=>{

    document.querySelector('.SubFilterOptions1').style.display = "none";
    document.querySelector('.SubFilterOptions2').style.display = "none";
    document.querySelector('.SubFilterOptions3').style.display = "flex";

})


document.querySelector('.Filter004').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Brand";
    document.querySelector('.ThisFilter').value = "Dell";
    document.querySelector('.SendToAplicateFilter').submit();

})


document.querySelector('.Filter005').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Brand";
    document.querySelector('.ThisFilter').value = "Hp";
    document.querySelector('.SendToAplicateFilter').submit();

})


document.querySelector('.Filter006').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Brand";
    document.querySelector('.ThisFilter').value = "Lenonvo";
    document.querySelector('.SendToAplicateFilter').submit();

})


document.querySelector('.Filter007').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Brand";
    document.querySelector('.ThisFilter').value = "Mac";
    document.querySelector('.SendToAplicateFilter').submit();

})


document.querySelector('.Filter008').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Status";
    document.querySelector(".ThisFilter").value = "Tested";
    document.querySelector('.SendToAplicateFilter').submit();

})

document.querySelector('.Filter009').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Status";
    document.querySelector(".ThisFilter").value = "Audited";
    document.querySelector('.SendToAplicateFilter').submit();

})

document.querySelector('.Filter010').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Status";
    document.querySelector(".ThisFilter").value = "Error";
    document.querySelector('.SendToAplicateFilter').submit();

})


document.querySelector('.GoToFilterByModel').addEventListener('click', e=>{

    document.querySelector('.SendToAplicateFilter').action = "Filter/Model";
    document.querySelector(".ThisFilter").value = document.querySelector('.GetModelToFilter').value;
    document.querySelector('.SendToAplicateFilter').submit();

})



//

