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

//обновить запись	

	if (isset($_GET['update'])) {
		//$param=$_GET['param'];
		//$value=$_GET['value'];
	$query="DELETE FROM toys WHERE id = '".$_GET['old_id']."'";
		mysqli_query($base, $query); 
	
	$query = "INSERT INTO toys  (type, name,height,picf,picn,price,id,secret) VALUE ('".$_GET['type']."',".
							"'".$_GET['name']."',".
							"'".$_GET['height']."',".
							"'".$_GET['picf']."',".
							"'".$_GET['picn']."',".
							"'".$_GET['price']."',".
							"'".$_GET['id']."',".
							"'".$_GET['secret']."')";
	if (mysqli_query($base, $query)) header("Location: ".$_SERVER['PHP_SELF']."#z".$_GET['z']);
	}
	
//удалить запись

	if (isset($_GET['del'])) 
	{
		$query="DELETE FROM toys WHERE id = '".$_GET['del']."'";
		if(mysqli_query($base, $query)) header("Location: ".$_SERVER['PHP_SELF']."#z".$_GET['z']);
	}

//stock

if (isset($_GET['date'])/*&&$_GET['date']!=''*/) 
	{
		//UPDATE orders SET status='Выполнено'
		if ($_GET['date']!='') {
		$query="UPDATE stock SET stop='".$_GET['date']."'";
		if(mysqli_query($base, $query)) header("Location: /cabinet/admin/?stock_success");
		}
		else header("Location: /cabinet/admin/?stock_error");
	} 	
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta name="language" content="ru">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
<title>::: TOYS BASE :::</title>
<script  src="/assets/js/jquery-3.3.1.slim.min.js"></script>
<script  src="/assets/js/jquery.min.js"></script>
<script  src="/assets/js/browser.min.js"></script>
<script  src="/assets/js/breakpoints.min.js"></script>
<script  src="/assets/js/util.js"></script>
<script  src="/assets/js/main.js"></script>	
<script src="mywork.js"></script>
<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
<link rel="stylesheet" href="/assets/css/main.css" />
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
						<div class="inner" >
						
						<div class="table-wrapper" style="font-size:0.8em;">
						 
						 
<?php
		$res=mysqli_query( $base,  "SELECT COUNT(*) FROM toys");
		$total=mysqli_fetch_assoc($res);
		
?>
						<button class="button2" style="margin-left:10px;margin-top:10px;" onclick="location.href='/'"><img style='width:50px;height:50px;' src="../exit.jpg" title="Выйти из кабинета"></button>
						<button class="button2" style="margin-left:10px;margin-top:10px;" onclick="location.href='/cabinet/'"><img style='width:50px;height:50px;' src="../home.jpg" title='Перейти к заказам'></button>
						<span style="text-align:center;float:right;margin-top:1.8em;margin-right:10px;"><b>База игрушек</b> <?php echo ( isset($_GET['type_sort']) ? " ".$_GET['type_sort'] : ""); ?></span> 
						<?php
								echo "<a name=a></a>";
						
							
							
							if (isset($_GET['help']))
							{
								
								echo "<div style='font-size:0.9em;margin-top:2em;margin-bottom:2em;'>
								<b><uppercase>I</uppercase> Для создания новой страницы для игрушек на сервере  и добавления в неё первой игрушки</b> по адресу toys68.ru/toys/<i>имя страницы</i> <b>:</b>
								<ul>
								<li>Придумайте латинское <b>НАЗВАНИЕ</b> (<i>например: snake</i>) для раздела.<br>
								<i>Все буквы прописные! В следующих пунктах использовать ТОЛЬКО ЕГО!</i></li>
								<li>В <b>п.2.1</b>, указав в поле ввода данных <b>НАЗВАНИЕ</b> (<i>например: snake</i>), прикрепите фото разрешением 400*300px или 800*600px в формате JPG.<br>
								<i>Фото будет использоваться для этого раздела на Главной странице и на странице Игрушки</i></li>
								<li>Укажите <b>НАЗВАНИЕ</b> (<i>например: snake</i>) в поле <b>п.2.2</b> и нажмите на кнопку <b>GO</b></li>
								<li>Укажите <b>НАЗВАНИЕ</b> (<i>например: snake</i>) в поле <b>п.2.3</b> и нажмите на кнопку <b>GO</b></li>
								<li>В <b>п.1.1</b> ничего вводить не нужно. Значение проставляется автоматически</li>
								<li>В <b>п.1.2</b> укажите <b>НАЗВАНИЕ</b> (<i>например: snake</i>)</li>
								<li>В <b>п.1.3</b> укажите описание на русском. <i>Например: Змея огромная гремучая</i></li>
								<li>В <b>п.1.4</b> укажите имя файла фото. <i>Например: 01</i></li>
								<li>Заполните <b>п.1.5</b> <b>п.1.6</b></li>
								<li>В <b>п.1.7</b> укажите Тип на русском с заглавной буквы. <i>Например: если вы придумали раздел snake то следует указать Змеи</i></li>
								<li>В <b>п.1.8</b> укажите значение из <b>п.1.6</b></li>
								<li>В <b>п.1.9</b> прикрепите файл разрешение 800*600px и выше</li>
								<li>Нажмите кнопку ADD</li>
								</ul>
								
								<b><uppercase>II</uppercase> Для добавления новой игрушки к уже имеющимся Типам:</b>
								<ul>
								
								
								<li>Посмотрите в Базе игрушек какое <b>ЗНАЧЕНИЕ</b> стоит в столбце Папка у тех Типов игрушек, к которым вы хотите добавить</li>
								<li>В <b>п.1.1</b> ничего вводить не нужно. Значение проставляется автоматически</li>
								<li>В <b>п.1.2</b> укажите <b>ЗНАЧЕНИЕ</b> </li>
								<li>В <b>п.1.3</b> укажите описание на русском. <i>Например: Какая то игрушка</i></li>
								<li>Посмотрите в Базе игрушек какие значения стоят в столбце Файл у данного Типа игрушек</li>
								<li>В <b>п.1.4</b> укажите следующее по порядку. <i>Например: если есть значения 01 и 02, значит надо указать 03</i></li>
								<li>Заполните <b>п.1.5</b> <b>п.1.6</b></li>
								<li>В <b>п.1.7</b> укажите Тип, который задан в Базе игрушек для данной категории с заглавной буквы.</li>
								<li>В <b>п.1.8</b> укажите значение из <b>п.1.6</b>. Если запускаете Акцию из раздела III то заполните соотв.образом</li>
								<li>В <b>п.1.9</b> прикрепите файл разрешение 800*600px и выше</li>
								<li>Нажмите кнопку ADD</li>
								</ul>
								
								<b><uppercase>III</uppercase> Для запуска Акции:</b>
								<ul>
								
								
								<li>В Базе игрушек уже имеется одна запись для раздела Акции</li>
								<li>Если вам достаточно одной игрушки для старта Акции, то: 
								
								<ul>
								<li>Нажмите кнопку <b>ИЗМ</b> у соответствующей игрушки</li>
								<li>Отредактируйте ТОЛЬКО поля <b>Имя Высота Цена Старая цена</b> и нажмите кнопку <b>ДА</b></li>
								<li>Если хотите заменить фото этой игрушки в <b>п.2.1</b> в поле ввода данных укажите <b>stock/01</b> и прекрепите новое фото в формате JPG. Нажмите кнопку <b>GO</b></li>
								</ul></li>
								<li>Если нужно добавить новую игрушку в Базу то смотрите раздел II</li>
								
								</ul>
								
								
								</div>";
								
								
								$tag = str_replace("help", "", $_SERVER['QUERY_STRING']);
								//$tag = str_replace("&", "", $_SERVER['QUERY_STRING']);
								if (strlen($tag))$tag="?".$tag;
								
								echo "<div style='margin-top:15px'><input type='button' class='button small' value='закрыть помощь' onclick=\"location.href='/cabinet/admin/".$tag."'\"></div>";
								
							} else 
							{	
							$tag = str_replace("&", "", $_SERVER['QUERY_STRING']);
							echo "<div style='margin-top:15px'><button class='primary small' onclick=\"location.href='".(!$tag ? "?help":"?".$tag."&help")."'\">помощь</button></div>";
							}
							
							if (isset($_GET['stock_success'])) echo "<script>alert('Акция успешно создана'); window.location.href='/cabinet/admin/';</script>";
							if (isset($_GET['stock_error'])) echo "<script>alert('Акция не создана');window.location.href='/cabinet/admin/';</script>";
						 
						 
							if (!isset($_GET['create'])) {
							
								if(!isset($_GET['stock'])) echo "<div style='margin-top:15px'><button class='primary small' onclick=\"location.href='?stock'\">начать акцию</button> 
								</div>";
								else {
										$query="SELECT * FROM stock";
								$result= mysqli_query($base, $query);
								$row=mysqli_fetch_assoc($result);
										echo "<div style='margin-top:30px'><form id='stock' action='' method='GET'>
										<span style='font-size:0.9em;'>Сейчас установлена дата окончания Г-М-Д: <b>".$row['stop'] ."</b><br> Задать новую дату окончания акции </span>
										<input type='date' style='font-size:0.8em;' name='date' id='date' value=''> 
										<input class='primary small' type='submit' value='Go'> 
										<input type='button' class='button small' value='закрыть' onclick=\"location.href='/cabinet/admin/'\">
										</form></div>";
									}								
								if (!isset($_GET['type_sort']))
									echo "<div style='margin-top:15px'><button class='primary small' onclick=\"location.href='?create'\">Работа с БД</button></div>";
								else echo "<div style='margin-top:15px'><button class='primary small' onclick=\"location.href='?create&type_sort=".$_GET['type_sort']."'\">Работа с БД</button></div>";
							
								echo "<div style='margin-top:1em;'>Всего записей: <b>".$total['COUNT(*)']."</b></div>";	
						
							}
								else {
										echo "<div style='margin-top:15px'><input type='button' class='button small' value='закрыть' onclick=\"location.href='/cabinet/admin/'\"></div>";
										echo "<table>
											<thead>
											<tr>
											<th colspan=2 style='text-align:center;'>1.Добавить запись в базу</th>
											<th style='text-align:center;'>2.Операции с файловой системой</th>
											</tr>
											</thead>
											<tbody>
											<tr colspan=3>";
										echo "\n";
							
										echo "<td>
											<span style='font-size:0.8em;'>1.1 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>ID<uppercase>*</uppercase><br></span>
											<input form='form' style='font-size:0.8em;' tabindex=1 name='id' id='id' size='4' maxlength='4' value='".($total['COUNT(*)']+1)."'><br>";
										echo "</td>\n";
										echo "<td>
											<span style='font-size:0.8em;'>1.2 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Папка для фото<uppercase>*</uppercase></span><br>
											<span style='font-size:0.8em;'>(лат.имя и существующая на сервере в /images/)<br></span>
											<input tabindex=2 form='form' style='font-size:0.8em;'  name='picf' id='picf' size='15' maxlength='75' value='"."'><br>";
										echo "</td>\n";
										echo "<td>
											<span style='font-size:0.8em;'>2.1 </span><span style='color:rgb(10,200,200);font-weight:bold;font-size:0.8em;'>Загрузить фото</span>
											<span style='font-size:0.8em;'>в /images/<b>каталог/имя файла</b> или <b>имя файла</b> (имя файла: <u>без расширения</u> формат: <u>только jpg</u> сущ.файл будет перезаписан)</span>
											<br>
											<span style='font-size:0.8em;'>Задать каталог и/или имя файла на сервере </span> 
											<input tabindex=9 form='fs_func_upload' style='font-size:0.8em;'  name='avaname' id='avaname' size='20' maxlength='75' value=''>
											<br>
											<input style='font-size:0.8em;' type='file' form='fs_func_upload' id='avafile'> 
											<input type='submit' class='primary small' form='fs_func_upload' value='Go'>
											<div id='result_upload_spinner'></div>
											<div id='result_upload'></div>";			
										echo "</td></tr>\n";
							
										//3
										echo "<tr colspan=3>
											<td>
											<span style='font-size:0.8em;'>1.3 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Описание игрушки<uppercase>*</uppercase></span>
											<br>
											<input tabindex=3 form='form' style='font-size:0.8em;' name='name' id='name' size='40' maxlength='75' value='"."'><br>";
										echo "</td>\n";
							
										echo "<td>
											<span style='font-size:0.8em;'>1.4 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Имя файла фото<uppercase>*</uppercase></span>
											<br>
											<span style='font-size:0.8em;'>(без расширения)<br></span>
											<input tabindex=4 form='form' style='font-size:0.8em;' name='picn' id='picn' size='10' maxlength='75' value='"."'><br>";
										echo "</td>\n";
										
										
										
										echo "<td>
											<span style='font-size:0.8em;'>2.2 </span><span style='color:rgb(10,200,200);font-weight:bold;font-size:0.8em;'>Создать папку</span>
											<span style='font-size:0.8em;'> в /images/ (имя лат.буквами)<br></span>
											<input tabindex=10 form='fs_func_mkdir' style='font-size:0.8em;' name='mkdir' id='mkdir' size='20' maxlength='75' value='"."'> 
											<input class='primary small' type=submit form='fs_func_mkdir' value='Go'><br>
											<div id='result_mkdir_spinner'></div>
											<div id='result_mkdir'></div>";
										
										echo "</td></tr>\n";
							
										//3
										echo "<tr colspan=3>
											<td>
											<span style='font-size:0.8em;'>1.5 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Высота<uppercase>*</uppercase></span>
											<span style='font-size:0.8em;'>(см)<br></span>
											<input tabindex=5 form='form' style='font-size:0.8em;' name='height' id='height' size='10' maxlength='50' value='"."'><br>";
										echo "</td>\n";
							
										echo "<td>
											<span style='font-size:0.8em;'>1.6 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Цена<uppercase>*</uppercase></span>
											<br>
											<input tabindex=6 form='form' style='font-size:0.8em;'  name='price' id='price' size='4' maxlength='10' value='"."'><br>";
										echo "</td>\n";
										
										//
										echo "<td>
											<form id='makepage' action='/myfunc/makepage.php' method='POST'>
											<span style='font-size:0.8em;'>2.3 </span><span style='color:rgb(10,200,200);font-weight:bold;font-size:0.8em;'>Создать папку</span> 
											<span style='font-size:0.8em;'>в /toys/ (имя лат.буквами)</span>
											<br>
											<input tabindex=13 style='font-size:0.8em;' name='pagename' id='pagename' value=''> 
											<input class='primary small' type='submit' value='Go'> 
											<div id='result_makepage'></div></form></td></tr>";
										
							
										//3
										echo "<tr colspan=3>
											<td>
											<span style='font-size:0.8em;'>1.7 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Тип<uppercase>*</uppercase></span>
											<br>
											<span style='font-size:0.8em;'>(текст русский и должен совпадать с уже имеющимися типами)<br></span>
											<input tabindex=7 form='form' style='font-size:0.8em;'  name='type' id='type' size='15' maxlength='75' value='"."'><br>";
										echo "</td>\n";
							
										echo "<td>
											<span style='font-size:0.8em;'>1.8 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Старая цена<uppercase>*</uppercase><br></span>
											<input tabindex=8 form='form' style='font-size:0.8em;' name='secret' id='secret' size='4' maxlength='10' value='"."'><br>";
										echo "<input type=hidden id='direct' name=direct value='Y'></td>\n";
							
										
										
										
										echo "<td>";
											if (isset($_GET['godmode'])) 
											echo "<span style='font-size:0.8em;'></span><span style='color:rgb(200,10,10);font-weight:bold;font-size:0.8em;'>(опасно) rmdir или unlink</span>
											<span style='font-size:0.8em;'> в папке /toys/<br></span>
											<input form='fs_func_rmdir_toys' style='font-size:0.8em;'  name='rmdir_toys' id='rmdir_toys' size='20' maxlength='75' value=''> 
											<input class='primary small' type=submit form='fs_func_rmdir_toys' value='Go'><br>
											<div id='result_rmdir_toys_spinner'></div>
											<div id='result_rmdir_toys'></div>";
										
										echo "</td></tr>\n";
							
							
										//3
										echo "<tr clospan=3>
											<td>
											<span style='font-size:0.8em;'>1.9 </span><span style='color:rgb(10,200,50);font-weight:bold;font-size:0.8em;'>Загрузить фото в</span> 
											<span style='font-size:0.8em;'>/images/
											<span style='color:rgb(10,200,50);'><i>Папка для фото<uppercase>*</uppercase></i>
											</span>/<span style='color:rgb(10,200,50);'><i>Имя файла фото<uppercase>*</uppercase></i></span><br></span>
											<span style='font-size:0.8em;'>(формат: <u>только jpg</u> сущ.файл будет перезаписан)</span><br>
											<input form='form' style='font-size:0.8em;' type='file' id='uploadfile'><br>";
										echo "</td>\n";
										echo "<td>
											<input form='form' class='primary small' type=submit value='Add'>
											<div id='message_form_base'></div>
											</td>";							
										
										//
										echo "<td>";
											
											if (isset($_GET['godmode']))
											echo "<span style='font-size:0.8em;'></span><span style='color:rgb(200,10,10);font-weight:bold;font-size:0.8em;'>(опасно) rmdir или unlink</span>
											<span style='font-size:0.8em;'> в папке /images/<br></span>
											<input form='fs_func_rmdir' style='font-size:0.8em;'  name='rmdir' id='rmdir' size='20' maxlength='75' value='"."'> 
											<input class='primary small' type=submit form='fs_func_rmdir' value='Go'><br>
											<div id='result_rmdir_spinner'></div>
											<div id='result_rmdir'></div>";
							
										echo "<td></tr></tbody>";
							
							
										echo "</table>";
							
										echo "<div style='display:none;'>
											<form name='fs_func_upload' enctype='multipart/form-data' action='/myfunc/upload.php' id='fs_func_upload'></form>
											<form name='fs_func_mkdir' enctype='multipart/form-data' action='/myfunc/mkdir.php' id='fs_func_mkdir'></form>
											<form name='fs_func_rmdir' enctype='multipart/form-data' action='/myfunc/rmdir.php' id='fs_func_rmdir'></form>
											<form name='fs_func_rmdir_toys' enctype='multipart/form-data' action='/myfunc/rmdir.php' id='fs_func_rmdir_toys'></form>
											<form id='form' action='' onsubmit='return writeMeSubmit(this);' ></form></div>";
								
										echo "<div style='margin-top:0.5em;'>Всего записей в базез: <b>".$total['COUNT(*)']."</b></div>";	
								}
								
								?>	
								
										<table>
											<thead>
												<tr>
											
													<th>Фото</th>
													<th>ID</th>
													<th>Описание</th>
													<th>Высота</th>
													<th>Папка</th>
													<th>Файл</th>
													<th>Цена</th>
													<th>Тип
													
					<?php 
							if (!isset($_GET['type_sort'])) {
							 
								if (isset($_GET['sort'])&&$_GET['sort']=="1")
									echo "<button class='button3' style='margin:5px;' onclick=\"location.href='/cabinet/admin/".( isset($_GET['create']) ? "?create#a" : "")."'\"><img style='width:33px;height:33px;' src='../stop.jpg' title='Отменить сортировку'></button>"; 
								else
									echo "<button class='button3' style='margin:5px;' onclick=\"location.href='?sort=1".( isset($_GET['create']) ? "&create#b" : "")."'\"><img style='width:33px;height:33px;' src='../sort.jpg' title='Применить сортировку'></button>";
						
							} else 
									{
										echo "<button class='button3' style='margin:5px;' onclick=\"location.href='/cabinet/admin/".( isset($_GET['create']) ? "?create#a" : "")."'\"><img style='width:33px;height:33px;' src='../stop.jpg' title='Отменить сортировку'></button>"; 
									}
					?>
					<?php 
													
							if (!isset($_GET['type_sort'])&&isset($_GET['sort'])) {
								echo "<a name=b></a><div style='font-size:1.0em;'><form method='get' action='' id='sort_form'>";
								echo "<select style='width:8rem;font-size:0.8em;' name='type_sort' id='type_sort'>";
									$result  =  mysqli_query( $base,  "SELECT DISTINCT type FROM toys" );
														
										while ( $row = mysqli_fetch_assoc($result) ) {
																
											echo "<option value='".$row['type']."'>".$row['type']."</option>";	
																
										}
									echo "</select><div style='margin-top:10px'></div>".( isset($_GET['create']) ? "<input type=hidden name='create' id='create' value=''>" : "")."<input type='submit' value='OK' class='primary small' />"."</form></div>";
							} else echo "<a name=a></a>";
														
					?>
																					
													</th>
													<th>Старая цена</th>
													
												</tr>
											</thead>
											<tbody>

	<?php
		
	
							if (isset($_GET['type_sort'])) {
		
								$result  =  mysqli_query( $base,  "SELECT * FROM toys WHERE type='".$_GET['type_sort']."' ORDER BY picn DESC");	
		
								if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
								else {

										$i=0;
										while ( $row = mysqli_fetch_assoc($result) )
										{
											echo "<tr>";
							//echo "<a name='z".$i++."'></a>";
											if (isset($_GET['edit'])&&$row['id']==$_GET['id']) {
								
												echo "<td style='vertical-align : middle;'><a name='z".$i."'></a><img width='85px' title='Фото игрушки' src='/images/".$row['picf']."/".$row['picn'].".jpg'>"."</td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>ID<br></span><input style='font-size:0.8em;' form='form' name='id' id='id' size='4' maxlength='4' value='".$row['id']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Имя<br></span><input style='font-size:0.8em;' form='form' name='name' id='name' size='30' maxlength='75' value='".$row['name']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Высота<br></span><input style='font-size:0.8em;' form='form' name='height' id='height' size='10' maxlength='75' value='".$row['height']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Папка<br></span><input style='font-size:0.8em;' form='form' name='picf' id='picf' size='10' maxlength='75' value='".$row['picf']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Файл<br></span><input style='font-size:0.8em;' form='form' name='picn' id='picn' size='10' maxlength='75' value='".$row['picn']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Цена<br></span><input style='font-size:0.8em;' form='form' name='price' id='price' size='4' maxlength='10' value='".$row['price']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Тип<br></span><input style='font-size:0.8em;' form='form' name='type' id='type' size='10' maxlength='75' value='".$row['type']."'></td>";
												echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Ст.цена<br></span><input style='font-size:0.8em;' form='form' name='secret' id='secret' size='4' maxlength='10' value='".$row['secret']."'></td>";
												echo "<td style='vertical-align : middle;'><form method='get' action='' id='form'><textarea name='old_id' id='old_id' style='display:none;'>".$row['id']."</textarea><textarea name='update' id='update' style='display:none;'>yes</textarea><textarea name='type_sort' id='type_sort' style='display:none;'>".$row['type']."</textarea><textarea name='z' id='z' style='display:none;'>".($i>4?$i-1:0)."</textarea><input type='submit' style='margin:5px;' class='primary small' value='да'> <input style='margin:5px;' type='button' value='нет' class='button small' onclick=\"location.href='/cabinet/admin/?type_sort=".$row['type']."#z".($i>4?$i-1:0)."'\"></form></td>";
								
											} 
											else {
													echo "<td style='vertical-align : middle;'><a name='z".$i."'></a><img width='85px' title='Фото игрушки' src='/images/".$row['picf']."/".$row['picn'].".jpg'>"."</td>";
													echo "<td style='vertical-align : middle;'>".$row['id']."</td>";
							
													echo "<td style='vertical-align : middle;'>".$row['name']."</td>";
													echo "<td style='vertical-align : middle;'>".$row['height']."</td>";
													echo "<td style='vertical-align : middle;'>".$row['picf']."</td>";
													echo "<td style='vertical-align : middle;'>".$row['picn']."</td>";
													echo "<td style='vertical-align : middle;'>".$row['price']."</td>";
													echo "<td style='vertical-align : middle;'>".$row['type']."</td>";
													echo "<td style='vertical-align : middle;'>".$row['secret']."</td>";
													echo "<td style='vertical-align : middle;'><button class='primary small' onclick=\"location.href='?edit=1&id=".$row['id']."&type_sort=".$row['type']."#z".($i>4?$i-1:0)."'\">изм</button>".(isset($_GET['godmode']) ? " &nbsp;<button class='primary small' onclick=\"location.href='?del=".$row['id']."&z=".($i>4?$i-1:0)."'\">удл</button>" : "")."</td>";
												}
							
													echo "</tr>";
													$i++;
										}
									}
	
	
							} else {
	
										$result  =  mysqli_query( $base,  "SELECT * FROM toys ORDER BY id ASC");	
		
										if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
										else {
												$i=0;
		
												while ( $row = mysqli_fetch_assoc($result) )
												{
													echo "<tr>";
													//echo "<a name='z".$i++."'></a>";
													if (isset($_GET['edit'])&&$row['id']==$_GET['id']) {
								
														echo "<td style='vertical-align : middle;'><a name='z".$i."'></a><img width='85px' title='Фото игрушки' src='/images/".$row['picf']."/".$row['picn'].".jpg'>"."</td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>ID<br></span><input style='font-size:0.8em;' form='form' name='id' id='id' size='4' maxlength='4' value='".$row['id']."'></td>";
							
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Имя<br></span><input style='font-size:0.8em;' form='form' name='name' id='name' size='25' maxlength='75' value='".$row['name']."'></td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Высота<br></span><input style='font-size:0.8em;' form='form' name='height' id='height' size='10' maxlength='75' value='".$row['height']."'></td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Папка<br></span><input style='font-size:0.8em;' form='form' name='picf' id='picf' size='10' maxlength='75' value='".$row['picf']."'></td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Файл<br></span><input style='font-size:0.8em;' form='form' name='picn' id='picn' size='10' maxlength='75' value='".$row['picn']."'></td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Цена<br></span><input style='font-size:0.8em;' form='form' name='price' id='price' size='4' maxlength='10' value='".$row['price']."'></td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Тип<br></span><input style='font-size:0.8em;' form='form' name='type' id='type' size='10' maxlength='75' value='".$row['type']."'></td>";
														echo "<td style='vertical-align : middle;'><span style='color:rgb(10,200,10);font-weight:bold;font-size:0.8em;'>Ст.цена<br></span><input style='font-size:0.8em;' form='form' name='secret' id='secret' size='4' maxlength='10' value='".$row['secret']."'></td>";
														echo "<td style='vertical-align : middle;'><form method='get' action='' id='form'><textarea name='old_id' id='old_id' style='display:none;'>".$row['id']."</textarea><textarea name='update' id='update' style='display:none;'>yes</textarea><textarea name='z' id='z' style='display:none;'>".($i>6?$i-1:0)."</textarea><input type='submit' style='margin:5px;' class='primary small' value='да'> <input type='button' value='нет' style='margin:5px;' class='button small' onclick=\"location.href='/cabinet/admin/#z".($i>6?$i-1:0)."'\"></form></td>";
								
													}	 
													else {
															echo "<td style='vertical-align : middle;'><a name='z".$i."'></a><img width='85px' title='Фото игрушки' src='/images/".$row['picf']."/".$row['picn'].".jpg'>"."</td>";
															echo "<td style='vertical-align : middle;'>".$row['id']."</td>";
							
															echo "<td style='vertical-align : middle;'>".$row['name']."</td>";
															echo "<td style='vertical-align : middle;'>".$row['height']."</td>";
															echo "<td style='vertical-align : middle;'>".$row['picf']."</td>";
															echo "<td style='vertical-align : middle;'>".$row['picn']."</td>";
															echo "<td style='vertical-align : middle;'>".$row['price']."</td>";
															echo "<td style='vertical-align : middle;'>".$row['type']."</td>";
															echo "<td style='vertical-align : middle;'>".$row['secret']."</td>";
															echo "<td style='vertical-align : middle;'><button class='primary small' style='margin:5px;' onclick=\"location.href='?edit=1&id=".$row['id']."#z".($i>6?$i-1:0)."'\">изм</button>".(isset($_GET['godmode'])? " &nbsp;<button class='primary small' style='margin:5px;' onclick=\"location.href='?del=".$row['id']."&z=".($i>6?$i-1:0)."'\">удл</button>" : "")."</td>";
														}
							
															echo "</tr>";
															$i++;
												}
										}
	
	
	
								}
?>
</tbody>											
<tfoot>																								
</tfoot>
</table>
</div>	
</div>
</div>
</div>
<?php 
/* Закрываем соединение */ 
mysqli_close($base);
?>			
</body>
</html>