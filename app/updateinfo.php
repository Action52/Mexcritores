<?php
  include('login.php'); // Includes Login Script
  include('../database/DatabaseMysql.php');
  include('../database/DatabasePsql.php');
  include('../models/User.php');
  $dbM = new DatabaseMysql;
  $dbP = new DatabasePsql;
  $user = new User($dbM,$dbP);
  $userInfo = $user->infoUser($_SESSION['login_user']);

  $newpass = md5($_POST['password']);
  $newmail = $_POST['email'];
  $newname = $_POST['name'];
  $newlastname = $_POST['lastname'];
  //Update from mysql: user
  $user->update($newpass,$newmail,$newname,$newlastname, $_SESSION['login_user']);



  //Update from postgreSql


  //Final logout

  header('Location: book.php');
?>
