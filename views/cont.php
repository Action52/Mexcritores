<?php
  //Get information from POST and work on it
  $email = $_POST['email'];
  $message = $_POST['message'];


  /*Send via php mailer*/


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
  $mail->Password = "vhxfupwbbofifyns";

  //Set who the message is to be sent from
  $mail->setFrom($email, 'Contact Me');

  //Set an alternative reply-to address
  $mail->addReplyTo($email, 'Contact Me');

  //Set who the message is to be sent to
  $mail->addAddress('leonvillapun@gmail.com', 'Mexcritores');

  //Set the subject line
  $mail->Subject = 'Mexcritores Contact';

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

  //Replace the plain text body with one created manually
  $mail->Body = $message;

  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');

  //send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    header('Location: index.php');
  }

?>
