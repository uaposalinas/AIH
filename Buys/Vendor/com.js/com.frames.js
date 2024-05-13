const DisplayCard = document.querySelector('.DisplayCard');
const BackModal = document.querySelector('.BackModal');
const SoftModals = document.querySelector('.SoftModals');
const SelectCards = document.querySelector('.SelectCards');

DisplayCard.addEventListener('click', e=>{

    BackModal.style.display = "flex";
    SoftModals.style.display = "flex";
    SelectCards.style.display = "flex";

})