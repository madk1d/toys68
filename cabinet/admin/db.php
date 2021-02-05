<?php


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

else {

//удаление всей базы ?db=drop&name=name
if (isset($_GET['db'])&&$_GET['db']=="drop")
{

		$query="DROP TABLE ".$_GET['name'];
		if (  mysqli_query($base, $query)  ) echo "Таблица удалена.";
		else echo "Error: "  .  mysqli_error();
}
//удаление по айди
if (isset($_GET['db'])&&$_GET['db']=="del")
{
$query="DELETE FROM orders WHERE id = '".$_GET['id']."'";
if (  mysqli_query($base, $query)  ) echo "Запись удалена.";
		else echo "Error: "  .  mysqli_error();

}	
//создание базы ?db=create&name=name
if (isset($_GET['db'])&&$_GET['db']=="create") {

		$query = 'CREATE TABLE '.$_GET['name'].' (stop VARCHAR(50))';
		if (mysqli_query($base, $query)) echo "Таблица создана.";
		$query = "INSERT INTO stock (stop) VALUE ('2018-10-20')";
		if (mysqli_query($base, $query)) echo "INSERT ok.";

}



/* Закрываем соединение */ 
mysqli_close($base);
}
?>