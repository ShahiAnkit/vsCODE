<?php
include 'connect.php';  

$num_per_page=05;
if(isset($_GET["page"]))
{
  $page = $_GET["page"];
}
else
{
  $page=1;
}
$start_from=($page-1)*05;
$sql = "Select * from std_details LIMIT $start_from,$num_per_page";
$result = mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styledisplay.css">
</head>
<body>
<img class="bg" src="bg.jpg" alt="College">
<div class="container">
    <button class="btn btn-primary my-5"><a href="new.php" class="text-light">Add User</a></button>
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
        <button class="btn btn-primary"><a href="update.php?updateid='.$sno.'" class="text-light">Changes</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$sno.'" class="text-light">Remove</a></button>
        </td>
      </tr>';
    }
}
?>
</tbody>

</table>

</div>

<?php

$sql="select * from std_details";
$rs_result=mysqli_query($con,$sql);
$total_records=mysqli_num_rows($rs_result);
// // echo $total_records;
$total_pages=ceil($total_records/$num_per_page);
// echo $total_pages;

for($i=1; $i<=$total_pages;$i++)
{
  echo "<a href='display.php?page=".$i."'>".$i."</a>";
}

?>
 
</body>

</html>