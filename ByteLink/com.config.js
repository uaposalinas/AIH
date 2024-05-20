


const EditProfile = document.querySelector('.EditProfile');
const EditProfileButton= document.querySelector('#EditProfileButton');
const BackButtonEdit = document.querySelector('.BackButtonEdit');
const CurrentDNI = document.querySelector('.CurrentDNI');
const GetNewDNI = document.querySelector('.GetNewDNI');
const GetNewPhone = document.querySelector('.GetNewPhone');
const CurrentPhone = document.querySelector('.CurrentPhone');
const GetCurrentPosition = document.querySelector('.GetCurrentPosition');
const GetNewPosition = document.querySelector('.GetNewPosition');
const EditPassword = document.querySelector('.EditPassword');
const CompleteEdit = document.querySelector('.CompleteEdit');
const SendWorkerID = document.querySelector('.SendWorkerID');
const EditProfilePhoto = document.querySelector('.EditProfilePhoto');
const EditUserName = document.querySelector('.EditUserName');
    

//SEND



setTimeout(() => {
    
    document.querySelector('.Preloader').style.display = "none";

}, 2000);




const SendDNI = document.querySelector('.SendDNI');
const SendPhone = document.querySelector('.SendPhone');
const SendPosition = document.querySelector('.SendPosition');

EditProfileButton.addEventListener('click', e=>{

    EditProfile.style.display = "flex";

})

BackButtonEdit.addEventListener('click', e=>{

    EditProfile.classList.add('CloseEditProfile');

    setTimeout(() => {
        
        EditProfile.classList.remove('CloseEditProfile');
        EditProfile.style.display = "none";

    }, 300);

})


CurrentDNI.addEventListener('click', e=>{

    GetNewDNI.style.display = "flex";
    GetNewDNI.value = "";
    GetNewDNI.focus()

})

CurrentPhone.addEventListener('click', e=>{

    GetNewPhone.style.display = "flex";
    GetNewPhone.value = "+504 ";
    GetNewPhone.focus();

})

GetNewPhone.addEventListener('click', e=>{

    GetNewPhone.style.display = "flex";
    GetNewPhone.value = "+504 ";
    GetNewPhone.focus();

})

GetCurrentPosition.addEventListener('click', e=>{

    GetNewPosition.style.display = "flex";
    GetNewPosition.value = GetCurrentPosition.innerHTML;
    GetNewPosition.focus();

})

EditPassword.addEventListener('click', e=>{

    document.querySelector('.SendForChangePass').style.display = "none";
    document.querySelector('.SendForChangePass').submit();
    
})


//Tratamiento de DNI

GetNewDNI.addEventListener('keydown', e=>{


    if(GetNewDNI.value.length === 4){

        GetNewDNI.value = GetNewDNI.value +"-";

    
    }else if(GetNewDNI.value.length === 9){

        GetNewDNI.value = GetNewDNI.value +"-";
    
    }else if(GetNewDNI.value.length >= 15){

        GetNewDNI.blur();

    }else if(GetNewDNI.value.length >= 15){
        
        GetNewDNI.blur();

       if(e.keyCode == 13){

        GetNewDNI.blur();

       }else{

        GetNewDNI.value = GetNewDNI.value.substr(0, 14);

       }

    }

})


//Tratamiendo de Teléfono

GetNewPhone.addEventListener('keydown', e=>{

    if(GetNewPhone.value.length == 9){

        GetNewPhone.value = GetNewPhone.value + "-";

    }else if(GetNewPhone.value.length >= 14){

        GetNewPhone.blur()

    }

})


CompleteEdit.addEventListener('click', e=>{

    setTimeout(() => {
        
        window.location.reload();

    }, 5000);

    SendDNI.value = GetNewDNI.value;
    SendPhone.value = GetNewPhone.value;
    SendPosition.value = GetNewPosition.value;
    SendWorkerID.value = WorkerID;
    var form = document.querySelector('.ControlForm');
    //document.querySelector('.ControlForm').submit()

    e.preventDefault(); 

    var NewWindow = window.open('', 'NewWindow', 'width=400,height=400');

    // Clona el formulario y agrega el contenido a la nueva ventana
    var clonedForm = form.cloneNode(true);
    NewWindow.document.body.appendChild(clonedForm);
    clonedForm.style.display = "none";

    // Envía el formulario en la nueva ventana
    clonedForm.submit();

    window.open('', 'NewWindow', 'width=400,height=400');


    
})



EditProfilePhoto.addEventListener('click', e=>{

    localStorage.setItem('TemporalyWorkerID', WorkerID);
    
    const form = document.querySelector('.WorkIDForm');

    e.preventDefault(); 

    var NewWindow = window.open('', 'NewWindow', 'width=400,height=450');

    
    var clonedForm = form.cloneNode(true);
    NewWindow.document.body.appendChild(clonedForm);
    clonedForm.style.display = "none";

    clonedForm.submit();

 

})



window.addEventListener('message', function(event) {
    if (event.data === 'PhotoUpdated') {
       
        location.reload();
    }
});

window.addEventListener('message', function(event) {
    if (event.data === 'NameUpdate') {
    
        location.reload();
    }
});



EditUserName.addEventListener('click', e=>{

    document.querySelector('.SendFormWithNewName').style.display = "flex";
    document.querySelector('.SendNewName').value = EditUserName.innerHTML.trim("");
    document.querySelector('.SendNewName').focus();

    document.querySelector('.SendNewName').addEventListener('keydown', e=>{

        const KeyPressed = e.keyCode;

        if(KeyPressed == 13){

            const form = document.querySelector('.SendFormWithNewName');
            e.preventDefault(); 
            var NewWindow = window.open('', 'NewWindow', 'width=400,height=450');
            var clonedForm = form.cloneNode(true);
            NewWindow.document.body.appendChild(clonedForm);
            clonedForm.style.display = "none";
            clonedForm.submit();

        }

    })

})




document.querySelector('.SettingsButton').addEventListener('click', e=>{

    const IdentiferSettingsStatus = localStorage.getItem('SettingsStatus');
  
    if(IdentiferSettingsStatus){
  
      localStorage.removeItem('SettingsStatus')
      document.querySelector('.SettingsContainer').style.display = "none";
  
    }else{
  
      localStorage.setItem('SettingsStatus', true)
      document.querySelector('.SettingsContainer').style.display = "flex";
  
    }
  
  })