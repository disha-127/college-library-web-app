<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';

if ($conn) {
		echo "Connected to database. Successful login by admin";
	}
	else
	{
		echo "Check your Db connection";
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
    <title>Admin</title>
</head>
<body>

<div class="container">
    <?php include "includes/nav.php"; ?>
		<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
	    <h4 class="center-block"><strong> Welcome</strong> <span>
		 <?php echo $admin; ?></span> </h4>
	</div>

</body>
</html>