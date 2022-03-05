<?php
    include "dbConfig.php";

    if(isset($_POST["submitc"]))
    {
        $createaccount=$_POST['createaccount'];

    $sql="

    INSERT INTO account_detail (account_name, category, balance)
    VALUES ('$createaccount', 'investment', 0)

    ";
    
    if(mysqli_query($conn,$sql))
    {
        header("Location: homepage.php");
    } 
    }

    if(isset($_POST["addfund"]))
    {
        $newaccount=$_POST['newaccount'];

    $sql="

    UPDATE account_detail
    SET balance=balance+$newaccount
    WHERE category='investment';

    ";

    $sql2="

    INSERT INTO transaction (amount)
    VALUES ('$newaccount')

    ";


    
    if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2))
    {
        header("Location: homepage.php");
    } 
    }

    if(isset($_POST["deleteaccount"]))
    {

    $sql="

    DELETE 
    FROM account_detail 
    WHERE category='investment';

    ";

    $sql2="
    
    SELECT 
    balance 
    FROM account_detail
    WHERE category='investment'

    ";

    $result=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result);
    $balance=$row['balance'];


    $sql3="
    
    UPDATE account_detail
    SET balance=balance+$balance
    WHERE category='saving'

    ";

    $sql8="
    
    TRUNCATE TABLE transaction;

    ";
    
    if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql3)&&mysqli_query($conn,$sql8))
    {
        header("Location: homepage.php");
    } 
    }

    $sql4="
    
    SELECT *
    FROM account_detail
    WHERE category='investment'
    ";

    $result4=mysqli_query($conn,$sql4);

    $sql5="
    
    SELECT *
    FROM transaction
    ";

    $result5=mysqli_query($conn,$sql5);
?>
