<?php
            include 'connect.php';   
            // $insert = false;
            if(isset($_POST['fname'])){
    
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $conf_pass = $_POST['conf_pass'];
    
        //    $sql = "INSERT INTO signup_details (fname,lname,email,password,conf_pass) VALUES ('$fname', '$lname','$email', '$password','$conf_pass');";

           $id_check =  mysqli_query( $con,"SELECT email FROM signup_details WHERE email = '$email'");
           $id_check1 =  mysqli_query( $con,"SELECT password FROM signup_details WHERE email = '$password'");
           $id_check2 =  mysqli_query( $con,"SELECT conf_pass FROM signup_details WHERE email = '$conf_pass'");

								
        $check_id = mysqli_num_rows($id_check);
        $check_id1 = mysqli_num_rows($id_check1);
        $check_id2 = mysqli_num_rows($id_check2);
        
        if($check_id ==0 AND $check_id1 == $check_id2){
            $sql = mysqli_query($con,"INSERT INTO signup_details (`fname`, `lname`, `email`, `password`, `conf_pass`) VALUES ('$fname', '$lname','$email', '$password', '$conf_pass');");
			
            if($sql){
                 header('location:new.php');
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
            window.onload = function () { alert("Details aready exists associated with this email, Please Login"); }
            </script>';

        }
      
    
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

        // $result = mysqli_query($con,$sql);

        // if($result){
        //     // echo "Data inserted successfully";
        //        header('location:index.php');
        // }
        // else{
        //     die(mysqli_error($con));
        // }   
        // $con->close();


    }    
        ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Signup page</title>
    <link href="signup.css" rel="stylesheet">
  </head>
  <body style="background-color:rgb(219, 218, 218);text-align:center">
    <!-- <img class="bg" src="bg.jpg" alt="College"> -->
    <main class="form-signin">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
        <!-- <img class="mb-4" src="logo.png" alt="" height="300"> -->
        <h1 class="h3 mb-3 fw-normal"><b>Enter your details</b></h1>

        <div class="form-floating">
            <input type="text" name="fname" class="form-control" id="fname" required placeholder="First Name" autocomplete="0">
            <label for="floatingInput">First Name</label>
          </div>
          <div class="form-floating">
            <input type="text" name="lname" class="form-control" id="lname" required placeholder="Last Name" autocomplete="0">
            <label for="floatingInput">Last Name</label>
          </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control" id="username" required placeholder="name@example.com" autocomplete="0">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Password" autocomplete="0">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" name="conf_pass" class="form-control" id="confirm password"  required placeholder="Confirm Password" autocomplete="0">
            <label for="floatingPassword">Confirm Password</label>
          </div>
<div style="text-decoration: none">
          <button style=" background: rgb(74, 75, 74); BORDER: 2PX SOLID WHITE" class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit and Login</button>
          <button style=" background: rgb(74, 75, 74); BORDER: 2PX SOLID WHITE" class="w-100 btn btn-lg btn-primary mt-3"  type="submit"><a href="login.php" class="text-light">Login Page</button>
  </div>       
        <!-- <button class="w-100 btn btn-lg btn-primary mt-3" onclick="myFunctionlogin()" type="sbmit">Login Page</button> -->
        <!-- <p class="mt-5 mb-3 text-muted"></p><a href='https://www.viaante.com/'>For more details visit our official - www.viaante.com</a></p> -->
      </form>
    </main>

<!-- <script src="signup.js"></script> -->
    

  </body>
</html>