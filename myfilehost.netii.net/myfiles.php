<?php
			date_default_timezone_set("Australia/Brisbane");
			
			$currentuser = $_GET["userId"];
			$dir = 'uploads/';
			if ($currentuser != null){
				$dir .= $currentuser.'/';
			} else {
				die();
			}
			if (!is_dir($dir)) {
				mkdir($dir);         
			}
			
			$filesinfolder = array();
			
			$filesinfolder = scandir($dir);
			
			$output='';

			$output.= '<tbody>';
			foreach($filesinfolder as $file){
				if($file != '.' && $file != '..' && is_file($dir.$file)){
			$output.= '<tr id="'. $file .'">';
			$output.= '<td>'.$file.'</td>';
			$output.= '<td>' . date("F d Y H:i:s",filemtime($dir.'/'.$file)) . '</td>';
			$output.= '<td>' . '<a href='.'"'.$dir.''.$file.'"'.' target="_blank" class="btn btn-warning active" role="button" aria-pressed="true"> Preview </a>' . '</td>';
			$output.= '<td>' . '<a href='.'"'.$dir.''.$file.'"'.' class="btn btn-success active" role="button" aria-pressed="true" download> Download </a>' . '</td>';
			$output.= '<td>' . '<input class="btn btn-danger" id="button" type="button" value="Delete" onclick="deleteImage(\''.$file.'\');" />' . '</td>';
			$output.= '</tr>';
			clearstatcache();
				}
			}
			$output.= '</tbody>';
			$output.= '</table>';
			echo $output;
			?>