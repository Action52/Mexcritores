<?php
require_once "../models/Book.php";
if (empty($_POST['submit']))
{
      header("Location:" . Book::baseurl() . "views/listBooks.php");
      exit;
}

$args = array(
    'titulo'  => FILTER_SANITIZE_STRING,
    'descripcion'  => FILTER_SANITIZE_STRING,
    'paginas'  => FILTER_VALIDATE_INT,
    'genero'  => FILTER_SANITIZE_STRING,
    'url'  => FILTER_SANITIZE_STRING,
    'id'  => FILTER_SANITIZE_STRING,

);

$post = (object)filter_input_array(INPUT_POST, $args);

echo $post->titulo;
echo $post->descripcion;
echo $post->paginas;
echo $post->genero;
echo $post->url;

$idnew = (int)$post->id;
echo $idnew;

$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Book($dbm,$db);
$user->setTitulo($post->titulo);
$user->setAutor($idnew);
$user->setDescripcion($post->descripcion);
$user->setPaginas($post->paginas);
$user->setGenero($post->genero);
$user->setUrl($post->url);
$user->save();
header("Location:" . Book::baseurl() . "views/listBooks.php");