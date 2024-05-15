//com.date

const CurrentDate = new Date();
const GetDay = CurrentDate.getDate();
const GetWeekDay = CurrentDate.getDay();
const GetMonth = CurrentDate.getMonth();
const GetYear = CurrentDate.getFullYear();

//FormatMonth

const MonthFormatted = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
const FullMonth = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
const Week = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];


function DetectDayForFormat(){

    if(GetDay < 10){

        return "0"+GetDay;

    }else if(GetDay > 9){

        return GetDay;

    }

}

const DateSet = {

    Day: GetDay,
    Month: MonthFormatted[GetMonth],
    Year: GetYear

} 

const TextPlaneDate = `${DateSet.Day}/${DateSet.Month}/${DateSet.Year}`;
const FormattedDate = `${DateSet.Year}-${DateSet.Month}-${DateSet.Day}`;
const FullDate = `${DateSet.Day} de ${FullMonth[GetMonth]} del ${DateSet.Year}`;


//ASC-2024-202405019875

function GetGestID(){

    const Sub = "ASC";
    const RandomLimit = 4;
    let Value = '';

    for(let Aument = 0; Aument < RandomLimit; Aument++){

        let Random = Math.floor(Math.random() * 10);

        Value += Random;        

    }

    const CreateCode = `${Sub}-${DateSet.Year}-${DateSet.Year}${DateSet.Month}${DateSet.Day}${Value}`;

    console.log("Se creó el codigo de gestión y es el siguiente:" + `(${CreateCode})`);

    return `${Sub}-${DateSet.Year}-${DateSet.Year}${DateSet.Month}${DateSet.Day}${Value}`;

}



const ThisDate = document.querySelector('.ThisDate');
const DateConfirmation = document.querySelector('.DateConfirmation');

ThisDate.placeholder = `La fecha establecida es la de hoy (${TextPlaneDate})`;

DateConfirmation.addEventListener('change', SwitchDateStatus);

function SwitchDateStatus(e){

    if(ThisDate.disabled == false){

        ThisDate.disabled = true;
        ThisDate.placeholder = `La fecha establecida es la de hoy (${TextPlaneDate})`;
        ThisDate.type = "text";
        ThisDate.style = "display:flex; justify-content:left; text-align:left; padding-left:15px;";
        ThisDate.value = "";

    }else if(ThisDate.disabled == true){

        ThisDate.disabled = false;
        ThisDate.type = "date";
        ThisDate.style = "display:flex; justify-content:left; text-align:center; text-align:center; padding-top:10px;"

    }


}


//DateSet


//TotalAmount

//Checkbox

const OtherStatus = document.querySelector('.OtherStatus');
const ISV18Status = document.querySelector('.ISV18Status');
const ISV15Status = document.querySelector('.ISV15Status');
const ExentStatus = document.querySelector('.ExentStatus');

//Inputs

const Exempt = document.querySelector('.Exempt');
const Others = document.querySelector('.Others');
const ISV18 = document.querySelector('.ISV18');
const ISV15 = document.querySelector('.ISV15');
const Subtotal = document.querySelector('.Subtotal');
const Total = document.querySelector('.Total');

ExentStatus.addEventListener('change', SetValueExempt);

function SetValueExempt(){


    Subtotal.focus();
    SendNewMessage('Presiona "Enter" nuevamente para actualizar los registros',"https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/Enter.png", "Midle", "500px")

    if(this.checked == true){

        ISV15Status.checked = false;
        ISV18Status.checked = false;

        Exempt.placeholder = "L "+GetINT;

    }else if(this.checked == false){

        ISV15Status.checked = true;
        ISV18Status.checked = false;
        this.checked = false;


    }


}

ISV18Status.addEventListener('change', SetISV18);

function SetISV18(){

    Subtotal.focus()
    SendNewMessage('Presiona "Enter" nuevamente para actualizar los registros',"https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/Enter.png", "Midle", "500px")

    if(ISV18Status.checked == true){

        ISV15Status.checked = false;
        ExentStatus.checked = false;

    }else if(ISV18Status.checked == false){

        ISV15Status.checked = true;
        ExentStatus.checked = false;

    }



}

ISV15Status.addEventListener('change', SetISV15);

function SetISV15(){

    Subtotal.focus()
    SendNewMessage('Presiona "Enter" nuevamente para actualizar los registros',"https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/Enter.png", "Midle", "500px")


    if(ISV15Status.checked == true){

        ISV18Status.checked = false;
        ExentStatus.checked = false;

    }else if(ISV15Status.checked == false){

        ExentStatus.checked = true;
        ISV15Status.checked = false;

    }

}


Subtotal.addEventListener('keydown', DetectKeyPressed);


function DetectKeyPressed(e){

    const GetINT = parseFloat(Subtotal.value);

    const KeyPressed = e.keyCode;

    if(KeyPressed == 13){

        if(Subtotal.value.trim() === ''){

            SendError('Debes ingresar un monto en subtotal.', "380px");
    
            setTimeout(() => {
                
                RemoveError()
    
            }, 2500);
    
        }else{
            
            
        if(ExentStatus.checked == true){

            Exempt.classList.add('UpdateTotals');

            setTimeout(() => {
                
                Exempt.classList.remove('UpdateTotals');

            }, 300);


            Exempt.value = `L ${GetINT}`;
            ISV15.value = "L 0.00";
            ISV18.value = "L 0.00";

            const SetTotal = GetINT;

            Total.value = "L. " + Math.round(SetTotal);

            Total.classList.add('UpdateTotals');
    
            setTimeout(() => {
                
                Total.classList.remove('UpdateTotals')

            }, 300);


        }else if(ISV18Status.checked == true){

            ISV18.classList.add('UpdateTotals');

            setTimeout(() => {
                
                ISV18.classList.remove('UpdateTotals');

            }, 300);

            const Operation = GetINT * 0.18;
            const RoundOut = Operation.toFixed(2);

            ISV18.value = `L ${RoundOut}`
            Exempt.value = `L 0.00`;
            ISV15.value = "L 0.00";
        
            const SetTotal = parseFloat(RoundOut) + GetINT;

            Total.value = "L." +Math.round(SetTotal);

            Total.classList.add('UpdateTotals');
    
            setTimeout(() => {
                
                Total.classList.remove('UpdateTotals')

            }, 300);



        }else if(ISV15Status.checked == true){

            ISV15.classList.add('UpdateTotals');

            setTimeout(() => {
                
                ISV15.classList.remove('UpdateTotals');

            }, 300);

            const Operation = GetINT * 0.15;
            const RoundOut = Operation.toFixed(2);
        
            ISV15.value = `L. ${RoundOut}`
            Exempt.value = `L 0.00`;
            ISV18.value = "L 0.00";

            const SetTotal = parseFloat(RoundOut) + GetINT;

            Total.value = "L. " + Math.round(SetTotal);

            Total.classList.add('UpdateTotals');
    
            setTimeout(() => {
                
                Total.classList.remove('UpdateTotals')

            }, 300);

        }
    
        }   
    }

}


//Save Logs

const SaveNewLog = document.querySelector('.SaveNewLog');
const ControlForm = document.querySelector('.ControlForm');

SaveNewLog.addEventListener('click', PrepareToSaveTheNewLog);

function PrepareToSaveTheNewLog(){


    const Provider = document.querySelector('.Provider');
    const Amount = document.querySelector('.Amount');
    const Description = document.querySelector('.LogDescription');
    const CountableCount = document.querySelector('.CountableCountIn');
    const BuyType = document.querySelector('.BuyTypeIn');
    const PayType = document.querySelector('.PayTypeIn');
    const Realice = document.querySelector('.Realice');
    const BillID = document.querySelector('.BillID');
    const Subtotal = document.querySelector('.Subtotal');

    if(Provider.value.trim() === "" || Amount.value.trim() === '' || Description.value.trim() === '' || CountableCount.value == "default" || BuyType.value == "default" || PayType.value == "default" || Realice.value == "default" || BillID.value.trim() === '' || Subtotal.value.trim() === ''){

        SendError('Debes llenar todos los campos que están en rojo.', '450px');

        setTimeout(() => {
            
            RemoveError()

        }, 2000);

    }else{

        SendPreloader("Preparando para guardar el nuevo registro", "400px");

        const GestID = document.querySelector('.GestID');
        const Month = document.querySelector('.Month');
        const Year = document.querySelector('.Year');
        const FullDates = document.querySelector('.FullDate');
        const CurrentDay = document.querySelector('.CurrentDay');

        GestID.value = GetGestID();
        Month.value = DateSet.Month;
        Year.value = DateSet.Year;
        FullDates.value = FullDate;
        CurrentDay.value = Week[GetWeekDay]

        if(DateConfirmation.checked == true){

            ThisDate.value = FormattedDate;

        }

        if(PayType.value == "Tarjeta de Crédito"){}else{

            document.querySelector('.CardUsedToPay').value = "N/A";

        }

        setTimeout(() => {
            
            RemovePreloader();

            SendNewMessage("Registro Validado, guardando...", "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/check.png", "Low", "350px")

            setTimeout(() => {
                
                Others.disabled = false;
                Exempt.disabled = false;
                ISV15.disabled = false;
                ISV18.disabled = false;
                Total.disabled = false;
                ThisDate.disabled = false;

                setTimeout(() => {
                    
                    ControlForm.submit()

                }, 1000);

            }, 2000);

        }, 1000);

    }

    const GetAllInputs = document.querySelectorAll('.ThisValue');
    const LimitInputs = GetAllInputs.length;

    const GetAllSelectables = document.querySelectorAll('.SelectValue');
    const LimitSelect = GetAllSelectables.length;

    if(document.querySelector('.ProviderValue').value.trim() === ''){

        document.querySelector('.ProviderCont').style.backgroundColor = "#980721";

    }

    for(let InputsAument = 0; InputsAument < LimitInputs; InputsAument++){


        for(let AumentSelects = 0; AumentSelects < LimitSelect; AumentSelects++){

            const Inputs = GetAllInputs[InputsAument];
            const Selects = GetAllSelectables[AumentSelects];

            if(Inputs.value.trim() === ''){

                Inputs.style.backgroundColor = "#980721";

            }

            if(Selects.value == "default"){

                Selects.style.backgroundColor = "#980721";

            }

            Inputs.addEventListener('click', e=>{

                Inputs.style.backgroundColor = "#2A2A2A";

            })
    

        }



    }


}

