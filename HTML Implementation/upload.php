<?php
header('Access-Control-Allow-Origin: *');
$target_dir = "Stored_Files/";
$target_file = $target_dir . basename($_FILES["datafile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$errormsg="";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["datafile"]["tmp_name"]);
    if($check !== false) {
        $errormsg= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $errormsg= "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $errormsg= "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errormsg .= "<br>There was an error";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["datafile"]["tmp_name"], $target_file)) {
        $errormsg= "The file ". basename( $_FILES["datafile"]["name"]). " has been uploaded.";
    } else {
        $errormsg = "Sorry, there was an error uploading your file.";
    }
}
echo (string)$errormsg;
echo "<p><a href=\"javascript:history.go(-1)\">Go Back</a></p>";
?>