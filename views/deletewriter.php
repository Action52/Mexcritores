<?php
require_once "../models/Writer.php";
$db = new DatabasePsql;
$dbm = new DatabaseMysql;
$user = new Writer($dbm,$db);
$username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_ENCODED);

if( $username)
{
    $user->setusername($username);
    echo $username;
    $user->delete();
}
header("Location:" . Writer::baseurl() . "views/listwriters.php");