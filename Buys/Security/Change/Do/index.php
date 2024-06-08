<?php

$WorkerID = $_POST["WorkerID"];
$GetANewPass = $_POST["GetANewPass"];

if(isset($WorkerID) && isset($GetANewPass)){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "organization";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $DoUpdate = "UPDATE users SET Password = '$GetANewPass' WHERE WorkerID = $WorkerID";

    if($conn->query($DoUpdate) === TRUE){

        echo "<script> window.location.href = '../../../../../'; </script>";

    }else{

        echo "ERROR";

    }


}else{

    echo "<script> window.location.href = '../../../../../'; </script>";

}

?>

