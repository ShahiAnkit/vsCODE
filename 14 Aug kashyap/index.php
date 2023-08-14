<?php
            include 'connect.php';   
            // $insert = false;
            if(isset($_POST['name'])){
    
            // $server = "localhost";
            // $suername = "root";
            // $password ="";
            // $dbname = "student_db";
    
        
            // $con = mysqli_connect($server,$suername,$password,$dbname);
        
            // if(!$con){
            //     die("connection to this Database failed due to" . mysqli_connect_error());
            // }
            //echo "Successfully Connected to the Database";
  
        

            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $desc = $_POST['desc'];
    
        //    $sql = "INSERT INTO std_details (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    

           $id_check =  mysqli_query( $con,"SELECT email FROM std_details WHERE email = '$email' ");
								
           //Count the amount of rows where username = $username
        //    $check_id = mysqli_num_rows($id_check);
        //    ob_end_clean();	
        //    if ($check_id == 0) {
   
        //        $query = mysqli_query($con,"INSERT INTO std_details (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc',  current_timestamp())");
        //        $querycount = mysqli_num_rows($query);
   
        //        ob_end_clean();			
        //        if($query){
   
        //            echo json_encode(array("status" => "Success"));
        //            exit();			
        //        } else {
        //            echo json_encode(array("status" => "failed"));
        //            exit();
        //        }
   
        //    } else {
        //        echo json_encode(array("status" => "exists"));
        //        exit();
        //    }

        $check_id = mysqli_num_rows($id_check);
        
        if($check_id ==0){
            $sql = mysqli_query($con,"INSERT INTO std_details (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());");
			
            if($sql){
                echo '<script type="text/javascript">
                 window.onload = function () { alert("Data has been stored successfully"); }
                 </script>';

            }
            else{
                echo '<script type="text/javascript">
                 window.onload = function () { alert("Failed"); }
                 </script>';
            }
        }else{
            echo '<script type="text/javascript">
            window.onload = function () { alert("Details aready exists associated with this email"); }
            </script>';
        }
      



        //    echo $sql;
    
        // if($con->query($sql) == true){
        //         // echo "Successfully Inserted";
        //         // $insert = true;
        //         header('location:index.php');
        // }
        // else{
        //     echo"ERROR: $sql <br> $con->error";
        // }
        // $con->Close();

        // $result = mysqli_query($con,$sql);

        // if($result){
        //     echo "Data inserted successfully";
        //        header('location:index.php');
        // }
        // else{
        //     // die(mysqli_error($con));
        //     echo "Details already exist with this email id";
        // }   
        // $con->Close();

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
        <h3>Stuednt Registration Form</h3>
        <p id="demo">Enter Your Details Below</p>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
            <input type="text" name="name" id="name" required placeholder="Enter your Name" autocomplete="0">
            <input type="text" name="age" id="age" required placeholder="Enter your Age" autocomplete="0">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender" autocomplete="0">
            <input type="email" name="email" id="email" required placeholder="Enter your Email" autocomplete="0">
            <input type="number"  name="phone" id="number" required  placeholder="Enter your Phone" autocomplete="0">

            <!-- <img id='idpic' >  <input id="imgInputidpic" name="idpic" accept="image/*" type="file"> -->
            
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here" autocomplete="0"></textarea>          
            <button  class="btn" >Submit</button>
            <button class="btn"><a href="display.php" class="text-light">View</a></button>
            <!-- <button class="btn"><a href="display.php">View</a></button> -->
            </form>
    </div>
    <!-- <script src="index.js"></script> -->


</body>
</html>

 