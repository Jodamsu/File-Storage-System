<?php
$uploaded = array();
$userId = $_GET["userId"];
$dir = 'uploads/' .$userId.'/';
	
if (!is_dir($dir)) {
		mkdir($dir);         
	}

if(!empty($_FILES['file']['name'][0])) {
    foreach($_FILES['file']['name'] as $position => $name) {
        if (move_uploaded_file($_FILES['file']['tmp_name'][$position], $dir. $name)) {
            $uploaded[] = array(
                'name' => $name,
                'file' => $dir. $name
            );
        }
    }
}

echo json_encode($uploaded);
?>