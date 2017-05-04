<?php
require_once "../models/Reader.php";
$db = new DatabasePsql;
$user = new Reader($db);
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);

if( $id )
{
    $user->setId($id);
    $user->delete();
}
header("Location:" . Reader::baseurl() . "app/listReaders.php");