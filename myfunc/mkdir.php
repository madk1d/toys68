<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

if (isset($_POST['key'])&&$_POST['key']=='pizdarulu')
{
	
if(isset($_POST['mkdir'])&&$_POST['mkdir']!='')
	{
		if(!is_dir("../images/".$_POST['mkdir'])) {
		mkdir("../images/".$_POST['mkdir'], 0755); 
		
		$response_array['status'] = 'mkdir_success'; 
		die(json_encode($response_array)); 
		
		} else {
			
			$response_array['status'] = 'mkdir_error'; 
		die(json_encode($response_array)); 
		}
	}	
	
	
}	else header("Location: /plzfuckoff");
}  else header("Location: /plzfuckoff");
?>	