const AllUsers = document.querySelectorAll('.ThisUser');
const LoginPage = document.querySelector('.LoginPage');
const UsersList = document.querySelector('.UsersList');
const UserNameToShow = document.querySelector('.UserNameToShow');
const BackToUsers = document.querySelector('.BackToUsers');
const GetUserPassword = document.querySelector('.GetUserPassword');
const ChangeAccount = document.querySelector('.ChangeAccount');
const AuthButton = document.querySelector('.AuthButton');
const NotificationIsland = document.querySelector('.NotificationIsland');
const Limit = AllUsers.length;


for(let Aument = 0; Aument < Limit; Aument++){

    const User = AllUsers[Aument];
    const GetName = User.getAttribute('data-name');
    const GetPass = User.getAttribute('data-password');



    User.addEventListener('click', AuthNow);

    function AuthNow(){
        
        UserNameToShow.innerHTML = GetName
        UsersList.style.display = "none";
        LoginPage.style.display = "flex";

        setTimeout(() => {
            
            GetUserPassword.focus()

        }, 500);


    }


    AuthButton.addEventListener('click', ValidatePassword);

    GetUserPassword.addEventListener('keyup', GetKey)

    function GetKey(e){

        const KeyPressed = e.keyCode;
        
        if(KeyPressed == 13){

            ValidatePassword()

        }

    }

    function ValidatePassword(){

        if(GetUserPassword.value == GetPass){

            sessionStorage.setItem('AuthStatus', 'Allowed');
            window.location.href = "../";

        }else if(GetUserPassword.value.trim() === ''){

            SendError('Debes escribir la contraseña para acceder.', '400px')


        }else if(GetUserPassword.value != GetPass){

            SendError('La contraseña no coinicide con la correcta.', '400px')


        }
    
    }
    

}


BackToUsers.addEventListener('click', ReturnToUsers);
ChangeAccount.addEventListener('click', ReturnToUsers);


function ReturnToUsers(){

    UsersList.style.display = "flex";
    LoginPage.style.display = "none";


}



