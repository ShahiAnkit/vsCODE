<?php
//Including Database configuration file.
include "connect.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
$sno = $_POST['search'];   
$name = $_POST['search'];
$age = $_POST['search'];
$gender = $_POST['search'];
$email = $_POST['search'];
$phone = $_POST['search'];
$dt = $_POST['search'];
//Search query.
   $Query = "SELECT * FROM std_details WHERE sno LIKE '%$sno%' OR name LIKE '%$name%' OR age LIKE '%$age%' OR gender LIKE '%$gender%' OR email LIKE '%$email%' OR phone LIKE '%$phone%' OR dt LIKE '%$dt%'  ";
//Query execution
   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onclick='fill("<?php echo $Result['name']; ?>")'>
   <a>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['name']; ?>
   </li></a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</ul>