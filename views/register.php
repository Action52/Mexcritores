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

    <?php
      //Get information from POST and work on it
      $entity = $_POST['entity'];
      $username = $_POST['username'];
      $name = $_POST['name'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      //include connections
      include("../database/DatabaseMysql.php");
      include("../database/DatabasePsql.php");
      include("../models/Token.php");
      $dbM = new DatabaseMysql;
      $dbM->connect();
      $dbP = new DatabasePsql;
      $token = new Token($dbM);

      //Fill in variables
      $token->setUsername($username);
      $token->setPassword($password);
      $token->setName($name);
      $token->setLastName($lastname);
      $token->setEmail($email);

      //Generate token
      $tkn = $token->generateToken();
      $token->setToken($tkn);

      //Make registry in table
      if($entity == "reader"){
        $token->save(0);
      }
      else if($entity == "writer"){
        $token->save(1);
      }

      /*Send token via php mailer*/


      date_default_timezone_set('Etc/UTC');

      require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

      //Create a new PHPMailer instance
      $mail = new PHPMailer;

      //Tell PHPMailer to use SMTP
      $mail->isSMTP();

      //Enable SMTP debugging
      // 0 = off (for production use)
      // 1 = client messages
      // 2 = client and server messages
      $mail->SMTPDebug = 0;

      //Ask for HTML-friendly debug output
      $mail->Debugoutput = 'html';

      //Set the hostname of the mail server
      $mail->Host = 'smtp.gmail.com';
      // use
      //$mail->Host = gethostbyname('smtp.gmail.com');
      // if your network does not support SMTP over IPv6

      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $mail->Port = 587;

      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'tls';

      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;

      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "leonvillapun@gmail.com";

      //Password to use for SMTP authentication
      $mail->Password = "vhxfupwbbofifyns"; //Esta es la contraseña de aplicacion

      //Set who the message is to be sent from
      $mail->setFrom('leonvillapun@gmail.com', 'Mexcritores');

      //Set an alternative reply-to address
      $mail->addReplyTo('leonvillapun@gmail.com', 'Mexcritores');

      //Set who the message is to be sent to
      $mail->addAddress($email, $name);

      //Set the subject line
      $mail->Subject = 'Mexcritores Register Token';

      //Read an HTML message body from an external file, convert referenced images to embedded,
      //convert HTML into a basic plain-text alternative body
      //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

      //Replace the plain text body with one created manually
      $mail->Body = 'Token: ' . $tkn;

      //Attach an image file
      //$mail->addAttachment('images/phpmailer_mini.png');

      //send the message, check for errors
      if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      } else {

      }

    ?>

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
      <form action = "login.php" method = "POST" class ="form-group form-inline">
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
            <h1>Token Registration</h1>
            <h3>You're just a step away from being a member!
            <br>Please enter the token we have sent to your mail.</h3>
            <form action = "confirm.php" method = "POST" class ="form-group">
              <input type="text" name="token" value="" id="token" placeholder="Token" class ="txt-field txt-field-mex col-xs-4 register">
              &#09;<input type="submit" name="submit" value="Send token" id="submit" placeholder="submit" class ="btn btn-primary btn-sm btn-mex">
            </form>
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
