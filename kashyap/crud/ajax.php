<?php

include "connect.php";
if (isset($_POST['search'])) {
$sno = $_POST['search'];   
$name = $_POST['search'];
$age = $_POST['search'];
$gender = $_POST['search'];
$email = $_POST['search'];
$phone = $_POST['search'];
$dt = $_POST['search'];

   $Query = "SELECT * FROM std_details WHERE sno LIKE '%$sno%' OR name LIKE '%$name%' OR age LIKE '%$age%' OR gender LIKE '%$gender%' OR email LIKE '%$email%' OR phone LIKE '%$phone%' OR dt LIKE '%$dt%'  ";

   $ExecQuery = MySQLi_query($con, $Query);

   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
       <?php echo $Result['name']; ?>
   <?php
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="display"></div>   
</body>
</html>

