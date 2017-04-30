<?php
require_once "../models/Writer.php";
$db = new DatabasePsql;
$user = new Writer($db);
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);

if( $id )
{
    $user->setId($id);
    $user->delete();
}
header("Location:" . Writer::baseurl() . "app/listwriters.php");