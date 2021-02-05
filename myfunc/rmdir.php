<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

if (isset($_POST['key'])&&$_POST['key']=='pizdarulu')
{
	
	if (isset($_POST['rmdir'])&&$_POST['rmdir']!='')
		
		{
			 function removeDirectory($path) {
				if ($objs = glob($path."/*")) {
							foreach($objs as $obj) {
								is_dir($obj) ? removeDirectory($obj) : unlink($obj);
								}
							}
								rmdir($path);
			}
				if (is_dir("../images/".$_POST['rmdir']."/")) {
					removeDirectory("../images/".$_POST['rmdir']);
			
					$response_array['status'] = 'rmdir_success'; 
					die(json_encode($response_array)); 
				}
			
				else {
					
						if(is_file("../images/".$_POST['rmdir'])) { 
																unlink("../images/".$_POST['rmdir']);
																$response_array['status'] = 'rmdir_success'; 
																die(json_encode($response_array));
																} else
																{$response_array['status'] = 'rmdir_error'; 
																die(json_encode($response_array)); }
					}
		}
	
	
	if (isset($_POST['rmdir_toys'])&&$_POST['rmdir_toys']!='')
		
		{
			 function removeDirectory($path) {
				if ($objs = glob($path."/*")) {
							foreach($objs as $obj) {
								is_dir($obj) ? removeDirectory($obj) : unlink($obj);
								}
							}
								rmdir($path);
			}
				if (is_dir("../toys/".$_POST['rmdir_toys']."/")) {
					removeDirectory("../toys/".$_POST['rmdir_toys']);
			
					$response_array['status'] = 'rmdir_toys_success'; 
					die(json_encode($response_array)); 
				}
			
				else {
					
						if(is_file("../toys/".$_POST['rmdir_toys'])) { 
																unlink("../toys/".$_POST['rmdir_toys']);
																$response_array['status'] = 'rmdir_toys_success'; 
																die(json_encode($response_array));
																} else
																{$response_array['status'] = 'rmdir_toys_error'; 
																die(json_encode($response_array)); }
					}
		}
	
	
	
	
	}	else header("Location: /plzfuckoff");
}  else header("Location: /plzfuckoff");
?>