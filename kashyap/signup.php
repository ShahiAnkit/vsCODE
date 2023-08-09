<?php
            include 'connect.php';   
            // $insert = false;
            if(isset($_POST['fname'])){
    
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $conf_pass = $_POST['conf_pass'];
    
           $sql = "INSERT INTO signup_details (fname,lname,email,pass,conf_pass) VALUES ('$fname', '$lname','$email', '$pass','$conf_pass');";
    
        //    echo $sql;
    
        // if($con->query($sql) == true){
        //         echo "Successfully Inserted";
                // $insert = true;
                // header('location:display.php');
        // }
        // else{
        //     echo"ERROR: $sql <br> $con->error";
        // }
        // $con->Close();

        $result = mysqli_query($con,$sql);

        if($result){
            // echo "Data inserted successfully";
               header('location:index.php');
        }
        else{
            die(mysqli_error($con));
        }   
        $con->close();


    }    
        ?>