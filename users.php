<?php 
require 'includes/snippet.php';
    require 'includes/db-inc.php';


if(isset($_POST['del'])){

	$id = sanitize(trim($_POST['id']));
    // echo $id;

	$sql_del = "DELETE from admin where adminId = $id"; 
        $error = false;

	$result = mysqli_query($conn,$sql_del);
			if ($result)
			{
		      $error = true;
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
    <title>Admin List</title>
</head>
<body>
<div class="container">
    <?php include "includes/nav.php"; ?>

	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

	    <h4 class="center-block"><span class="admin_name">Admin Users List</span> </h4>
	</div>
	


	</div>
	<div class="container">
		<div class="panel panel-default">

		  <div class="panel-heading">
            <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Deleted Successfully!</strong>
            </div>
            <?php } ?>
		  	<div class="row">
          <a href="adduser.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add User</button></a>
		  		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			    
			  </div>
			</div>
		  </div>
		  <table class="table table-bordered">

 	<thead>
	 <tr>
			  <th>adminId</th>
			  <th>adminName</th>
			  <th>password</th>
			  <th>username</th>
			  <th>email</th>
			   <th>Delete</th>
	 </tr>
	</thead>

		  <?php 
	$sql = "SELECT * from admin";

	$query = mysqli_query($conn, $sql);
    $counter = 1;
	while($row=mysqli_fetch_array($query)){ ?>
	   <tbody>
	   <td> <?php echo $counter++ ?></td>
	   <td> <?php echo $row['adminName']?></td>
	   <td> <?php echo $row['password']?></td>
	   <td> <?php echo $row['username']?></td>	
	   <td> <?php echo $row['email']?></td>
	   <form method='post' action='users.php'>
	   <input type='hidden' value="<?php echo $row['adminId']; ?>" name='id'>
	   <td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
	   </form>
	   </tbody>
	
	<?php } ?>
	
		   </table>
		 
	  </div>

		
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
<script type="text/javascript">

function Delete() {
            return confirm('Would you like to delete the admin user');
        }


function search(){
	alert("Test");
}
</script>
</body>
</html>