<?php
            include 'connect.php';   
            // $insert = false;
            if(isset($_POST['uname'])){
    
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
    
           $sql = "INSERT INTO login_details (uname, pass) VALUES ('$uname', '$pass');";
    
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