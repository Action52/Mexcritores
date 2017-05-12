<?php
require_once "../models/Reader.php";
if (empty($_POST['submit']))
{
      header("Location:" . Reader::baseurl() . "views/listReaders.php");
      exit;
}
$args = array(
	'id'        => FILTER_VALIDATE_INT,
    'nombrelec'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
    'username' => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

echo $post->username;

 $pass= md5($post->password);

if( $post->id === false )
{
    header("Location:" . Reader::baseurl() . "views/listReaders.php");
}

$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Reader($dbm,$db);
$user->setId($post->id);
$user->setnombrelec($post->nombrelec);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->setusername($post->username);
$user->setpassword($pass);
$user->update();
header("Location:" . Reader::baseurl() . "views/listReaders.php");