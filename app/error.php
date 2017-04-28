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
      $age = $_POST['age'];
      $username = $_POST['username'];
      $name = $_POST['name'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $nationality = $_POST['nation'];
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

      /*Send token via php mailer

      // primero hay que incluir la clase phpmailer para poder instanciar
      //un objeto de la misma
      require "vendor/phpmailer/phpmailer/PHPMailerAutoload.php";

      $mail = new PHPMailer;

      $mail->IsSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.mandrillapp.com';                 // Specify main and backup server
      $mail->Port = 587;                                    // Set the SMTP port
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'MANDRILL_USERNAME';                // SMTP username
      $mail->Password = 'MANDRILL_APIKEY';                  // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

      $mail->From = 'A01322275@itesm.mx';
      $mail->FromName = 'Your From name';
      $mail->AddAddress($email, $name);  // Add a recipient
      //$mail->AddAddress('ellen@example.com');               // Name is optional

      $mail->IsHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Here is the subject';
      $mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->Send()) {
         echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
         exit;
      }

      echo 'Message has been sent';
      */


    ?>

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
            <br>An error occurred</h3>
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
