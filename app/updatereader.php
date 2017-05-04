<?php
require_once "../models/Reader.php";
if (empty($_POST['submit']))
{
      header("Location:" . Reader::baseurl() . "app/listReaders.php");
      exit;
}
$args = array(
	'id'        => FILTER_VALIDATE_INT,
    'nombrelec'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . Reader::baseurl() . "app/listReaders.php");
}

$db = new DatabasePsql;
$user = new Reader($db);
$user->setId($post->id);
$user->setnombrelec($post->nombrelec);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->update();
header("Location:" . Reader::baseurl() . "app/listReaders.php");