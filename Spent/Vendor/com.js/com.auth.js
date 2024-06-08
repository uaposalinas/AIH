const AllUsers = document.querySelectorAll('.ThisUser');
const LoginPage = document.querySelector('.LoginPage');
const UsersList = document.querySelector('.UsersList');
const UserNameToShow = document.querySelector('.UserNameToShow');
const BackToUsers = document.querySelector('.BackToUsers');
const GetUserPassword = document.querySelector('.GetUserPassword');
const ChangeAccount = document.querySelector('.ChangeAccount');
const AuthButton = document.querySelector('.AuthButton');
const NotificationIsland = document.querySelector('.NotificationIsland');
const SelectedUser = document.querySelector('.SelectedUser');
const UserName = document.querySelector('.UserName');
const Limit = AllUsers.length;

function ReturnMonth(){

    const CurrentDate = new Date();
    const GetMonth = CurrentDate.getMonth();
    const MonthID = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

    const String = MonthID[GetMonth];

    return String;

}


for(let Aument = 0; Aument < Limit; Aument++){

    const User = AllUsers[Aument];
    const GetName = User.getAttribute('data-name');
    const GetPass = User.getAttribute('data-password');

    console.log(Aument)

    User.addEventListener('click', AuthNow);

    function AuthNow(){
        
        UserNameToShow.innerHTML = GetName
        UsersList.style.display = "none";
        LoginPage.style.display = "flex";
        SelectedUser.innerHTML = GetPass;
        UserName.innerHTML = GetName;

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

        if(GetUserPassword.value == SelectedUser.innerHTML){

     


            if(GetUserPassword.value == "@IH2024$"){

                SendPreloader(`Espera un momento, debemos configurar algo antes...`, "450px");

                
                const CurrentAccountObj = {

                    UserName: UserNameToShow.innerHTML,
                    UserPass: SelectedUser.innerHTML,

                }

                const PackElement = JSON.stringify(CurrentAccountObj);

                localStorage.setItem('SetUpTemporalyKey', PackElement)<

                setTimeout(() => {
                    
                    window.location.href = "../Security/Password/Change"

                }, 3000);

            }else{

                sessionStorage.setItem('AuthStatus', 'Allowed');
                sessionStorage.setItem('UserName', UserNameToShow.innerHTML)
               
                SendPreloader(`Iniciando sesión con el usuario: ${UserName.innerHTML}`, "450px");
    
                setTimeout(() => {
                    
                     window.location.href = `../?ForceFilterByMonth=${ReturnMonth()}`;
    
                }, 1500);

            }

        }else if(GetUserPassword.value.trim() === ''){

            SendError('Debes escribir la contraseña para acceder.', '400px');

            setTimeout(() => {
                
                RemoveError()

            }, 2000);


        }else if(GetUserPassword.value != GetPass){

            SendError('La contraseña no coinicide con la correcta.', '400px')
            
            setTimeout(() => {
                
                RemoveError()

            }, 2000);


        }
    
    }
    

}


BackToUsers.addEventListener('click', ReturnToUsers);
ChangeAccount.addEventListener('click', ReturnToUsers);


function ReturnToUsers(){

    UsersList.style.display = "flex";
    LoginPage.style.display = "none";


}



