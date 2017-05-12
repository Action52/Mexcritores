<?php
require_once "../models/Writer.php";
if (empty($_POST['submit']))
{
      header("Location:" . Writer::baseurl() . "views/listwriters.php");
      exit;
}
$args = array(
	'id'        => FILTER_VALIDATE_INT,
    'nombre'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
    'username' => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

 $pass= md5($post->password);

if( $post->id === false )
{
    header("Location:" . Writer::baseurl() . "views/listwriters.php");
}

$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Writer($dbm,$db);
$user->setId($post->id);
$user->setnombre($post->nombre);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->setusername($post->username);
$user->setpassword($pass);
$user->update();
header("Location:" . Writer::baseurl() . "views/listwriters.php");