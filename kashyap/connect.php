<?php
$con = new mysqli('localhost','root','','student_db');

if($con){
//    echo "Database Connected Successfully";
}
else{
    die(mysqli_error($con));
}

?>