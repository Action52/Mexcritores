<?php
require_once "../models/Reader.php";
if (empty($_POST['submit']))
{
      header("Location:" . Reader::baseurl() . "app/listreaders.php");
      exit;
}

$args = array(
    'nombrelec'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

 $post->password = md5($post->password);

$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Reader($dbm,$db);
$user->setnombrelec($post->nombrelec);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->setusername($post->username);
$user->setpassword($post->password);
$user->save();
header("Location:" . Reader::baseurl() . "app/listreaders.php");