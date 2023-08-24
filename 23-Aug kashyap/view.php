<?php
include 'connect.php'; 

//PAGINATION
$num_per_page=07;
if(isset($_GET["page"]))
{
  $page = $_GET["page"];
}
else
{
  $page=1;
}
$start_from=($page-1)*07;
$sql = "Select * from std_details LIMIT $start_from,$num_per_page";
$result = mysqli_query($con,$sql);

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

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid black;
  margin: 0 4px;
  text-align: center;
}



.pagination a:hover:not(.active) {background-color: grey;}


		.text-footer {
            border-top: solid 1px;
  background: rgb(119, 118, 116);
  width: 100%;
  height: 105px;
  padding-top: 10px;
  position: absolute;
  bottom: -16px;
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
			<li><a href="view.php">Details</a></li>
			<li><a href="new.php">Add Details</a></li>
            <li><a href='https://www.viaante.com/contact/'>Contact Us</a></li>
		</ul>

		<div class="rightNav">
			<input type="text" name="search" id="search">
			<!-- <button id="search" class="btn btn-sm">Search</button> -->
		</div>
	</nav>

    <div class="container">

	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styledisplay.css">
</head>
<body style="background-color:rgb(219, 218, 218);text-align:center">
<!-- <img class="bg" src="bg.jpg" alt="College"> -->
<div class="container">
    <!-- <button class="btn btn-primary my-5"><a href="new.php" class="text-light">Add User</a></button> -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr. no.</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php

// $sql = "Select * from std_details";
// $result = mysqli_query($con,$sql);

if($result){
    // $row = mysqli_fetch_assoc($result);
    // echo $row['name'];

    while($row=mysqli_fetch_assoc($result)){
        $sno=$row['sno'];
        $name=$row['name'];
        $age=$row['age'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phone=$row['phone'];
        $other=$row['other'];
        $dt=$row['dt'];
        echo '<tr>
        <th scope="row">'.$sno.'</th>
        <td>'.$name.'</td>
        <td>'.$age.'</td>
        <td>'.$gender.'</td>       
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>'.$other.'</td> 
        <td>'.$dt.'</td>
        <td>
        <button class="btn btn-primary"><a href="change.php?updateid='.$sno.'" class="text-light">Changes</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$sno.'" class="text-light">Remove</a></button>
        </td>
      </tr>';
    }
}
?>
</tbody>

</table>

</div>
 
</body>

</html>
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

<div class="center">
  <div class="pagination">
<?php
//PAGINATION
$sql="select * from std_details";
$rs_result=mysqli_query($con,$sql);
$total_records=mysqli_num_rows($rs_result);
// // echo $total_records;
$total_pages=ceil($total_records/$num_per_page);
// echo $total_pages;
for($i=1; $i<=$total_pages;$i++)
{
  echo "<a href='view.php?page=".$i."'>".$i."</a>";
}
?>
  </div>
</div>
</body>
</html>