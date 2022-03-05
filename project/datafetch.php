<?php
include "dbConfig.php";

$sql="
SELECT 
account_name,
category,
balance 
FROM account_detail
";

$sqlaccounta="
SELECT 
account_name,
category,
balance 
FROM account_detail
WHERE account_name='Savings'
";

$sqlaccountb="
SELECT 
account_name,
category,
balance 
FROM account_detail
WHERE account_name='Goals'
";


$result=mysqli_query($conn,$sql);

$resultA=mysqli_query($conn,$sqlaccounta);

$resultB=mysqli_query($conn,$sqlaccountb);

?>