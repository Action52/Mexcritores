<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
header('Location: index.php');
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("127.0.0.1", "root", "","mexcritoresMYSQL");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
 $password = md5($password);
// Selecting Database
//$db = mysql_select_db("mexcritoresm", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select username, password , tipo from usuario where password='$password' AND username='$username'");
 if($row = mysqli_fetch_array($query)){
 	  if($row["password"] == $password){
 	  	if($row["tipo"] == 0){ //Reader
 	  		$_SESSION['login_user']=$username;
 	  		header("location: book.php");
 	  		//Ingresar localizacion de lector
 	  	}

 	  	if($row["tipo"] == 1){ //Writer
 	  		$_SESSION['login_user']=$username;
 	  		header("location: writer.php");
 	  		//ingresar localizacion de pagina escritor
 	  	}

 	  	if($row["tipo"] == 2){ //admin
 	  		$_SESSION['login_user']=$username;
 	  		header("location: adminlanding.php");
 	  	}
 	  }
 // Initializing Session

 }else header('Location: index.php');



mysqli_close($connection); // Closing Connection
}

}
?>
