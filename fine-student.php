<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';

session_start();
$student = $_SESSION['student-name'];

if(isset($_POST['del'])){
	$id = trim($_POST['del-btn']);

	$sql = "DELETE  FROM student where id = '$id'";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if($query){
		$error = true;
	}
}

	if (isset($_POST['check'])) {
		$id = $_POST['id'];
		
	$sql = "SELECT returnDate from borrow where borrowId = '$id'";
	$query = mysqli_query($conn, $sql);
	 $row = mysqli_fetch_assoc($query);

	 $now = date_create(date('Y-m-d'));
	 "<br>";
	 $prev =  date_create(date("Y-m-d",strtotime($row['returnDate'])));
	 "<br>";
	  $diff = date_diff($prev,$now);
	 "<br>";
	$diff = str_replace('+', '', $diff->format('%R%a'));
	   if ($diff > 0) {
		// for greater
		$fine = 30 * $diff;

	    $add = "UPDATE `borrow` SET `fine`= '$fine' WHERE borrowId = '$id'";
	$query = mysqli_query($conn, $add);
	  }
	  else if ($now < $prev){


	  	// for lesser
	  $add = "UPDATE `borrow` SET `fine`= '0' WHERE borrowId = '$id'";
	$query = mysqli_query($conn, $add);
	  }

	}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="flickity/flickity.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script type="text/javascript" src="flickity/flickity.js"></script>
    <script type="text/javascript" src="sweetalert.min.js"></script>   
    <title>Fines</title>
</head>
<body>
<div class="container">
    <?php include "includes/nav2.php"; ?>

	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
	    <strong>Fines</strong> Table
	</div>

	</div>
	<div class="container">
		
		  <table class="table table-bordered">
		          <thead>
		               <tr> 
		                  <th>ID</th>
		                  <th>Student Name</th>
		                  <th>Book Name</th>
		                  <th>Borrow date</th>
		                  <th>Return Date</th>
		                  <th>Overdue Charges</th>
		                </tr>    
		          </thead>  

		           <?php 
                  		$sql = "SELECT * FROM borrow where memberName = '$student'";
                  		$query = mysqli_query($conn, $sql);
                  		$counter = 1;
                  		while($row = mysqli_fetch_assoc($query)) { 
                   ?>

		          <tbody> 
		            <tr> 
		             <td><?php echo $counter++; ?></td>
		             <td><?php echo $row['memberName']; ?></td>
		             <td><?php echo $row['bookName']; ?></td>
		             <td><?php echo $row['borrowDate']; ?></td>
		             <td><?php echo $row['returnDate']; ?></td>
		             <td> 
		             	<?php echo $row['fine']; ?><form action="fine-student.php" method="post">
		             		<input type="hidden" name="id" value="<?php echo $row['borrowId']; ?>">
		             <button name="check" type="submit" class="btn btn-warning">CHECK</button>
		             </form>
		             </td>
		            </tr> 
		            <?php } ?> 
		         </tbody> 
		   </table>
	</div>
	
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>