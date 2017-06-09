<?php

$fileName = $_POST['filename'];
$currentuser = 'user1';

$fileToDelete = "uploads/". $currentuser . "/". $fileName;


if (file_exists($fileToDelete)) {
	chdir($fileToDelete);
	chown($fileToDelete,465);
	
	$do = unlink($fileToDelete);
	if ($do=="1"){
		echo "The file was deleted successfully.";
	} else { echo "There was an error trying to delete the file."; } 
} else {
	echo '/n file not Found!';
}

?>