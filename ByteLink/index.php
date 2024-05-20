
<?php

/*    if(isset($_POST["SendWorkID"])){

        echo "<script> console.log('Se inició sesión') </script>";

    }else{

        echo "<script> window.location.href = '../' </script>";

    }*/

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title class="DynamicTitle">AIH Team</title>
        <meta name="author" content="DevLabs Corporation LLC" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel="shortcut icon" href="../root/team.png" type="image/x-icon">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
        <link rel="stylesheet" href="demo.css" />
        <link rel="stylesheet" href="Assets/com.config.css">
        <link rel="stylesheet" href="../root/Fonts/IndexFontsCaviarDreams.css">
        <link rel="stylesheet" href="../root/Fonts/IndexFontsRoboto.css">
        <link rel="stylesheet" href="../root/Fonts/IndexFontsInter.css">
        <link rel='stylesheet' href='../root/Sources/uicons-regular-rounded.css'>
        <link rel='stylesheet' href='../root/Sources/uicons-thin-straight.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-thin-straight/css/uicons-thin-straight.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
        <link rel="stylesheet" href="../root/animate.min.css">
        
    
    </head>
<body>

    <div class="Preloader">

    <div class="showbox">
  <div class="loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
  </div>
</div>

    </div>

    <div class="ProfileContent">

        <header> <i class="fi fi-rr-user-gear ProfileSettingsButton SettingsButton"></i> <i class="fi fi-tr-user-pen" id="EditProfileButton" class="EditProfileButton"></i> </header>
        <div class="UserDetails">

          
        <?php

            /*$GetWorkerID = $_POST["SendWorkID"];
        
            $ServerName = "localhost";
            $UserName = "root";
            $Password = "";
            $DatabaseName = "organization";

            $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);
            $DoQuery = "SELECT ProfilePhoto, Name, Position, Status  FROM users WHERE WorkerID = '$GetWorkerID'";
            $QueryResults = $Connection -> query($DoQuery);

            if($QueryResults -> num_rows > 0){

                $Row = $QueryResults -> fetch_assoc();
                $GetProfilePhoto = $Row["ProfilePhoto"];
                $GetUserName = $Row["Name"];
                $GetUserPosition = $Row["Position"];
                $GetUserRol = $Row["Status"];

                echo "<div class='ProfilePhoto' style='background-image:url(../root/Priv_US/ProfilePhotos/$GetProfilePhoto);'> <div class='ActiveStatus'></div> </div>";
                echo "<p class='UserName'>$GetUserName </p>";
                echo "<p class='WorkerPosition'>$GetUserPosition</p>";

                if($GetUserRol == "admin"){

                    echo "<i class='fi fi-rr-crown' class='VerifiedIcon' style='color:#7668AF;position:absolute;font-size:25px;bottom:0;' title='Administrador'></i>";

                }else if($GetUserRol == "member"){



                }

            }else{

                echo "Error";

            }*/

        ?>
            

        </div>

    <div class="UserInfo">

        <div class="INFO">

        <div class="HEADER"><p>Información General</p></div>   
        <p class="MemberTime"></p>    

            <?php

                $GetWorkerID = $_POST["SendWorkID"];

                $ServerName = "localhost";
                $UserName = "root";
                $Password = "";
                $DatabaseName = "organization";

                $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);
                $DoQuery = "SELECT AddedOn FROM users WHERE WorkerID = $GetWorkerID";
                $QueryResults = $Connection ->query($DoQuery);

                if($QueryResults -> num_rows > 0){

                    $Row = $QueryResults -> fetch_assoc();
                    $GetAddedOn = $Row["AddedOn"];

                    echo '<script>
                    const Time = \'' . $GetAddedOn . '\'; 
                    function ConvertDateStringToFormat(dateString) { 
                        const DateAndTime = dateString.split(\' \'); 
                        const Date = DateAndTime[0]; 
                        const DateParts = Date.split(\'-\'); 
                        const Day = DateParts[2]; 
                        const Month = DateParts[1]; 
                        const Year = DateParts[0]; 
                        const FormattedDate = \'\'+Day+\'/\'+Month+\'/\'+Year+\'\'; 
                        document.querySelector(\'.MemberTime\').textContent = \'Miembro desde \' + FormattedDate; 
                    } 
                    ConvertDateStringToFormat(Time); 
                </script>';
                    
                    
                }

            ?>
  
       
        <div class="WriteINFO">
                

        <?php

            
           /* $GetWorkerID = $_POST["SendWorkID"];    

            $ServerName = "localhost";
            $UserName = "root";
            $Password = "";
            $DatabaseName = "organization";

            $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);
            $DoQuery = "SELECT DNI, Status, Phone, Position FROM users WHERE WorkerID = $GetWorkerID";
            $QueryResults = $Connection ->query($DoQuery);

            $Row = $QueryResults -> fetch_assoc();

            $GetDNI = $Row["DNI"];
            $GetStatus = $Row["Status"];
            $GetPhone = $Row["Phone"];
            $GetPosition = $Row["Position"];

            echo "<div class='DNI'> <i class='fi fi-tr-passport'></i>  <p>$GetDNI</p></div>";

            if($GetStatus == "member"){

                $ReturnStatus = "Miembro";

            }else if($GetStatus == "admin"){

                $ReturnStatus = "Administrador";

            }

            echo "<div class='Rol'> <i class='fi fi-sr-users-alt'></i> <p>$ReturnStatus</p></div>";
            echo "<div class='Phone'> <i class='fi fi-tr-phone-call'></i> <p>$GetPhone</p></div>";
            echo "<div class='Position'><i class='fi fi-rr-briefcase'></i> <p>$GetPosition</p></div>"

            */

        ?>
        
        
    


        </div>
        </div>

    </div>
    </div>

    <div class="EditProfile">

    <div class="ContainerEditWrapper">

        <div class="ContainerEdit">

            <div class="ProfileContent">

                <header> <div class="BackButtonEdit" title=""> <i class="fi fi-rr-arrow-small-left"></i> </div>  <div class="CompleteEdit"> <i class="fi fi-br-check"></i> </div> </header>
                <div class="UserDetails">
                    
                    <form action="Edit/Name/" method="post" class="SendFormWithNewName">
                        
                        <input type="text" name="SendNewName" class="SendNewName" autocomplete="off">
                        
                        <?php
                        
                            $$GetWorkerID = $_POST["SendWorkID"];

                            echo "<input type='text' name='SendWorkerID' style='display:none' autocomplete='off' value='$GetWorkerID'>";

                        ?>
                        
                    </form>
        
                <?php

                    $GetWorkerID = $_POST["SendWorkID"];

                    $ServerName = "localhost";
                    $UserName = "root";
                    $Password = "";
                    $DatabaseName = "organization";

                    $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);
                    $DoQuery = "SELECT ProfilePhoto, Name, Position, Status  FROM users WHERE WorkerID = '$GetWorkerID'";
                    $QueryResults = $Connection -> query($DoQuery);

                    if($QueryResults -> num_rows > 0){

                        $Row = $QueryResults -> fetch_assoc();
                        $GetProfilePhoto = $Row["ProfilePhoto"];
                        $GetUserName = $Row["Name"];
                        $GetUserPosition = $Row["Position"];
                        $GetUserRol = $Row["Status"];

                        echo "<div class='ProfilePhoto EditProfilePhoto' style='background-image:url(../root/Priv_US/ProfilePhotos/$GetProfilePhoto);'> <div class='EditHover'> <i class='fi fi-rr-pencil'></i> </div> <div class='ActiveStatus'></div> </div>";
                        echo "<p class='UserName EditUserName'>$GetUserName </p>";
                        echo "<p class='WorkerPosition'>$GetUserPosition</p>";

                        if($GetUserRol == "admin"){

                            echo "<i class='fi fi-rr-crown' class='VerifiedIcon' style='color:#7668AF;position:absolute;font-size:25px;bottom:0;' title='Administrador'></i>";

                        }else if($GetUserRol == "member"){



                        }

                    }else{

                        echo "Error";

                    }

?>
        
                </div>
        
            <div class="UserInfo" style="position:absolute;bottom:0px">
        
                <div class="INFO">
        
                <div class="HEADER"><p>Editar Información</p></div>     
                <p class="MemberTime">Pulsa lo que quieras editar</p>    
               
                <div class="WriteINFO" >

                <?php

            
                    $GetWorkerID = $_POST["SendWorkID"];    

                    $ServerName = "localhost";
                    $UserName = "root";
                    $Password = "";
                    $DatabaseName = "organization";

                    $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);
                    $DoQuery = "SELECT DNI, Status, Phone, Position FROM users WHERE WorkerID = $GetWorkerID";
                    $QueryResults = $Connection ->query($DoQuery);

                    $Row = $QueryResults -> fetch_assoc();

                    $GetDNI = $Row["DNI"];
                    $GetStatus = $Row["Status"];
                    $GetPhone = $Row["Phone"];
                    $GetPosition = $Row["Position"];

                    echo "<div class='EditDNI'><i class='fi fi-tr-passport'></i> <p class='CurrentDNI'>$GetDNI</p> <input type='text' class='GetNewDNI'></div>";
                    echo "<div class='EditPassword' style='cursor: pointer;'> <i class='fi fi-ss-exit'></i> <p>Contraseña de Acceso</p></div>";
                    echo "<div class='EditPhone'><i class='fi fi-tr-phone-call'></i> <p class='CurrentPhone'>$GetPhone</p> <input type='text' class='GetNewPhone'></div>";
                    echo "<div class='EditPosition'><i class='fi fi-rr-briefcase'></i> <p class='GetCurrentPosition'>$GetPosition</p> <input type='text' class='GetNewPosition'></div>"

?>        
                    <form action="Edit/" method="post" class="ControlForm hide" target="NewWindow">

                        <input type="text" name="SendDNI" class="SendDNI">
                        <input type="text" name="SendPhone" class="SendPhone">
                        <input type="text" name="SendPosition" class="SendPosition">
                        <input type="text" name="SendWorkerIDs" class="SendWorkerID">

                    </form>

                </div>
                </div>
        
            </div>
            </div>

        </div>

    </div>

    </div>

    <div class="SettingsContainer">

<div class="MenuOptions">

    <div class="Items">

        <div class="Item002" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator2"></ind> <icon class="icon"></icon> <p>Seguridad</p> </div>
        <div class="Item003" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator3"></ind> <icon class="icon"></icon> <p>Privacidad</p> </div>
        <div class="Item004" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator4"></ind> <icon class="icon"></icon> <p>Preferencias</p> </div>
        <div class="Item005" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator5"></ind> <icon class="icon"></icon> <p>Personalización</p> </div>
        <div class="Item006" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator6"></ind> <icon class="icon"></icon> <p>Información</p> </div>
        <div class="Item007" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator7"></ind> <icon class="icon"></icon> <p>Sincronizar</p> </div>
        <div class="Item008" style="transition:all 300ms;"><ind class="PositionIndicator PositionIndicator8"></ind> <icon class="icon"></icon> <p>Cerrar Sesión</p> </div>

    </div>

    <div class="Profile"><ind class="PositionIndicator PositionIndicator1"></ind> <icon class="icon"></icon> <p style="position: absolute; top:10px;">Perfil</p> </div>

</div>

<div class="OptionSelected">

    <div class="General">

        <t class="Title">General</t>
        <p class="P001">Inicio de Sesión</p>
        <p class="P002">Guardar las credenciales de inicio de sesión</p>

        <div class="switch switch001">
            <input type="checkbox" id="switchToggle001">
            <label for="switchToggle001" class="slider"></label>
          </div>

          <p class="P003">Moneda por defecto</p>
          <p class="P004">Selecciona la moneda para mostrar</p>

          <select name="" id="" class="SelectCurrency">

            <option value="Default">LPS (Lempiras Honduras)</option>
            <option value="USD">USD $ (Dólar USA)</option>

          </select>




    </div>

    <div class="Security">

        <t class="Title">Seguridad</t>
        <p class="P001">Caducación de Sesión</p>
        <p class="P002">Elige en cuanto tiempo deseas que se cierre sesión al no tener interacción</p>
        <input type="text" class="GetTime" placeholder="Establece el tiempo">
        <select class="GetTimeType">

            <option value="Minutes">Minutos</option>
            <option value="Secs">Segundos</option>
            <option value="Hours">Horas</option>

        </select>
        <p class="P003">Cambiar Credenciales</p>
        <p class="P004">Puedes cambiar las credenciales de inicio de sesión si están en riesgo o las olvidas</p>
        <input type="text" class="GetANewPass" placeholder="Ingresa la nueva contraseña">



    </div>

    <div class="Privacy">

        <t class="Title">Privacidad</t>
        <p class="P001">Modo Hermético</p>
        <p class="P002">Si piensas que estás bajo un ataque, puedes activarlo para evitar pérdida o robo de información.</p>

        <div class="switch switch002">
            <input type="checkbox" id="switchToggle002">
            <label for="switchToggle002" class="slider"></label>
          </div>

    </div>

   
</div>

</div>

    
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php

    $GetWorkerID = $_POST["SendWorkID"];

    echo "
    
    <script>

    const WorkerID = '$GetWorkerID';

    </script>

    ";


    echo "<form action='Edit/ProfilePhoto/' method='post' class='WorkIDForm'><input type='text' name='SendWorkID' value='$GetWorkerID'></form>";

    


    $GetWorkerID = $_POST["SendWorkID"];

    $Connection = new mysqli("localhost", "root", "", "organization");
    $DoQuery = "SELECT Password FROM users WHERE WorkerID = $GetWorkerID";
    $QueryResults = $Connection -> query($DoQuery);



    if($QueryResults -> num_rows > 0){

        $Row = $QueryResults -> fetch_assoc();

        $GetPassword = $Row["Password"];
    
        echo "$<form action='Edit/Password/Auth/' method='post' class='SendForChangePass'><input type='text' name='GetCurrentKey' value='$GetPassword' class='SavePass'> <input type='text' name='WorkerID' value='$GetWorkerID' class='SaveID'> </form>";
    }


?>


<script src="com.config.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>

