<?php
require_once "../models/Writer.php";
if (empty($_POST['submit']))
{
      header("Location:" . Writer::baseurl() . "app/listwriters.php");
      exit;
}

$args = array(
    'nombre'  => FILTER_SANITIZE_STRING,
    'apellidos'  => FILTER_SANITIZE_STRING,
    'email'  => FILTER_SANITIZE_STRING,
    'edad'  => FILTER_SANITIZE_NUMBER_INT,
    'nacionalidad'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

$db = new DatabasePsql;
$user = new Writer($db);
$user->setnombre($post->nombre);
$user->setapellidos($post->apellidos);
$user->setemail($post->email);
$user->setedad($post->edad);
$user->setnacionalidad($post->nacionalidad);
$user->save();
header("Location:" . Writer::baseurl() . "app/listwriters.php");