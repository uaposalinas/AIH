const GetCustomReportOptions = document.querySelectorAll('.ClickOption');
const NextButton = document.querySelector('.NextButton');
const SelectProvider = document.querySelector('.SelectProvider')
const SelectDate = document.querySelector('.SelectDate')
const SelectUser = document.querySelector('.SelectUser')

let ProviderStatus = false;
let DateStatus = false;
let UserStatus = false;

for(let Aument = 0; Aument < GetCustomReportOptions.length; Aument++){

    const Options = GetCustomReportOptions[Aument];

    Options.addEventListener('click', SelectOptionToCustomReport);

    function SelectOptionToCustomReport(e){

        const IndexOf = Array.from(GetCustomReportOptions).indexOf(e.target);

        if(IndexOf == 0){

            if(ProviderStatus == false){

                SelectProvider.style.border = "1px solid #85c6fe";
                ProviderStatus = true

            }else if(ProviderStatus == true){

                SelectProvider.style.border = "1px solid #807e7e";
                ProviderStatus = false


            }

        }else if(IndexOf == 1){

            if(DateStatus == false){

                SelectDate.style.border = "1px solid #85c6fe";
                DateStatus = true

            }else if(DateStatus == true){

                SelectDate.style.border = "1px solid #807e7e";
                DateStatus = false


            }

        }else if(IndexOf == 2){

            if(UserStatus == false){

                SelectUser.style.border = "1px solid #85c6fe";
                UserStatus = true
            
            }else if(UserStatus == true){
            
                SelectUser.style.border = "1px solid #807e7e";
                UserStatus = false
            
            
            }

        }

    }

}


NextButton.addEventListener('click', CompileToSend);

function CompileToSend(){

    class NewCustomReport{

        constructor(Provider, Date, User){

            this.Provider = Provider;
            this.Date = Date;
            this.User = User;

        }

    }


    const DoNow = new NewCustomReport(ProviderStatus, DateStatus, UserStatus);

    const Object = {

        Provider: DoNow.Provider,
        Date: DoNow.Date,
        User:DoNow.User

    }

    const Compress = JSON.stringify(Object);

    localStorage.setItem('NewCustomReport', Compress);

    GetLocalData() 

}


function GetLocalData(){

    if(ProviderStatus == true && DateStatus == true && UserStatus == true){

        //Todos

        const Route = `com.reports/Custom/All?`;
        localStorage.setItem('Destination', Route);


    }else if(ProviderStatus == false && DateStatus == true && UserStatus == true){

        //Fecha y Comprador
        const Route = `com.reports/Custom/Var/DateAndUser`;

        window.open(Route)

    }else if(ProviderStatus == true && DateStatus == true && UserStatus == false){

        //Proveedor y Fecha

        const Route = `com.reports/Custom/Var/ProviderAndDate`;

        window.open(Route);

    }else if(ProviderStatus == true && DateStatus == false && UserStatus == true){

        //Proveedor y Comprador

        const Route = `com.reports/Custom/Var/ProviderAndUser`;

        window.open(Route)

    }else if(ProviderStatus == true){

        //Proveedor

        const Route = `com.reports/Custom/Provider`;

        window.open(Route)

    }else if(DateStatus == true){

        //Fecha

        const Route = `com.reports/Custom/Date`;

        window.open(Route)

    }else if(UserStatus == true){

        //Comprador

        const Route = `com.reports/Custom/User`;

        window.open(Route)

    }else{

        //Error de selección

        SendError('Selecciona al menos una opción');

        setTimeout(() => {
            
            RemoveError()

        }, 3000);

    }



    
}

//Report Engine

function SendCustomReport(){

    const ReportParams = JSON.parse(localStorage.getItem('NewCustomReport'));

    const Route = `/com.reports?Provider=${ReportParams.Provider}&Date=${ReportParams.Date}&User=${ReportParams.User}`;

    

}
