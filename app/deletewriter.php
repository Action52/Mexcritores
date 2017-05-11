<?php
require_once "../models/Writer.php";
$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Writer($dbm,$db);
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);

if( $id )
{
    $user->setId($id);
    $user->delete();
}
header("Location:" . Writer::baseurl() . "app/listwriters.php");