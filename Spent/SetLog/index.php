<?php

    require "../config/com.config.php";

    $Connection = new mysqli($ServerName, $UserName, $Password, $DatabaseName);

    if($Connection){

        if(isset($_POST["GestID"]) && isset($_POST["Month"]) && isset($_POST["Year"]) && isset($_POST["SendProvider"]) && isset($_POST["SendAmount"]) && isset($_POST["SendDescription"]) && isset($_POST["SendCountableCount"]) && isset($_POST["SendBuyType"])  && isset($_POST["SendPayType"]) && isset($_POST["Realice"])  && isset($_POST["SendDate"])  && isset($_POST["SendBillID"]) && isset($_POST["SendSubtotal"]) && isset($_POST["SendExempt"]) && isset($_POST["Other"]) && isset($_POST["ISV18"]) && isset($_POST["ISV15"]) && isset($_POST["SendTotal"])){

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
            $Other = $_POST["Other"];
            $ISV18 = $_POST["ISV18"];
            $ISV15 = $_POST["ISV15"];
            $SendTotal = $_POST["SendTotal"];

            $SetNewLog = "INSERT INTO `logs`(`GestID`, `Date`, `Month`, `Year`, `Provider`, `SpendedBy`, `PayType`, `CardUsed`, `CountableCount`, `BuyType`, `BillDescription`, `BillNumber`, `Amount`, `Exempt`, `Subtotal`, `OtherISV`, `ISV18`, `ISV15`, `Total`) VALUES ('$GestID', '$SendDate','$Month', '$Year', '$SendProvider','$Realice','$SendPayType','0851','$SendCountableCount','$SendBuyType','$SendDescription','$SendBillID','$SendAmount','$SendExempt','$SendSubtotal','$Other','$ISV18','$ISV15','$SendTotal')";

            if($Connection -> query($SetNewLog)){

                echo "Operación exitosa";

            }else{

                echo "Error al guardar";

            }


        }else{

            echo "Error al obtener el Proveedor";

        }

    }else{

    }

?>