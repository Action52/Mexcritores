<?php
define('DOCROOT', $_SERVER['DOCUMENT_ROOT'].'/Mexcritores/Mexcritores/app/books/');

echo DOCROOT;

$filepath = DOCROOT;

//Get files from POST
$title = $_POST['title'];
$pages = $_POST['pages'];
$genre = $_POST['genre'];
$description = $_POST['description'];


//if they DID upload a file...
if($_FILES['cover']['name'])
{
	//if no errors...
	if(!$_FILES['cover']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['cover']['tmp_name']); //rename file
    $valid_file = true;
		if($_FILES['cover']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			move_uploaded_file($_FILES['cover']['tmp_name'], $filepath.$title.'cover'.'.jpg');
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['cover']['error'];
	}
}

//book

//if they DID upload a file...
if($_FILES['book']['name'])
{
	//if no errors...
	if(!$_FILES['book']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['book']['tmp_name']); //rename file
    $valid_file = true;
		if($_FILES['book']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			move_uploaded_file($_FILES['book']['tmp_name'], $filepath.$title.'.pdf');
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['book']['error'];
	}
}

header('Location: index.php');

?>
