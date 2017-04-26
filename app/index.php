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
      <div class ="col-md-3">
        <center><img src="img/logo.png" class="logo-header"></center>
      </div>
      <form action = "" method = "POST">
        <div class ="col-md-2">
          <h5>Username: </h5> <input type="text" name="username" value="" id="username" placeholder="Username" class ="txt-field txt-field-mex">
        </div>
        <div class ="col-md-2">
          <h5>Password: </h5> <input type="password" name="password" value="" id="password" placeholder="Password" class ="txt-field txt-field-mex">
        </div>
        <div class ="col-md-2">
          <br>
          <center>
          <div class ="row">
          <input type="submit" name="submit" value="Log in" id="password" placeholder="Password" class ="btn btn-primary btn-sm btn-mex">
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
          <h1>Register<h1>
          <h3>
            Sign up to our awesome community and rock with new publications everyday!
          </h3>
          <br>
          <h4><form action = "register.php" method = "POST" class ="form-group">
            Sign up as:
            <select class ="txt-field-mex" name ="entity">
              <option value="reader">Reader</option>
              <option value="writer">Writer</option>
            </select>
            Age:
              <select class ="txt-field-mex" name ="age">
                <?php
                  for($i = 18; $i < 80; $i++){
                    echo '<option value = '.$i.'>'.$i.'</option>';
                  }
                ?>
              </select>
            <input type="submit" name="submit" value="Register" id="submit" placeholder="submit" class ="btn btn-primary btn-sm btn-mex">
            <br>
            <br>
            Username: <input type="text" name="username" value="" id="username" placeholder="Username" class ="form-control txt-field-mex">
            <br>
            Password:
            <br>
            <input type="password" name="password" value="" id="password" placeholder="Password" class ="txt-field txt-field-mex">
            <br>
            <br>
            Name: <input type="text" name="name" value="" id="name" placeholder="Name" class ="form-control txt-field-mex">
            <br>
            Last name: <input type="text" name="lastname" value="" id="lastname" placeholder="Last name" class ="form-control txt-field-mex">
            <br>
            Mail: <input type="text" name="email" value="" id="email" placeholder="Mail" class ="form-control txt-field-mex">
            <br>
            Nationality: <input type="text" name="nation" value="" id="nation" placeholder="Nationality" class ="form-control txt-field-mex">
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

    <?php
      include("../database/DatabaseMysql.php");
      include("../database/DatabasePsql.php");
      $dbM = new DatabaseMysql;
      $dbP = new DatabasePsql;

      $dbM->connect();
    ?>
  </body>
</html>
