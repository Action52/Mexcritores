<?php
require_once "../models/Writer.php";
if (empty($_POST['submit']))
{
      header("Location:" . Writer::baseurl() . "app/listwriters.php");
      exit;
}
$args = array(
	'id'        => FILTER_VALIDATE_INT,
    'nombre'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
    'edad'  => FILTER_SANITIZE_NUMBER_INT,
    'nacionalidad'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false )
{
    header("Location:" . Writer::baseurl() . "app/listwriters.php");
}

$db = new DatabasePsql;
$user = new Writer($db);
$user->setId($post->id);
$user->setnombre($post->nombre);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->setedad($post->edad);
$user->setnacionalidad($post->nacionalidad);
$user->update();
header("Location:" . Writer::baseurl() . "app/listwriters.php");