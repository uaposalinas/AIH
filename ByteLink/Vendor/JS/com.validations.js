const SelectWhereAreTheError = document.querySelector('.SelectWhereAreTheError');
const GetUserInformationForScreenError = document.querySelector('.GetUserInformationForScreenError');
const SendScreenReport = document.querySelector('.SendScreenReport');

SendScreenReport.addEventListener('click', e=>{

    if(SelectWhereAreTheError.value === "0"){

        alert('Debes seleccionar una opción');

    }else{

        const selectElement = document.querySelector('.SelectWhereAreTheError');
        const selectedOptionText = selectElement.options[selectElement.selectedIndex].text;

        document.querySelector('.WriteWhereErrorScreen').value = selectedOptionText;

    }

    if(GetUserInformationForScreenError.value.trim() === ''){

        alert('Debes decir que error encontraste.');

    }else{

        if(GetUserInformationForScreenError.value === "0" || GetUserInformationForScreenError.value.trim() === ""){

            alert('Debes llenar toda la información');

        }else{

            document.querySelector('.ScreenTest').style.display = "none";
            document.querySelector('.FormErrorScreenTest').style.display = "none";
            alert('Gracias por brindar esa información, servirá para guardarla en la base de datos y en el certificado de prueba.');
            document.querySelector('.ShareErrorType').value = SelectWhereAreTheError.value;
            document.querySelector('.ShareErrorNote').value = GetUserInformationForScreenError.value;
            StartTouchPadTest()


        }

    }

})