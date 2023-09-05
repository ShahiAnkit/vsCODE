<?php

// $sql = query('SELECT * FROM std_details ORDER BY ' .  $column . ' ' . $sort_order)
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'student_db');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('sno','name','age','gender','email','phone','other','dt');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $mysqli->query('SELECT * FROM std_details ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';

//PAGINATION-1
include 'connect.php'; 

	//PAGINATION-2
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
	text-align: center;
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
			<button id="search" name="submit" class="btn btn-sm">Search</button>
		</div>
	</nav>
			<div class="container">
			<table class="table">
				<tr>
					<th><a href="tablesort.php?column=sno&order=<?php echo $asc_or_desc; ?>">sno<i class="fas fa-sort<?php echo $column == 'Sno' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="tablesort.php?column=name&order=<?php echo $asc_or_desc; ?>">name<i class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="tablesort.php?column=age&order=<?php echo $asc_or_desc; ?>">age<i class="fas fa-sort<?php echo $column == 'age' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th><a href="tablesort.php?column=gender&order=<?php echo $asc_or_desc; ?>">gender<i class="fas fa-sort<?php echo $column == 'gender' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="tablesort.php?column=email&order=<?php echo $asc_or_desc; ?>">email<i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="tablesort.php?column=phone&order=<?php echo $asc_or_desc; ?>">phone<i class="fas fa-sort<?php echo $column == 'phone' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th><a href="tablesort.php?column=other&order=<?php echo $asc_or_desc; ?>">other<i class="fas fa-sort<?php echo $column == 'other' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th><a href="tablesort.php?column=d&order=<?php echo $asc_or_desc; ?>">dt<i class="fas fa-sort<?php echo $column == 'dt' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                </tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td<?php echo $column == 'sno' ? $add_class : ''; ?>><?php echo $row['sno']; ?></td>
					<td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $row['name']; ?></td>
					<td<?php echo $column == 'age' ? $add_class : ''; ?>><?php echo $row['age']; ?></td>
                    <td<?php echo $column == 'gender' ? $add_class : ''; ?>><?php echo $row['gender']; ?></td>
					<td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
					<td<?php echo $column == 'phone' ? $add_class : ''; ?>><?php echo $row['phone']; ?></td>
                    <td<?php echo $column == 'other' ? $add_class : ''; ?>><?php echo $row['other']; ?></td>
					<td<?php echo $column == 'dt' ? $add_class : ''; ?>><?php echo $row['dt']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
			</div>
			<div class="footer">
	<footer  style="background-color:  rgb(119, 118, 116);" class="background">
		<p class="text-footer"> Thanks for visiting... </p>
    </footer>
  </div>

  <!-- Pagination -->
  <div class="center">
<div class="pagination">
<?php

//pagination-3
$sql="select * from std_details";
$rs_result=mysqli_query($con,$sql);
$total_records=mysqli_num_rows($rs_result);
// // echo $total_records;
$total_pages=ceil($total_records/$num_per_page);
// echo $total_pages;
for($i=1; $i<=$total_pages;$i++)
{
  echo "<a href='tablesort.php?page=".$i."'>".$i."</a>";
}
?>
  </div>
</div>

</body>
</html>

<?php
		$result->free();
}
?>