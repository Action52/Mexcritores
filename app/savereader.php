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
);

$post = (object)filter_input_array(INPUT_POST, $args);

$db = new DatabasePsql;
$user = new Reader($db);
$user->setnombrelec($post->nombrelec);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->save();
header("Location:" . Reader::baseurl() . "app/listreaders.php");