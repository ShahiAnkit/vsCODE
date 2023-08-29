<?php
$result = false;
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id =$_GET['deleteid'];
    $sql="delete from std_details where sno=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:view.php');
        echo '<script type="text/javascript">
        window.onload = function () { alert("Record deleted successfully"); }
        </script>';
    }else{
        die(mysqli_error($con));
    }
}

?>

