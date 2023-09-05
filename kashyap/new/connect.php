<?php
$connect = new mysqli('localhost','root','','student_db');

if($connect){
//    echo "Database Connected Successfully";
}
else{
    die(mysqli_error($connect));
}

?>