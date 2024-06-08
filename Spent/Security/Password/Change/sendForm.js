

    const GetTemporalyKey = localStorage.getItem('SetUpTemporalyKey');
    const ConvertToUseObj = JSON.parse(GetTemporalyKey);

  //  document.querySelector('.WriteWorkerID').value = ConvertToUseObj.UserName;
  


        const ControlForm = document.querySelector('.ControlForm');
        const GetANewPass = document.querySelector('.GetANewPass');
        const GetANewPassConfirm = document.querySelector('.GetANewPassConfirm');
        const SendForm = document.querySelector('.SendForm');
        const ShowError = document.querySelector('.ShowError');

        SendForm.addEventListener('click', e=>{

            if(GetANewPass.value == ConvertToUseObj.UserPass){

                ShowError.style.opacity = "1";
                ShowError.classList.add('AnyError');

                setTimeout(() => {
                    
                    ShowError.classList.remove('AnyError')

                }, 2000);

                ShowError.innerHTML = "No puedes usar la misma contraseña";

                setTimeout(() => {
                    
                    ShowError.style.opacity = "0"

                }, 4000);

            }else{

                if(GetANewPass.value.trim() == ""){

                    ShowError.style.opacity = "1";
                    ShowError.innerHTML = "Debes establecer una contraseña";

                    setTimeout(() => {
                        
                        ShowError.style.opacity = "0";

                    }, 4000);

                }else{

                    if(GetANewPass.value.length < 8){

                        ShowError.style.opacity = "1";
                        ShowError.innerHTML = "La contraseña debe medir mínimo 8 caracteres";

                        setTimeout(() => {
                            
                            ShowError.style.opacity = "0";

                        }, 4000);

                    }else{

                        if(GetANewPassConfirm.value == GetANewPass.value){

                            SendForm.style.backgroundColor = "#9b9b9b";
                            document.querySelector('.TextContinue').style.display = "none";
                            document.querySelector('.PreloaderContainer').style.display = "flex"
                            
                            setTimeout(() => {
                                
                                document.querySelector('.GetControl001').style.display = "none";
                                ControlForm.style.display = "none";
                                document.querySelector('.AllLoginContainer').style.width = "300px";
                                document.querySelector('.ConfirmChange').style.display = "flex";
    
                            }, 3000);
    
    
                        }else{
    
                            ShowError.style.opacity = "1";
                            ShowError.innerHTML = "Las contraseñas no coinciden";
    
                            setTimeout(() => {
                                
                                ShowError.style.opacity = "0"
    
                            }, 4000);
    
                        }
    

                    }

                }

            }

        })




document.querySelector('.SendAllButton').addEventListener('click', e=>{

    localStorage.removeItem('SetUpTemporalyKey');
    document.querySelector('.ControlForm').submit();

})




