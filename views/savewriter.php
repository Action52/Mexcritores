<?php
require_once "../models/Writer.php";
if (empty($_POST['submit']))
{
      header("Location:" . Writer::baseurl() . "views/listwriters.php");
      exit;
}

$args = array(
    'nombre'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

 $post->password = md5($post->password);

$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Writer($dbm,$db);
$user->setnombre($post->nombre);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->setusername($post->username);
$user->setpassword($post->password);
$user->save();
header("Location:" . Writer::baseurl() . "views/listwriters.php");