<?php
            include 'connect.php';   
            // $insert = false;
            if(isset($_POST['name'])){   
            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $desc = $_POST['desc'];

           $id_check =  mysqli_query( $con,"SELECT email FROM std_details WHERE email = '$email' ");
								
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

    }    
        ?>


<!DOCTYPE html>

<html>

<head>
	<title>Simple web Development Template</title>

	<style>
		* {
			margin: 0;
			padding: 0;
		}

		.navbar {
			position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: flex-start;
    padding-top: .5rem;
    padding-bottom: .5rem;
    align-content: space-between;
    flex-direction: row;
		}

		.background {
			background: rgb(119, 118, 116);;;
			background-blend-mode: darken;
			background-size: cover;
		}

		.nav-list {
			width: 85%;
			display: flex;
			align-items: center;
			margin: 19px
		}

		.logo {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.logo img {
			width: 180px;
			border-radius: 50px;
		}

		.nav-list li {
			list-style: none;
			padding: 26px 30px;
		}

		.nav-list li a {
			text-decoration: none;
			color: white;
		}

		.nav-list li a:hover {
			color: grey;
		}


		#search {
			padding: 5px;
			font-size: 17px;
			border: 2px solid grey;
			border-radius: 9px;
		}

			.box-main {
			display: flex;
			justify-content: center;
			align-items: center;
			color: black;
			max-width: 80%;
			margin: auto;
			height: 80%;
		}

        input ,textarea{
    border: 2px solid #ad7a7a;
    border-radius: 6px;
    outline: none;
    font-size: 14px;
    width: 80%;
    /* margin: 11px auto; */
    margin: 30px auto;
    padding: 7px;
    display: block;
}

 
		.btn {
			padding: 8px 20px;
			margin: 7px 0;
			border: 2px solid white;
			border-radius: 8px;
			background: none;
			color: white;
			cursor: pointer;
		}

		.btn-sm {
			padding: 6px 10px;
			vertical-align: middle;
		}

		.section {
			height: 400px;
			display: flex;
			align-items: center;
			justify-content: center;
			max-width: 90%;
			margin: auto;
		}

		.section-Left {
			flex-direction: row-reverse;
		}

		.paras {
			padding: 0px 65px;
		}

		.text-footer {
            border-top: solid 1px;
  background: rgb(119, 118, 116);
  width: 100%;
  height: 105px;
  padding-top: 10px;
  position: absolute;
  bottom: 5px;
  left: 0;
  text-align: center;
		}
	</style>
     <link rel="stylesheet" href="new.css">
</head>

<body>
    <div  style="background-color: rgb(219, 218, 218);">
	<nav class="navbar background">
		<ul class="nav-list">
			<!-- <div class="logo">
				<img src= "logo.png"> -->
			<!-- </div> -->
			<li><a href='new.php'>Home</a></li>
			<li><a href='https://www.viaante.com/about-us/'>About</a></li>
			<li><a href="view.php">Details</a></li>
            <li><a href='https://www.viaante.com/contact/'>Contact Us</a></li>
		</ul>

		<!-- <div class="rightNav">
			<input type="text" name="search" id="search">
			<button id="search" class="btn btn-sm">Search</button>
		</div> -->
	</nav>

    <div class="container">

            <h3>Stuednt Registration Form</h3>
            <!-- <p id="demo">Enter Your Details Below</p> -->
                <form method="POST" action="?>" >
                <input type="text" name="name" id="name" required placeholder="Enter your Name" autocomplete="0">
                <input type="text" name="age" id="age" required placeholder="Enter your Age" autocomplete="0">
                <input type="text" name="gender" id="gender" placeholder="Enter your Gender" autocomplete="0">
                <input type="email" name="email" id="email" required placeholder="Enter your Email" autocomplete="0">
                <input type="number"  name="phone" id="number" required  placeholder="Enter your Phone" autocomplete="0">
    
                <!-- <img id='idpic' >  <input id="imgInputidpic" name="idpic" accept="image/*" type="file"> -->
                
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here" autocomplete="0"></textarea>          
                <button  class="btn" >Submit</button>
                <!-- <button class="btn"><a href="display.php" class="text-light">View</a></button> -->
                <!-- <button class="btn"><a href="display.php">View</a></button> -->
                </form>
        </div>

		<div class="thumbnail">
			<img src= "img.png" alt="">
		</div>


	<footer  style="background-color:  rgb(119, 118, 116);" class="background">
		<p class="text-footer">
Thanks for visiting...
		</p>
    </footer>
</div>


</body>

</html>
