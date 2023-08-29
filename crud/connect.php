<?php
$con = new mysqli('localhost','root','','db_student');

if($con){
//    echo "Database Connected Successfully";
}
else{
    die(mysqli_error($con));
}

?>