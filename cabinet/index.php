<?php header('refresh: 15'); ?>
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

?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta name="language" content="ru">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
<meta name="author" content="TOYS68.RU">
<meta name="msapplication-config" content="/browserconfig.xml">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="167x167" href="/apple-touch-icon-167x167.png">
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />         
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="icon" sizes="192x192" href="/favicon-192.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
		<title>::: З А К А З Ы :::</title>
<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
<?php
$cssfilename = '/var/www/u0482891/data/www/toys68.ru/assets/css/main.css';
if (file_exists($cssfilename)) {
    $cssver=date("mdY ", filectime($cssfilename));
}
?>
<link rel="stylesheet" href="/assets/css/main.css<?php echo "?$cssver";?>" />
	</head>
	<body class="is-preload">
			<div id="wrapper">
			
			
			
			<div id="main">
						<div class="inner">
						
						<div class="table-wrapper" style="font-size:0.8em;">
						
						<button class="button2" style="margin-left:10px;margin-top:10px;" onclick="location.href='/'"><img style='width:50px;height:50px;' src="exit.jpg" title="Выйти из кабинета"></button>
						<button class="button2" style="margin-left:10px;margin-top:10px;" onclick="location.href='/cabinet/archive/'"><img style='width:50px;height:50px;' src="archive.jpg" title="Перейти в архив"></button>
						<button class="button2" style="margin-left:10px;margin-top:10px;" onclick="location.href='/cabinet/admin/'"><img style='width:50px;height:50px;' src="admin.jpg" title="Перейти к администрированию"></button>
						<span style="text-align:center;float:right;margin-top:1.8em;margin-right:10px;"><b>Заказы</b> <?php echo ( isset($_GET['email_sort']) ? " ".$_GET['email_sort'] : ""); ?></span> 
						 
						 
						
						 
						 <div style="margin-top:2em;"></div>
						
										<a name="z0"></a>
										<table>
											<thead>
												<tr>
													<th>№</th>
													<th>Дата</th>
													<th>Имя</th>
													<th>Эмайл
										 <?php 
							if (!isset($_GET['email_sort'])) {
							 
								if (isset($_GET['sort'])&&$_GET['sort']=="1")
										echo "<button class='button3' style='margin:5px;' onclick=\"location.href='/cabinet/'\"><img style='width:33px;height:33px;' src='stop.jpg' title='Отменить сортировку'></button>"; 
								else
										echo "<button class='button3' style='margin:5px;' onclick=\"location.href='?sort=1'\"><img style='width:33px;height:33px;' src='sort.jpg' title='Применить сортировку'></button>";
						
						 
							} else 
									{
										echo "<button class='button3' style='margin:5px;' onclick=\"location.href='/cabinet/'\"><img style='width:33px;height:33px;' src='stop.jpg' title='Отменить сортировку'></button>"; 
									}
						 ?>
													<?php 
													
													if (!isset($_GET['email_sort'])&&isset($_GET['sort'])) {
														echo "<div style='font-size:1.0em;'><form method='get' action='' id='sort_form'>";
														echo "<select style='width:8rem;font-size:0.8em;' name='email_sort' id='email_sort'>";
														

														$result  =  mysqli_query( $base,  "SELECT DISTINCT email FROM orders" );
														
														while ( $row = mysqli_fetch_assoc($result) )
															{
																
															echo "<option value='".$row['email']."'>".$row['email']."</option>";	
																
															}
													echo "</select><div style='margin-top:10px'></div>
													<input type='submit' value='OK' class='primary small' />
													</form></div>";
													}
														
													?>
													
													
													
													</th>
													<th>Игрушка</th>
													<th>Фото</th>
													<th>Цена</th>
													<th>Кол-во</th>
													<th>Сумма</th>
													<th>Статус</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											
						
											
						
						
						<?php 
						 /*
						 $filename = 'stat.txt';
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);
echo nl2br($contents);*/

/*
$hostname = "localhost"; 
$username = "u0482891_default"; 
$password = "!ie8cIWM"; 
$dbName = "u0482891_default"; 	
	

	$base = mysqli_connect( 
            $hostname, 
            $username,       
            $password,   
            $dbName);     

if (mysqli_connect_errno()) { 
   echo "Ошибка подключения к серверу MySQL. Код ошибки:".mysqli_connect_error(); 
   exit; 
} 

else {*/
	
	if (isset($_GET['del'])) 
{
	
	$query="DELETE FROM orders WHERE item_n = '".$_GET['item_n']."' AND id = '".$_GET['del']."'";
mysqli_query($base, $query);
}
	
	if(isset($_GET['arc']))
	{
		$query = "INSERT INTO archive (name, email,date,item_n,picn,picf,item_p,num,id,status) VALUE ('".$_GET['name']."','".(isset($_GET['email'])?$_GET['email']:$_GET['email_sort'])."','".$_GET['date']."','".$_GET['item_n']."','"./*$_POST['item_h']*/$_GET['picn']."','".$_GET['picf']."','".$_GET['item_p']."','".$_GET['num']."','".$_GET['id']."','".$_GET['status']."'".")";
		mysqli_query($base, $query);
		$query="DELETE FROM orders WHERE item_n = '".$_GET['item_n']."' AND id = '".$_GET['id']."'";
mysqli_query($base, $query);
	}
	
	if (isset($_GET['id'])) {
$query = "UPDATE orders SET status='Выполнено' WHERE id='".$_GET['id']."' AND item_n = '".$_GET['item_n']."'";
mysqli_query($base, $query);
	}
	
	if (isset($_GET['email_sort'])) {
		
	$result  =  mysqli_query( $base,  "SELECT * FROM orders WHERE email='".$_GET['email_sort']."'");	
		
	if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
				else {

				$sum=0;
				$i=1;
						while ( $row = mysqli_fetch_assoc($result) )
						{
							
							echo "<tr>";
							//echo "<a name='z".$i++."'></a>";
							echo "<td style='vertical-align : middle;'><a name='z".$i."'></a>" .$row['id']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['date']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['name']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['email']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['item_n']."</td>";
							echo "<td style='vertical-align : middle;'><a href='/images/".$row['picf']."/".$row['picn'].".jpg"."'><img width='85px' title='Фото игрушки в заказе' src='/images/".$row['picf']."/".$row['picn'].".jpg'></a>"."</td>";
							echo "<td style='vertical-align : middle;'>".$row['item_p']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['num']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['num']*$row['item_p']."</td>";
							
							if($row['status']=="Выполнено")
							echo "<td style='vertical-align : middle;'><span style='color:rgb(0,200,0);'>".$row['status']."</span></td>";
						else echo "<td style='vertical-align : middle;'>".$row['status']."</td>";
							if ($row['status']=="В процессе")
							echo "<td style='vertical-align : middle;'><button class='button3' style='margin:5px;' onclick=\"location.href='?email_sort=".$row['email']."&id=".$row['id']."&item_n=".$row['item_n']."#z".$i."'\"><img style='width:33px;height:33px;' src='done.jpg' title='Пометить заказ как Выполненный'></button>"."&nbsp;&nbsp;&nbsp;<button class='button3' style='margin:5px;' onclick=\"location.href='?del=".$row['id']."&item_n=".$row['item_n']."#z".($i>6?$i-1:0)."'\"><img style='width:33px;height:33px;' src='del.jpg' title='Удалить заказ'></button>"."</td>";
							else {
								echo "<td style='vertical-align : middle;'><button class='button3' style='margin:5px;' onclick=\"location.href='?arc=1&name=".$row['name']."&email_sort=".$row['email']."&date=".$row['date']."&item_n=".$row['item_n']."&picn=".$row['picn']."&picf=".$row['picf']."&item_p=".$row['item_p']."&num=".$row['num']."&id=".$row['id']."&status=Архив"."#z".($i>6?$i-1:0)."'\"><img style='width:33px;height:33px;' src='arc.jpg' title='Перенести заказ в архив'></button></td>";
								$sum=$sum+$row['num']*$row['item_p'];}
							echo "</tr>";
						$i++;
						}
					}
	
	
	} else {
	
	
	$result  =  mysqli_query( $base,  "SELECT * FROM orders" );

			if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
				else {

				$sum=0;
				$i=1;
						while ( $row = mysqli_fetch_assoc($result) )
						{
							
							echo "<tr>";
							//echo "<a name='z".$i++."'></a>";
							echo "<td style='vertical-align : middle;'><a name='z".$i."'></a>" .$row['id']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['date']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['name']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['email']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['item_n']."</td>";
							echo "<td style='vertical-align : middle;'><a href='/images/".$row['picf']."/".$row['picn'].".jpg"."'><img width='85px' title='Фото игрушки в заказе' src='/images/".$row['picf']."/".$row['picn'].".jpg'></a>"."</td>";
							echo "<td style='vertical-align : middle;'>".$row['item_p']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['num']."</td>";
							echo "<td style='vertical-align : middle;'>".$row['num']*$row['item_p']."</td>";
							
							if($row['status']=="Выполнено")
							echo "<td style='vertical-align : middle;'><span style='color:rgb(0,200,0);'>".$row['status']."</span></td>";
						else echo "<td style='vertical-align : middle;'>".$row['status']."</td>";
							if ($row['status']=="В процессе")
							echo "<td style='vertical-align : middle;'><button class='button3' style='margin:5px;' onclick=\"location.href='?id=".$row['id']."&item_n=".$row['item_n']."#z".$i."'\"><img style='width:33px;height:33px;' src='done.jpg' title='Пометить заказ как выполненный'></button>"."&nbsp;&nbsp;&nbsp;<button class='button3' style='margin:5px;' onclick=\"location.href='?del=".$row['id']."&item_n=".$row['item_n']."#z".($i>6?$i-1:0)."'\"><img style='width:33px;height:33px;' src='del.jpg' title='Удалить заказ'></button>"."</td>";
							else {
								echo "<td style='vertical-align : middle;'><button class='button3' style='margin:5px;' onclick=\"location.href='?arc=1&name=".$row['name']."&email=".$row['email']."&date=".$row['date']."&item_n=".$row['item_n']."&picn=".$row['picn']."&picf=".$row['picf']."&item_p=".$row['item_p']."&num=".$row['num']."&id=".$row['id']."&status=Архив"."#z".($i>6?$i-1:0)."'\"><img style='width:33px;height:33px;' src='arc.jpg' title='Перенести заказ в архив'></button></td>";
								$sum=$sum+$row['num']*$row['item_p'];}
							echo "</tr>";
						$i++;
						}
					}
}

/* Закрываем соединение */ 
mysqli_close($base);
	
	
	
//}
					
						
						?>
						
</tbody>
											<tfoot>
												<tr>
													<td colspan="8"></td>
												<td style='vertical-align : middle;'><b>Итого:</b> <?php echo $sum;?>р.</td>	
												</tr>
												
											</tfoot>
										</table>
									</div>	
	</div>
						</div>
			</div>
			
			</body>
</html>