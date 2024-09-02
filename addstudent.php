<?php 
require 'includes/snippet.php';
    require 'includes/db-inc.php';

if(isset($_POST['submit'])) {

    
    $password = sanitize(trim($_POST['password']));
    $password2 = sanitize(trim($_POST['password2']));
    $username = sanitize(trim($_POST['username']));
    $email = sanitize(trim($_POST['email']));
    $dept = sanitize(trim($_POST['dept']));
    $books = sanitize(trim($_POST['num_books']));
    $money = sanitize(trim($_POST['money_owed']));
    $phone = sanitize(trim($_POST['phone']));
    $name = sanitize(trim($_POST['name']));
    


   if ($password == $password2) {
      $sql = "INSERT INTO students( password, username, email, dept, numOfBooks, moneyOwed, phoneNumber, name)
 VALUES ('$password', '$username', '$email', '$dept', '$books', '$money', '$phone', '$name' ) ";

      $query = mysqli_query($conn, $sql);
      $error = false;
      if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not Registered successful!! Try again.');
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
    <title>Sign-up form for students</title>
</head>
<body>

<div class="container">
    
    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">

              <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Added Successfully!</strong>
            </div>
            <?php } ?>
        
            <p class="page-header" style="text-align: center">SIGN-UP FORM FOR STUDENTS</p>

            <div class="container">
                <form class="form-horizontal" role="form" action="addstudent.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Username" class="col-sm-2 control-label">FULL NAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Full name" id="name" required>
                        </div>      
                    </div>
                    
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">DEPT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dept" placeholder="Department" id="Address" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="password" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">CONFRIM PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm password" id="password" required>
                        </div>      
                    </div>
                     
                     <input type="hidden" class="form-control" name="num_books" placeholder="books" id="password" required value="null">
                     <input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password" required value="null">
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="phone" id="password" required>
                        </div>      
                    </div>     
                         
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                                ADD STUDENT
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