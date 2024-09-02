<?php 
	require 'includes/snippet.php';
	require 'includes/db-inc.php';

	if (isset($_POST['submit'])) {
		//Getting the values from the forms
		$name = sanitize(trim($_POST['name']));
		$username = sanitize(trim($_POST['username']));
		$password1 = sanitize(trim($_POST['password1']));
		$password2 = sanitize(trim($_POST['password2']));
		$email = sanitize(trim($_POST['email']));
			 		
		//Check if the password matches
		if ($password1 == $password2) {
		//create an sql statement
		$sql =
		 "INSERT into admin (adminName, password, username, email) values ('$name', '$password1', '$username', '$email')";
		 
		//query the database
		$query = mysqli_query($conn, $sql);
		$error = false;

		if ($query) {
		$error = true;
		}
		else {
		echo "<script>alert('Admin not added!');
					</script>";	
		}
	}
	else {
			echo  "<script>alert('Password mismatched!')</script>";
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
    <title>Sign-Up for Admin</title>
</head>
<body>

<div class="container">
	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
			<?php if(isset($error)) { ?>
		<div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <strong>Record Added Successfully!</strong>
			</div>
			<?php } ?>
			<p class="page-header" style="text-align: center">SIGN-UP FORM FOR ADMIN</p>

			<div class="container">
				<form class="form-horizontal" role="form" method="post" action="adduser.php" enctype="multipart/form-data">
				<div class="form-group">
						<label for="Name" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" placeholder="Enter Full Name" id="name" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password1" placeholder="Enter Password" id="password" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password2" placeholder="Enter Password" id="password" required>
						</div>		
					</div>
          <div class="form-group">
            <label for="Password" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
            </div>
          </div>
          		<div class="form-group ">
						<div class="col-sm-offset-2 col-sm-10 ">
							<button type="submit" class="btn btn-info col-lg-4 " name="submit">
								Submit
							</button>	
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
 	window.onload = function () {
		var input = document.getElementById('name').focus();
	}
 </script>
</body>
</html>