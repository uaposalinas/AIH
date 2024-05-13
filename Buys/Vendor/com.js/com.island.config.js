function SendNewMessage(MessageData, SelectedIcon, NotificationTypeData, WidthData){

    const Notification = document.querySelector('.Notification');
    const Icon = document.querySelector('.Icon');
    const PriorityStatus = document.querySelector('.PriorityStatus');

    class NewNotificationRender {

        constructor(Message, Icon, NotificationType, Width){

            this.Message = Message;
            this.Icon = Icon;
            this.NotificationType = NotificationType;
            this.Width = Width;

        }

    }

    const SendMessageNow = new NewNotificationRender(MessageData, SelectedIcon, NotificationTypeData, WidthData);

    Notification.classList.add('ChangeMessageRender');

    setTimeout(() => {
        
        Notification.classList.remove('ChangeMessageRender');

    }, 500);


    NotificationIsland.style.animation = "pulse 0.5s";

    setTimeout(() => {
        
        Notification.style.animation = "none"

    }, 1000);

    Notification.style.display = "flex";
    Icon.style.display = "flex"; 
    PriorityStatus.style.display = "flex";
    Notification.innerHTML = SendMessageNow.Message;
    Icon.style.backgroundImage = `url(${SendMessageNow.Icon})`;

    if(SendMessageNow.NotificationType == "High"){

        PriorityStatus.style.backgroundColor = "#FF0000";

    }else if(SendMessageNow.NotificationType == "Midle"){

        PriorityStatus.style.backgroundColor = "#fabe25";

    }  if(SendMessageNow.NotificationType == "Low"){

        PriorityStatus.style.backgroundColor = "#1ED761";

    }

    if(SendMessageNow.Width){

        NotificationIsland.style.width = SendMessageNow.Width;

    }else{

        NotificationIsland.style.width = "300px";

    }

    setTimeout(() => {
        
        Notification.style.display = "none";
        Icon.style.display = "none";
        PriorityStatus.style.display = "none"
        NotificationIsland.style.width = "120px";


    }, 5000);

}

function SendPreloader(MessageToPreloader, Width){
    
    document.querySelector('.PreloaderRender').style.display = "flex";
    NotificationIsland.style.animation = "pulse 0.5s";

    setTimeout(() => {
        
        NotificationIsland.style.animation = "none";

    }, 500);

    class NewPreloaderRender{

        constructor(Message, Width){

            this.Message = Message;
            this.Width = Width;

        }

    }

    const SendPreloader = new NewPreloaderRender(MessageToPreloader, Width);

    document.querySelector('.PreloaderText').innerHTML = SendPreloader.Message;
    document.querySelector('.PreloaderText').classList.add('ChangeMessageRender');

    if(SendPreloader.Width){

        NotificationIsland.style.width = SendPreloader.Width;

    }else{

        NotificationIsland.style.width = "300px"

    }


}

function RemovePreloader(){

    document.querySelector('.PreloaderRender').style.display = "none";
    NotificationIsland.style.width = "120px";

}

function SendError(ErrorTypeData, WidthData){

    const Icon = document.querySelector('.Icon');
    const Notification = document.querySelector('.Notification');

    document.querySelector('.NotificationRender').style.display = "flex"

    Icon.style.backgroundImage = "url(https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/Error.png)";
    NotificationIsland.style.backgroundColor = "#980721";

    Icon.style.display = "flex";
    Notification.style.display = "flex"

    class SendNewError{

        constructor(ErrorType, Width){

            this.ErrorType = ErrorType;
            this.Width = Width;

        }

    }

    const SendErrorNow = new SendNewError(ErrorTypeData, WidthData);

    Notification.innerHTML = SendErrorNow.ErrorType;
    Notification.classList.add('ChangeMessageRender');

    setTimeout(() => {
        
        Notification.classList.remove('ChangeMessageRender');

    }, 500);

    if(SendErrorNow.Width){

        NotificationIsland.style.width = SendErrorNow.Width;

    }else{

        NotificationIsland.style.width = "300px";

    }

}

function RemoveError(){

    document.querySelector('.Icon').style.display = "none";
    document.querySelector('.Notification').style.display = "none";

    NotificationIsland.style.backgroundColor = "#2A2A2A";
    NotificationIsland.style.width = "120px";

}
