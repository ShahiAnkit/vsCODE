<?php
include 'connect.php'; 

// PAGINATION
$num_per_page=8;
if(isset($_GET["page"]))
{
  $page = $_GET["page"];
}
else
{
  $page=1;
}
$start_from=($page-1)*8;
$sql = "SELECT * FROM std_details LIMIT $start_from,$num_per_page";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
<head>
  	<title>Student Details</title>

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
	top: 0px;
    left: 0px;
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
		.rightNav{
			top: 20%;
			left: 10%;

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
			/* margin: auto; */
		}

		.section-Left {
			flex-direction: row-reverse;
		}

		.paras {
			padding: 0px 65px;
		}
.center{
	/* text-align: center; */
	margin: 0;
  position: absolute;
  top: 82%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
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
  top: 89.2%;
		}
	</style>
     <link rel="stylesheet" href="new.css">

	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styledisplay.css">

    <!-- search -->
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="script.js"></script>
   <!-- Including CSS file. -->
   <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>

<body style="background-color:rgb(219, 218, 218);text-align:center">
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

		<div class="rightNav" >
			<input type="text" name="search" id="search">
			<!-- <button id="search" name="submit" class="btn btn-sm">Search</button> -->
		</div>
	</nav>
  
  <!-- search -->
  <!-- <div id="display"></div> -->


<!-- <img class="bg" src="bg.jpg" alt="College"> -->
<div class="container">
    <!-- <button class="btn btn-primary my-5"><a href="new.php" class="text-light">Add User</a></button> -->
    <table class="table" >
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
 
  <div class="footer">
	<footer  style="background-color:  rgb(119, 118, 116);" class="background">
		<p class="text-footer"> Thanks for visiting... </p>
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

<!-- <script>
function deleteEmployee() {
            var id = $('#delete_id').val();
            $('#deleteEmployeeModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "employee-delete.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    employeeList();
                    alert(response.message);
                }
            })
        }
</script> -->

</body>
</html>





