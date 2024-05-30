

    const NewLogStatus = localStorage.getItem('NewLogStatus');

    if(NewLogStatus == "Passed"){

        SendNewMessage("Se guardo el registro con éxito", "https://www.static.devlabsco.space/Public/Assets/Images/Projects/Partners/aih/com.notifications/check.png", "Low", "320px")

    }else if(NewLogStatus == "Failed"){

        SendError('No se pudo guardar el registro');

    }

    setTimeout(() => {
        
        RemoveError()

    }, 5000);

    setTimeout(() => {
        
        localStorage.removeItem('NewLogStatus');

    }, 1000);

