<?php
  include('login.php'); // Includes Login Script
  include('../database/DatabaseMysql.php');
  include('../database/DatabasePsql.php');
  include('../models/User.php');
  include('../models/Reader.php');
  include('../models/Writer.php');
  $dbM = new DatabaseMysql;
  $dbP = new DatabasePsql;
  $user = new User($dbM,$dbP);
  $userInfo = $user->infoUser($_SESSION['login_user']);

  //Delete from mysql: user
  $user->delete($_SESSION['login_user']);



  //Delete from postgreSql
  if($userInfo['tipo'] == 0){ //Reader
    $reader = new Reader($dbM,$dbP);
    $reader->deleteWithUsername($_SESSION['login_user']);
  }
  if($userInfo['tipo'] == 1){ //Writer
    $writer = new Writer($dbM,$dbP);
    $writer->deleteWithUsername($_SESSION['login_user']);
  }

  //Final logout

  header('Location: logout.php');
?>
