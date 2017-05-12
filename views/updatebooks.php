<?php
require_once "../models/Book.php";
if (empty($_POST['submit']))
{
      header("Location:" . Book::baseurl() . "views/listBooks.php");
      exit;
}
$args = array(
	'id'        => FILTER_VALIDATE_INT,
    'titulo'  => FILTER_SANITIZE_STRING,
    'descripcion'  => FILTER_SANITIZE_STRING,
    'paginas'  => FILTER_VALIDATE_INT,
    'genero'  => FILTER_SANITIZE_STRING,
    'url' => FILTER_SANITIZE_STRING,

);

$post = (object)filter_input_array(INPUT_POST, $args);


if( $post->id === false )
{
    header("Location:" . Book::baseurl() . "views/listBooks.php");
}

$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Book($dbm,$db);
$user->setId($post->id);
$user->setTitulo($post->titulo);
$user->setDescripcion($post->descripcion);
$user->setPaginas($post->paginas);
$user->setGenero($post->genero);
$user->setPaginas($post->paginas);
$user->setUrl($post->url);
$user->update();
header("Location:" . Book::baseurl() . "views/listBooks.php");