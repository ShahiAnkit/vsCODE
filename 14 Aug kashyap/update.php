<?php

            include 'connect.php';

            if(isset($_POST['name'],$_GET['updateid'])){
            $id = $_GET['updateid'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $desc = $_POST['desc'];
            

           $sql = "UPDATE std_details SET  name='$name',age='$age',gender='$gender',email='$email',phone='$phone',other='$desc', dt = current_timestamp() where sno=$id";

        // $sql = "SELECT * FROM std_details where sno = '$id'";


        $result = mysqli_query($con,$sql);
        if($result){
            // echo "Data has been updated successfully";
            //    header('location:display.php');
        }
        else{
            die(mysqli_error($con));
        }
        $con->close();

        // $data = mysqli_fetch_assoc($result);

    }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="College">
    <div class="container">
        <h3>Enter details for updation</h3>
            <form method="POST" action="#" >
            <input type="text" name="name" id="name"  placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="email" id="email" placeholder="Enter your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Update</button>
            <button class="btn"><a href="display.php" class="text-light">View</a></button>
            </form>
    </div>
    <script src="index.js"></script>
</body>
</html>



            