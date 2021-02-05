<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_COOKIE['id'])) 
	{
		$id = explode(":", $_COOKIE['id']);
		for ($i=0;$i<count($id);$i++) {
			if ($id[$i]==$_POST['id']) {
							$response_array['status']='exist';
							die(json_encode($response_array));	
							}		
		}		
	setcookie("id",$_COOKIE['id'].":".$_POST['id'],time()+60*60,"/");		
	$response_array['status']='success';
	die(json_encode($response_array));	
	} else
		{
			setcookie("id",$_POST['id'],time()+60*60,"/");
			$response_array['status']='success';
			die(json_encode($response_array));	
		}
	
}

?>