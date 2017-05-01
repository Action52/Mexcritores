<?php
  include('login.php'); // Includes Login Script
  include('../database/DatabaseMysql.php');
  include('../database/DatabasePsql.php');
  include('../models/User.php');
  $dbM = new DatabaseMysql;
  $dbP = new DatabasePsql;
  $user = new User($dbM,$dbP);
  $userInfo = $user->infoUser($_SESSION['login_user']);

  //Delete from mysql: user
  $user->delete($_SESSION['login_user']);



  //Delete from postgreSql


  //Final logout

  header('Location: logout.php');
?>
