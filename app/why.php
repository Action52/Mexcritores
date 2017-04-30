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
        <center>
          <h4><a href ="why.php">Why Mexcritores?</a></h4>
        </center>
      </div>
      <div class ="col-md-1">
        <center>
          <h4><a href ="about.php">About Us</a></h4>
        </center>
      </div>
      <div class ="col-md-1">
        <center>
          <h4><a href ="contact.php">Contact</a></h4>
        </center>
      </div>
      <form action = "" method = "POST" class ="form-group form-inline">
        <div class ="col-md-5">
          <label for="username">Username</label><input type="text" name="username" value="" id="username" placeholder="Username" class ="txt-field txt-field-mex form-control">
          <label for="password">Password</label><input type="password" name="password" value="" id="password" placeholder="Password" class ="txt-field txt-field-mex form-control">
        </div>
        <div class ="col-md-1">
          <center>
          <div class ="row">
          <input type="submit" name="submit" value="Log in" id="submit" placeholder="submit" class ="btn btn-primary btn-sm btn-mex">
          </div>
          <div class ="row">

          </div>
          </center>
        </div>
      </form>
    </div>
    <!--End of Header-->

    <!--Content-->
      <div class ="row vertical-center">
          <div class ="col-md-6 col-md-offset-6 register-space">
            <h1>Why Mexcritores?</h1>
            <h3>The only option for new mexican writers!
            <br>Get your publications read by our community!</h3>
            <h5>
              <ul>
                <li>
                  Mexcritores is an eco-friendly firm. We save trees by promoting the usage of ebooks.
                </li>
                <li>
                  By joining us you will have access to hundreds of publications from mexican authors.
                </li>
                <li>
                  If you are an emergent writer, we are your first choice!
                </li>

              </ul>
            </h5>
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
