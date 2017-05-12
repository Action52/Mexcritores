<?php
require_once "../models/Reader.php";
$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Reader($dbm,$db);
$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_ENCODED);


if( $username)
{
    $user->setusername($username);
    $user->delete();
}
header("Location:" . Reader::baseurl() . "views/listReaders.php");