<?php
    include "dbConfig.php";
    $transfera=$_POST['transfera'];
    $transferb=$_POST['transferb'];

    if(isset($_POST["submita"]))
    {
        $sql="
        UPDATE account_detail
        SET balance=balance-$transfera 
        WHERE account_name='Savings'
        ";

        $sql2="
        UPDATE account_detail
        SET balance=balance+$transfera 
        WHERE account_name='Goals'
        ";

        if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2))
        {
            header("Location: homepage.php");
        }
    }
    elseif(isset($_POST["submitb"]))
    {
        $sqla="
        UPDATE account_detail
        SET balance=balance-$transferb 
        WHERE account_name='Goals'
        ";

        $sqlb="
        UPDATE account_detail
        SET balance=balance+$transferb 
        WHERE account_name='Savings'
        ";

        if(mysqli_query($conn,$sqla)&&mysqli_query($conn,$sqlb))
        {
            header("Location: homepage.php");
        }
    }

    
    

?>