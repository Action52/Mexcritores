<?php
require_once "../models/Book.php";
$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Book($dbm,$db);
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);

if( $id )
{
    $user->setId($id);
    $user->delete();
}
header("Location:" . Book::baseurl() . "views/listbooks.php");