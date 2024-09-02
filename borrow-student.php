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
    <title>Issue Books</title>
</head>
<body>

<div class="container">
    <?php include "includes/nav2.php"; ?>
	
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
	    <strong>Issue Books</strong>
	</div>

</div>

	<div class="container">

		  <table class="table table-bordered">
		         <tr> 
					<th>ID</th>
					<th>BOOK</th>
					<th>AVAILABLE</th>
					<th>BORROW</th>
				  </tr>    
					</thead>
					 <?php

					$sql = "SELECT * FROM books"; 	
					
					$query = mysqli_query($conn, $sql);
					$counter = 1;
						while($row = mysqli_fetch_array($query)){
							$_SESSION['book_Title'] = $row['bookTitle'];
							
							?>
							<tbody>
							<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['bookTitle'];?></td>
							<td><?php echo $row['available']; ?></td>
							
							  
							<td><a href="lend-student.php?bid=<?php echo $row['bookId'] ?>" id="show" class="show-in"><button class="btn btn-success">Borrow Now
	
							</button>
							<input type="hidden" class="book-id" value="<?php echo $row['bookId']; ?>">
							<input type="hidden" class="book-name" value="<?php echo $row['bookTitle']; ?>">
							<input type="hidden" class="purpose" value="show">
							</a></td>
							</tr>
							</tbody>
							<?php }
					
					 ?>
					 </table>
		 
	  </div>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>