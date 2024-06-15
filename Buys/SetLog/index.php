<?php

    require "../config/com.config.php";

    $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);


    $Connection->set_charset("utf8");


    if($Connection){

        if(isset($_POST["FullDate"]) && isset($_POST["CurrentDay"]) && isset($_POST["GestID"]) && isset($_POST["Month"]) && isset($_POST["Year"]) && isset($_POST["SendProvider"]) && isset($_POST["SendAmount"]) && isset($_POST["SendDescription"]) && isset($_POST["SendCountableCount"]) && isset($_POST["SendBuyType"])  && isset($_POST["SendPayType"]) && isset($_POST["Realice"])  && isset($_POST["SendDate"])  && isset($_POST["SendBillID"]) && isset($_POST["SendSubtotal"]) && isset($_POST["SendExempt"]) && isset($_POST["Other"]) && isset($_POST["ISV18"]) && isset($_POST["ISV15"]) && isset($_POST["SendTotal"]) && isset($_POST["CardUsed"]) && isset($_POST["Items"])){

            $GestID = $_POST["GestID"];
            $Month = $_POST["Month"];
            $Year = $_POST["Year"];
            $SendProvider = $_POST["SendProvider"];
            $SendAmount = $_POST["SendAmount"];
            $SendDescription = $_POST["SendDescription"];
            $SendCountableCount = $_POST["SendCountableCount"];
            $SendBuyType = $_POST["SendBuyType"];
            $SendPayType = $_POST["SendPayType"];
            $Realice = $_POST["Realice"];
            $SendDate = $_POST["SendDate"];
            $SendBillID = $_POST["SendBillID"];
            $SendSubtotal = $_POST["SendSubtotal"];
            $SendExempt = $_POST["SendExempt"];
            $CardUsed = $_POST["CardUsed"];
            $Other = $_POST["Other"];
            $ISV18 = $_POST["ISV18"];
            $ISV15 = $_POST["ISV15"];
            $SendTotal = $_POST["SendTotal"];
            $FullDate = $_POST["FullDate"];
            $CurrentDay = $_POST["CurrentDay"];
            $Items = $_POST["Items"];

            $SetNewLog = "INSERT INTO `logs`(`GestID`, `Date`, `FullDate`, `SavedDay`, `Month`, `Year`, `Provider`, `SpendedBy`, `PayType`, `CardUsed`, `CountableCount`, `BuyType`, `BillDescription`, `BillNumber`, `Amount`, `Exempt`, `Subtotal`, `OtherISV`, `ISV18`, `ISV15`, `Total`, `Items`) VALUES ('$GestID', '$SendDate','$FullDate', '$CurrentDay','$Month', '$Year', '$SendProvider','$Realice','$SendPayType','$CardUsed','$SendCountableCount','$SendBuyType','$SendDescription','$SendBillID','$SendAmount','$SendExempt','$SendSubtotal','$Other','$ISV18','$ISV15','$SendTotal', '$Items')";

            if($Connection -> query($SetNewLog)){

                echo "<script> localStorage.setItem('NewLogStatus', 'Passed'); window.location.href = '../' </script>";

            }else{

                echo "<script> localStorage.setItem('NewLogStatus', 'Failed'); window.location.href = '../' </script>";

            }


        }else{

            echo "<h1>Ocurrió un error al procesar uno o más datos.</h1> <br> <b>Error 400</b> <br> <p>Bad Request!</p>";

        }

    }else{

    }

?>