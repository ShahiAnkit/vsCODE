<?php

            include 'connect.php';   

            if(isset($_POST['email'])){
    
            $email = $_POST['email'];
            $password = $_POST['password'];
            // $email = $_GET['email'];
            // $password = $_GET['password'];

    
        //    $sql = "INSERT INTO login_details (uname, pass) VALUES ('$uname', '$pass');";

           $id_check =  mysqli_query( $con,"SELECT email,password FROM signup_details WHERE email='$email' and password='$password' ");
           $check_id = mysqli_num_rows($id_check);
           if($check_id !=0){
            $sql = mysqli_query($con,"INSERT INTO signup_details (email,password) VALUES ('$email', '$password');");
            if($sql){
                header('location:index.php');
            }
                else{
                    echo '<script type="text/javascript">
                     window.onload = function () { alert("failed"); }
                     </script>';
                }  
            }else{
                echo '<script type="text/javascript">
                window.onload = function () { alert("Not an existing user, Pleaase sign-up"); }
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

    <title>Login page</title>
    <link rel="stylesheet" href="login.css" >
  </head>
  <body class="text-center" >
    <!-- <img class="bg" src="bg.jpg" alt="College"> -->
    <div class="container">
      <main class="form-signin">
      <form method="POST" autocomplete="off" action="login.php" >
        <!-- <img class="mb-4" src="logo.png" alt="" height="300"> -->
        <h1 class="h3 mb-3 fw-normal"><b>Login Here</b></h1>

        <div class="form-floating">
          <input type="email" name="email" class="form-control" id="email" required placeholder="name@example.com" autocomplete="0" required>
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" required placeholder="Password" autocomplete="0" required>
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3"  type="submit">Login</button>
        <button class="w-100 btn btn-lg btn-primary mt-3"  type="submit"><a href="signup.php" class="text-light">Sign-up</button>
        <!-- <p class="mt-5 mb-3 text-muted"></p><a href='https://www.viaante.com/'>For more details visit our official - www.viaante.com</a></p> -->
      </form>
    </main>
    </div>


    <script src="login.js"></script>

  </body>
</html>