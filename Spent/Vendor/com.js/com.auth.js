const UserNameToShow = document.querySelector('.UserNameToShow');
const GetUserPassword = document.querySelector('.GetUserPassword');
const ShowText = document.querySelector('.ShowText');
const AuthButton = document.querySelector('.AuthButton');

function GetMetaNode(){



    console.table(ModuleData)

}


function Monitorizate(){

    const GetAuthorizationForMonitorizate = prompt("Esta acción consumirá más memoria RAM y es probable que la unidad se congele si tu dispositivo es de escasos recursos.");
    
    if(GetAuthorizationForMonitorizate == "true"){

        setInterval(() => {
            
            const GetConnectionStatus = navigator.onLine;

            if(!GetConnectionStatus == true){

                console.log('Err_Connect');

            }

        }, 1000);

    }else{

        console.log('OK')

    }

}


