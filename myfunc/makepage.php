<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

if (isset($_POST['key'])&&$_POST['key']=='pizdarulu')
{
	
	if(isset($_POST['pagename']) && $_POST['pagename']!='')
	{
		
		if(!is_dir("../toys/".$_POST['pagename'])) {
		
			mkdir("../toys/".$_POST['pagename'], 0755); 
		if (copy("../template/toys_page.php", "../toys/".$_POST['pagename']."/index.php")) {
			
			$response_array['status'] = 'makepage_success'; 
			die(json_encode($response_array)); 
			
		}
		
		} else {
			
			$response_array['status'] = 'makepage_error'; 
			die(json_encode($response_array)); 
			
		}
		
		
		
		
	}
	
	
	
	
	}	else header("Location: /plzfuckoff");
}  else header("Location: /plzfuckoff");
?>