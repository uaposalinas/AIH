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


let Stat = 0; 

function GetLocalData(){

    if(ProviderStatus == true && DateStatus == true && UserStatus == true){

        //Todos

        const Route = `com.reports/Custom/All?`;
        localStorage.setItem('DestinationName', "All");
        Stat = 1;
        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectProviderForCustomReport').style.display = "flex";


    }else if(ProviderStatus == false && DateStatus == true && UserStatus == true){

        //Fecha y Comprador
        const Route = `com.reports/Custom/Var/DateAndUser`;
        localStorage.setItem('DestinationName', "DateAndUser");
        Stat = 2;
        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectDateForCustomReport').style.display = "flex";


    }else if(ProviderStatus == true && DateStatus == true && UserStatus == false){

        //Proveedor y Fecha

        const Route = `com.reports/Custom/Var/ProviderAndDate`;

        localStorage.setItem('DestinationName', "ProviderAndDate");
        Stat = 3;

        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectProviderForCustomReport').style.display = "flex";

    }else if(ProviderStatus == true && DateStatus == false && UserStatus == true){

        //Proveedor y Comprador

        const Route = `com.reports/Custom/Var/ProviderAndUser`;
        localStorage.setItem('DestinationName', "ProviderAndUser");
        Stat = 4;
        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectProviderForCustomReport').style.display = "flex";


    }else if(ProviderStatus == true){

        //Proveedor

        const Route = `com.reports/Custom/Provider`;

        localStorage.setItem('DestinationName', "Provider");

        Stat = 5;

        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectProviderForCustomReport').style.display = "flex";

    }else if(DateStatus == true){

        //Fecha

        const Route = `com.reports/Custom/Date`;

        localStorage.setItem('DestinationName', "Date");

        Stat = 6;

        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectDateForCustomReport').style.display = "flex";

    }else if(UserStatus == true){

        //Comprador

        const Route = `com.reports/Custom/User`;

        localStorage.setItem('DestinationName', "User");
        Stat = 7;
        document.querySelector('.SelectForCustomReport').style.display = "none";
        document.querySelector('.ActivateButton').style.display = "none";
        document.querySelector('.SelectUserForCustomReport').style.display = "flex";


    }else{

        //Error de selección

        SendError('Selecciona al menos una opción');

        setTimeout(() => {
            
            RemoveError()

        }, 3000);

    }



    
}


function SendCustomReport(){

    const ReportParams = JSON.parse(localStorage.getItem('NewCustomReport'));

    const Route = `/com.reports?Provider=${ReportParams.Provider}&Date=${ReportParams.Date}&User=${ReportParams.User}`;

    

}


const SelectProviderNows = document.querySelector('.SelectProviderNows');

SelectProviderNows.addEventListener('click', ShowProvidersForCustomReport);

function ShowProvidersForCustomReport(){

    document.querySelector('.SoftModals')
    document.querySelector('.ProvidersPopup').style.display = "flex";

}



//Report Engine

const DestinationName = localStorage.getItem('DestinationName');
const ReportNextPosition = document.querySelectorAll('.ReportNextPosition');

let MustBe = 0;
let GetReportDataPosition = 0;

if(DestinationName == "All"){

    MustBe = 3;
    Stat = 1;

}else if(DestinationName == "DateAndUser"){

    MustBe = 2;
    Stat = 2;

}else if(DestinationName == "ProviderAndDate"){

    MustBe = 2;
    Stat = 3;

}else if(DestinationName == "ProviderAndUser"){

    MustBe = 2;
    Stat = 4;

}else if(DestinationName == "Provider"){

    MustBe = 1;
    Stat = 5;

}else if(DestinationName == "Date"){

    MustBe = 1;
    Stat = 6;

}else if(DestinationName == "User"){

    MustBe = 1;
    Stat = 7;

}

for(let Aument = 0; Aument < ReportNextPosition.length; Aument++){

    const Buttons = ReportNextPosition[Aument];

    Buttons.addEventListener('click', SelectThisClick);

    //0 Provider
    //1 Date
    //2 User

    function SelectThisClick(e){

        const IndexOf = Array.from(ReportNextPosition).indexOf(e.target)

        if(Stat == 1){

            if(IndexOf == 0){

                document.querySelector('.SelectProviderForCustomReport').style.display = "none";
                document.querySelector('.SelectDateForCustomReport').style.display = "flex";

            }else if(IndexOf == 1){

                document.querySelector('.SelectDateForCustomReport').style.display = "none";
                document.querySelector('.SelectUserForCustomReport').style.display = "flex";

            }else if(IndexOf == 2){

                console.log('ya');

            }

        }else if(Stat == 2){

            if(IndexOf == 1){

                document.querySelector('.SelectDateForCustomReport').style.display = "none";
                document.querySelector('.SelectUserForCustomReport').style.display = "flex";

            }else if(IndexOf == 2){

                console.log('ya');
                alert('')

            }

        }else if(Stat == 3){

            if(IndexOf == 0){

                document.querySelector('.SelectProviderForCustomReport').style.display = "none";
                document.querySelector('.SelectDateForCustomReport').style.display = "flex";

            }else if(IndexOf == 1){

                console.log('ya');

            }

        }else if(Stat == 4){
           
            if(IndexOf == 0){

                document.querySelector('.SelectProviderForCustomReport').style.display = "none";
                document.querySelector('.SelectUserForCustomReport').style.display = "flex";

            }else if(IndexOf == 2){

                console.log('ya');

            }

        }else if(Stat == 5){

            if(IndexOf == 0){

                console.log('ya');


            }
        }else if(Stat == 6){

            if(IndexOf == 1){

                console.log('ya');

            }
        }else if(Stat == 7){

            if(IndexOf == 2){

                console.log('ya');

            }
        }




    }

}


