<?php
$result = false;
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id =$_GET['deleteid'];
    $sql="delete from std_details where sno=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Record deleted successfuly of Sr. no. ",$sno;
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Deleting Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styledelete.css"> -->
</head>
<body>
<img class="bg" src="bg.jpg" alt="College">
<div class="container">
</div>  
</body>
</html>