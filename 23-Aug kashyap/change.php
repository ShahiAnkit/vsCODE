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
            margin: 19px;
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

<body style="background-color:rgb(219, 218, 218);text-align:center">
    <div>
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

    <h3>Enter details for updation</h3>
            <form method="POST" action="#" >
            <input type="text" name="name" id="name"  placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="email" id="email" placeholder="Enter your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Update</button>
            <!-- <button class="btn"><a href="view.php" class="text-light">View</a></button> -->
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
