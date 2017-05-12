<?php
include('login.php'); // Includes Login Script

include('../database/DatabaseMysql.php');
include('../database/DatabasePsql.php');
include('../models/User.php');
$dbM = new DatabaseMysql;
$dbP = new DatabasePsql;
$user = new User($dbM,$dbP);
$userInfo = $user->infoUser($_SESSION['login_user']);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mexcritores</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>


    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="main-page">

    <!--Header-->
    <div class ="panel-header header-mex row">
      <div class ="col-md-2">
        <center><a href ="index.php"><img src="img/logo.png" class="logo-header"></a></center>
      </div>
      <div class ="col-md-2">

      </div>
      <div class ="col-md-1">

      </div>
      <form action = "logout.php" method = "POST" class ="form-group form-inline">
        <div class ="col-md-6" align ="center">
          <h5 class ="txt-field-mex">Welcome to Mexcritores, <?php echo $userInfo['username']; ?> . You are a member since: <?php echo $userInfo['fecha_creacion'] ?>
          <br />
          <a href ="delete.php">Delete my account</a> | <a href="update.php">Update my info</a> | <a href="store.php">Store</a>
          </h5>

        </div>
        <div class ="col-md-1">
          <center>
          <div class ="row">
          <input type="submit" name="submit" value="Log out" id="submit" placeholder="submit" class ="btn btn-primary btn-sm btn-mex">
          </div>
          <div class ="row">

          </div>
          </center>
        </div>
      </form>
    </div>
    <!--End of Header-->

    <!--Content-->
    <div class ="container">
      <div class ="row">
        <div class ="col-md-6">
        </div>
        <div class ="col-md-6 register-space">
          <h1>Update my information<h1>
          <h3>
            Update your data so we can keep in touch with you correctly!
          </h3>
          <br>
          <h4><form action = "updateinfo.php" method = "POST" class ="form-group">
            <input type="submit" name="submit" value="Update" id="submit" placeholder="submit" class ="btn btn-primary btn-sm btn-mex">
            <br>
            <br />
            Username: <?php echo $_SESSION['login_user']?> is permanent.
            <br>
            <br />
            New Password:
            <br>
            <input type="password" name="password" value="" id="password" placeholder="Password" class ="txt-field txt-field-mex">
            <br>
            <br>
            New Name: <input type="text" name="name" value="" id="name" placeholder="<?php echo $userInfo['name'];?>" class ="form-control txt-field-mex">
            <br>
            New Last name: <input type="text" name="lastname" value="" id="lastname" placeholder="<?php echo $userInfo['lastname'];?>" class ="form-control txt-field-mex">
            <br>
            New Mail: <input type="text" name="email" value="" id="email" placeholder="<?php echo $userInfo['email'];?>" class ="form-control txt-field-mex">
            <br>
          </form></h4>
        </div>
      </div>
    </div>
    <!--End of content-->

    <!--Footer-->
    <div class="panel-footer footer-mex">
      <center>&#9400 Mexcritores 2017. All rights reserved.</center>
    </div>
    <!--End of footer-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
