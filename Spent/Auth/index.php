<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/com.img/com.logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-thin-straight/css/uicons-thin-straight.css'>  
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-thin-straight/css/uicons-thin-straight.css'>  
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">    
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>


    <script>

        const LocationFile = "../Vendor/com.css/com.config.css";

        const NewStyles = document.createElement('link');
        NewStyles.rel = "stylesheet";
        NewStyles.type = "text/css";
        NewStyles.href = LocationFile+"?v"+Math.random();
        document.head.appendChild(NewStyles);

    </script>

    <title>Auth • AIH's Expenses</title>
</head>
<body style="overflow:hidden;">

<p class="SelectedUser" hidden>none</p>
<p class="UserName" hidden>none</p>

<div class="NotificationIslandParent">

<div class="NotificationIsland">

    <div class="NotificationRender" style="width:100%; height:100%; position:absolute; left:0px; top:0px; display:flex; justify-content:center; align-items:center;">

        <div class="Icon"></div>
        <t class="Notification"></t>
        <div class="PriorityStatus"></div>

    </div>

    <div class="PreloaderRender" style="width:100%; height:100%; position:absolute; left:0px; top:0px; justify-content:center; align-items:center;">
    
        <div class="spinner">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
            <div class="bar6"></div>
            <div class="bar7"></div>
            <div class="bar8"></div>
            <div class="bar9"></div>
            <div class="bar10"></div>
            <div class="bar11"></div>
            <div class="bar12"></div>
          </div>

          <div class="PreloaderText" style="position:absolute; left:35px;">Generando Reporte</div>

    </div>

</div>

</div>

    <div class="UsersList">

        <div class="CenterBox">

            <header>

                <div class="Logo"></div>
                <t>Selecciona un usuario para acceder</t>

            </header>

            <content>

                <?php

                    require '../config/com.config.php';

                    $Connection->set_charset("utf8");

                    
                    $DoQuery = "SELECT * FROM authusers WHERE 1";
                    $QueryResults = $Connection -> query($DoQuery);

                    if($QueryResults -> num_rows > 0){

                        while($Row = $QueryResults -> fetch_assoc()){

                            $WorkerID = $Row["WorkerID"];
                            $UserName = $Row["UserName"];
                            $Position = $Row["Position"];
                            $Password = $Row["Password"];

                            echo "
                            
                            <cont class='ThisUser' data-name='$UserName' data-password='$Password'>

                                <div class='ProfilePhoto'></div>
                                <div class='UserName'>$UserName</div>
                                <div class='UserAccess'>$Position</div>
                                <div class='goto' title='Gestionar Hello ID'>
                                    <i class='fi fi-rr-sign-in-alt'></i>
                                </div>

                            </cont>
                        
                            
                            ";

                        }

                    }else{

                        echo "!si";

                    }

                ?>

            </content>

        </div>

    </div>
    
    <div class="LoginPage" style="display: none;">

    <div class="BackButtonPack BackToUsers">

        <i class="fi fi-sr-angle-left BackToUsers"></i>
        <p>Usuarios</p>

    </div>

        <div class="ProfilePhoto"></div>
        <div class="UserNameToShow">Mario Castellanos</div>

        <div class="GetPasswordCont">

            <input type="password" class="GetUserPassword" placeholder="Ingresa tu contraseña de Acceso">
            <i class="fi fi-br-angle-small-right"></i>

        </div>

        <div class="ShowText">Presiona enter cuando termines o pulsa el botón de abajo</div> 

        <div class="AuthButton">Continuar</div>

        <div class="AuthMethods">

            <i class="fi fi-rr-key-skeleton-left-right" title="Iniciar sesión con Passkey"></i>
            <i class="fi fi-rr-shuffle ChangeAccount" title="Iniciar sesión en otra cuenta"></i>

        </div>

    </div>

</body>

<script>

    const FileLocation = "../Vendor/com.js/com.auth.js?v="+Math.random();
    const NewScript = document.createElement('script');
    NewScript.type = "text/javascript";
    NewScript.src = FileLocation;
    document.body.appendChild(NewScript)

</script>

<script src="../Vendor/com.js/com.island.config.js"></script>
<script src="../Vendor/com.js/com.versions.js"></script>


</html>