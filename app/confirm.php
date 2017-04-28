<?php
  include("../database/DatabaseMysql.php");
  include("../database/DatabasePsql.php");
  include("../models/User.php");

  $db = new DatabaseMysql;
  $dbP = new DatabasePsql;

  $user = new User($db, $dbP);

  $tkn = $_POST['token'];

  //Salvar el usuario confirmado

  $user->save($tkn);
?>
