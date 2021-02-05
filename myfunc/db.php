<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
if (isset($_POST['key'])&&$_POST['key']=='pizdarulu')
{


if ($_POST['quit']=='Y') {$arResult['ok'] = 'N';echo json_encode($arResult);die();}

$hostname = "localhost"; 
$username = "u0482891_default"; 
$password = "!ie8cIWM"; 
$dbName = "u0482891_default"; 	
	

	$base = mysqli_connect( 
            $hostname, 
            $username,       /* Имя пользователя */ 
            $password,   /* Используемый пароль */ 
            $dbName);     /* База данных для запросов по умолчанию */ 

if (mysqli_connect_errno()) { 
   echo "Ошибка подключения к серверу MySQL. Код ошибки:".mysqli_connect_error(); 
   exit; 
}

if ($_POST['type']!="" AND 
	$_POST['name']!="" AND 
	$_POST['height']!="" AND 
	$_POST['picf']!="" AND 
	$_POST['picn']!="" AND 
	$_POST['price']!="" AND 
	$_POST['id']!="" AND 
	$_POST['secret']!="") {
		
		$type		=$_POST['type'];//
		$name		=$_POST['name']; //
		$height		=$_POST['height'];//
		$picf		=$_POST['picf']; //
		$picn		=$_POST['picn']; //
		$price		=$_POST['price'];//
		$id			=$_POST['id']; //
		$secret		=$_POST['secret']; //старая цена
	
		$query = "INSERT INTO toys (type, name,height,picf,picn,price,id,secret) VALUE ('".$type."','".$name."','".$height."','".$picf."','".$picn."','".$price."','".$id."','".$secret."')";
		
		$uploaddir = '../images/'.$picf.'/';
		$testdir='../images/'.$picf.'/';
		$uploadfile = $uploaddir.$picn.".jpg";
		if (is_dir($testdir)) {
			mysqli_query($base, $query);
				
								if (/*is_dir($uploaddir) AND*/ isset($_FILES['uploadfile']['tmp_name']))  {
									
											
											copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
											$arResult['ok'] = 'Y'; 
											 
						 
		} else $arResult['ok'] = 'NO_IMAGE'; 
		
		} else $arResult['ok'] = 'ERR_DIR'; 
			
						} else  {
									$arResult['ok'] = 'N'; 
								}
mysqli_close($base);
	echo json_encode($arResult);
		die();	
} else header("Location: /plzfuckoff");	
}	else header("Location: /plzfuckoff");
?>