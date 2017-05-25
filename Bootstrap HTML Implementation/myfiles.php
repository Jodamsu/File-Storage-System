<!DOCTYPE html>
<html lang="en">

<head>



<script> 
	
	function deleteImage(file_name)
{
    var r = confirm("Are you sure you want to delete " + file_name + " ?");
	
    if(r == true)
    {
		var formData = new FormData();
			
		formData.append("filename", file_name);
		
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'delete.php', true);
		xhr.onload = function () {
		console.log(this.responseText);
		document.getElementById(file_name).remove();
	};
	xhr.send(formData);
    }
}
</script>
    
    <!-- Meta Declaration -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Myles Wardell" content="">
    
    <!-- Page Title -->
    <title> My Files </title>

    <!-- StyleSheet Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <!-- Navigation Bar -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="myfiles.html">My File Upload</a>
            </div>
            
            <!-- Links to Other Pages -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="myfiles.html">My Files</a></li>
                    <li> <a href="upload.html">Upload</a> </li>
                    <li> <a href="about.html">About Us</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Page Content -->
    <div class="container">

    <!-- Table -->
    <div class="container">

      <h2>My Files</h2>          
          <table class="table">
            <thead>
              <tr>
                <th>File Name</th>
                <th>Upload Date</th>
				<th>Preview</th>
                <th>Download</th>
				<th>Remove</th>
              </tr>
            </thead>
			
			
			<?php
			$currentuser = 'user1';
			$dir = 'uploads/';
			if ($currentuser != null){
				$dir .= $currentuser.'/';
			}
			
			$filesinfolder = array();
			
			$filesinfolder = scandir($dir);

			echo '<tbody>';
			foreach($filesinfolder as $file){
				if($file != '.' && $file != '..' && is_file($dir.$file)){
			echo '<tr id="'. $file .'">';
			echo '<td>'.$file.'</td>';
			echo '<td>' . 'date' . '</td>';
			echo '<td>' . '<a href='.'"'.$dir.'/'.$file.'"'.' target="_blank" class="btn btn-warning active" role="button" aria-pressed="true"> Preview </a>' . '</td>';
			echo '<td>' . '<a href='.'"'.$dir.'/'.$file.'"'.' class="btn btn-success active" role="button" aria-pressed="true" download> Download </a>' . '</td>';
			echo '<td>' . '<input class="btn btn-danger" id="button" type="button" value="clickme" onclick="deleteImage(\''.$file.'\');" />' . '</td>';
			echo '</tr>';
				}
			}
			echo '</tbody>';
			echo '</table>';
			?>
    
    </div>
        
    <!-- JavaScripts Imports -->
	
    
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
