<?php

    require "../config/com.config.php";

    $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);

    $GetGestID = $_GET["GestID"];


    $Connection->set_charset("utf8");


    if($Connection){

        if(isset($_GET["SendProvider"]) && isset($_GET["SendAmount"]) && isset($_GET["SendDescription"]) && isset($_GET["SendCountableCount"]) && isset($_GET["SendBuyType"])  && isset($_GET["SendPayType"]) && isset($_GET["Realice"])  && isset($_GET["SendDate"])  && isset($_GET["SendBillID"]) && isset($_GET["SendSubtotal"]) && isset($_GET["SendExempt"]) && isset($_GET["Other"]) && isset($_GET["ISV18"]) && isset($_GET["ISV15"]) && isset($_GET["SendTotal"]) && isset($_GET["CardUsed"])){

           
            $SendProvider = $_GET["SendProvider"];
            $SendAmount = $_GET["SendAmount"];
            $SendDescription = $_GET["SendDescription"];
            $SendCountableCount = $_GET["SendCountableCount"];
            $SendBuyType = $_GET["SendBuyType"];
            $SendPayType = $_GET["SendPayType"];
            $Realice = $_GET["Realice"];
            $SendDate = $_GET["SendDate"];
            $SendBillID = $_GET["SendBillID"];
            $SendSubtotal = $_GET["SendSubtotal"];
            $SendExempt = $_GET["SendExempt"];
            $CardUsed = $_GET["CardUsed"];
            $Other = $_GET["Other"];
            $ISV18 = $_GET["ISV18"];
            $ISV15 = $_GET["ISV15"];
            $SendTotal = $_GET["SendTotal"];

            $UpdateLog = "UPDATE `logs` SET `Provider`='$SendProvider',`SpendedBy`='$Realice',`PayType`='$SendPayType',`CardUsed`='$CardUsed',`CountableCount`='$SendCountableCount',`BuyType`='$SendBuyType',`BillDescription`='$SendDescription',`BillNumber`='$SendBillID',`Amount`='$SendAmount',`Exempt`='$SendExempt',`Subtotal`='$SendSubtotal',`OtherISV`='$Other',`ISV18`='$ISV18',`ISV15`='$ISV15',`Total`='$SendTotal' WHERE GestID = '$GetGestID' ";

            if($Connection -> query($UpdateLog)){

                echo "<script> localStorage.setItem('EditKey', 'true'); window.close(); </script>";

            }else{

                echo "<script> localStorage.setItem('EditKey', 'false'); window.close(); </script>";

            }


        }else{

               echo "<h1>Ocurrió un error al procesar uno o más datos.</h1> <br> <b>Error 400</b> <br> <p>Bad Request!</p>";

        }

    }else{

    }

