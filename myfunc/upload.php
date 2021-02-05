<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

if (isset($_POST['key'])&&$_POST['key']=='pizdarulu')
{

//закачиваем файл аватарки
if (isset($_POST['avaname'])&&$_POST['avaname']!='')
	{
		$uploaddir = '../images/';
		$uploadfile = $uploaddir.$_POST['avaname'].".jpg";
		
		if (isset($_FILES['avafile']['tmp_name'])) {
			if (copy($_FILES['avafile']['tmp_name'], $uploadfile)) {
		$response_array['status'] = 'upload_success'; 
		die(json_encode($response_array)); 
			} 
		} else {
			$response_array['status'] = 'upload_error'; 
			die(json_encode($response_array)); 
			}
		
	
	}  
//end

}	else header("Location: /plzfuckoff");
}  else header("Location: /plzfuckoff");
?>