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
   die; 
} 
if (isset($_GET['id'])) 
{	
	$result  =  mysqli_query( $base,  "SELECT * FROM toys WHERE id='".$_GET['id']."'");
			if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
				else {
						$row = mysqli_fetch_assoc($result);					
							if ($row['name']=='' || $row['picf']=='')	{
									header("HTTP/1.1 404 Not Found");
									header("Status: 404 Not Found");
									die;
								}
					}

} else 	{
	//header("Location: /notfound");
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
	die;
	}
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta name="language" content="ru" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<?php
$cssfilename = '/var/www/u0482891/data/www/toys68.ru/assets/css/main.css';
if (file_exists($cssfilename)) {
    $cssver=date("mdY", filectime($cssfilename));
}
?>
<link rel="stylesheet" href="/assets/css/main.css<?php echo "?$cssver";?>">
<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="language" content="ru">
<meta name="description" content="Эксклюзивный подарок из материалов высокого качества. 100% handmade по доступной цене." />
<meta name="author" content="TOYS68.RU">
<meta name="organization" content="TOYS68.RU">
<meta name="copyright" content="2017-<?php echo date("Y");?> (с) TOYS68.RU">
<meta name="msapplication-config" content="/browserconfig.xml">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="167x167" href="/apple-touch-icon-167x167.png">
<link rel="canonical" href="http://toys68.ru<?php echo "/order/".$_GET['id']."/";?>"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />         
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="icon" sizes="192x192" href="/favicon-192.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta property="og:title" content="<?php echo $row['name'].", ".$row['height']."см - ".$row['price']." руб.";?>" />
<meta property="og:description" content="Эксклюзивные подарки с доставкой" />
<meta property="og:image" content="http://toys68.ru/images/<?php echo $row['picf']."/".$row['picn'].".jpg";?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content= "http://toys68.ru" />
<title>Мастерская TOYS68 | <?php echo $row['name'];?></title>
<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>						
	</head>
	<body class="is-preload">
			<div id="wrapper">
					<header id="header">
	<?php 
							date_default_timezone_set('Europe/Moscow');
							$d_getdate=getdate();
							if ($d_getdate['mon'] == 12 || $d_getdate['mon'] == 1) 
							{
								echo '<img class="img_ny2" src="/images/ny2.png" alt="Новый год"><img class="img_hm1" src="/images/hm.png" alt="Сделано с любовью"><img class="img_hm2" src="/images/hm1.png" alt="100% handmade"><img class="img_ny1" src="/images/ny1.png" alt="Новый год">';
								//echo '<script>sitePath = "/images/";sflakesMax = 35;sflakesMaxActive = 35;svMaxX = 3;svMaxY = 2;ssnowStick = 1;sfollowMouse = 1;</script>';
								//echo "<script src='/assets/js/snow.js'></script>";
							}
							else {
								echo '<img class="img_hm1" src="/images/hm.png" alt="Сделано с любовью"><img class="img_hm2" src="/images/hm1.png" alt="100% handmade">';
							}
	?>
						<div class="inner">
								<a href="/" class="logo">
									<span class="symbol"><img src="/logo.png" alt="Логотип" /></span><span>Мастерская TOYS68</span>
								</a>
								<nav>
									<ul>
										<li><a href="#menu">Меню</a></li>
									</ul>
								</nav>
						</div>
					</header>
					<nav id="menu">
						<h2>Меню</h2>
						<ul>
							<li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Главная</a></li>
							<li><a href="/toys/"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;Каталог игрушек</a></li>
							<li><a href="/stock/"><i class="fa fa-percent" aria-hidden="true"></i>&nbsp;&nbsp;Акции</a></li>
							<li><a href="/about/"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;О нас</a></li>
							<li><a href="/buy/"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;&nbsp;Оплата и доставка</a></li>	
							<?php
							if (isset($_COOKIE['id'])) 
								{
								$id_order = explode(":", $_COOKIE['id']);
								$num_order=count($id_order);
								echo '<li><a href="/cart/"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Корзина заказов (<span id="toyscol">'.$num_order.'</span>)</a></li>';
								} else echo '<li><a href="/cart/"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Корзина заказов <span id="toyscol"></span></a></li>';
									?>
						</ul>
					</nav>
					<div id="main">
						<div class="inner">
						<div class="toys_nav"><i class="fa fa-folder-open" aria-hidden="true"></i> 
						<!--noindex--><a href="/toys/">Игрушки</a> <i class="fa fa-arrow-right" aria-hidden="true"></i> <a href='<?php echo "http://toys68.ru/toys/".$row['picf']."/";?>'><?php echo $row['type'];?></a> <i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $row['name'];?><!--/noindex-->
						</div>
							<h1><?php echo $row['name'];?></h1>
							<p style="margin-top:2.5em;">У нас вы можете заказать мягкую игрушку <strong>"<?php echo $row['name'];?>"</strong> из плюшевой пряжи высокого качества. 
							<!--noindex-->На стадии обсуждения заказа можно выбрать цвет пряжи, дополнить готовый дизайн своими пожеланиями. 
							В итоге игрушка получается эксклюзивной для каждого заказчика! 
							 На ваш email поступит письмо-подтверждение оформленного заказа, и мы свяжемся с вами для его обсуждения.<!--/noindex--></p>							 
								<div class="box alt">
										<div class="row gtr-uniform">	
							<?php
							$div_class="col-6";
							echo "<div class='".$div_class."'><span class='image fit' style='text-align:center'><a href='/images/".$row['picf']."/".$row['picn'].".jpg"."' data-imagelightbox='b'><img alt='".$row['name']."' src='/images/".$row['picf']."/".$row['picn'].".jpg"."'></a><span style='font-size:0.7em;'><i class='fa fa-arrows-alt' aria-hidden='true'></i> <!--noindex-->нажмите на фото, чтобы увеличить его<!--/noindex--></span></span></div> ";
							?>
							<div class="<?php echo $div_class;?>" style="font-size:0.8em;">
							<strong>Высота:</strong> <?php echo $row['height'];?>см.<br/>
							<!--noindex--><strong>Цвет:</strong> на выбор.<br/>
							<strong>Детали дизайна:</strong> индивидуальные.<br/>
							<strong>Наполнитель:</strong> гипоаллергенный.<br/>
							<strong>Уход:</strong> бережная стирка.<!--/noindex-->
							<div style='margin-top:10px'></div><div style="font-size:1.3em;width:280px;"><span style="background-color: RGB(249, 201, 16);padding:8px;border:5px;border-radius:5px;">Цена: <?php echo $row['price'];?> &#8381;</span><!--noindex--><span style="font-size:0.6em;"><br/>без учета стоимости доставки</span><br><span style="font-size:0.7em;">Наш менеджер свяжется с вами по email для уточнения деталей заказа, а также сообщит стоимость доставки.</span><!--/noindex-->	
							</div>
							<form method="post" action="/order/add.php" id="order_form">
										<textarea name="id" style="display:none;"><?php echo $row['id'];?></textarea>										
									<input type="submit" value="Добавить в корзину" class="primary" />
								<div id="mail_error" class="mail_error" style="text-align:left;margin-top:1em;font-size:1.1em;"></div>
								</form>
							</div>
							</div>
							</div>						
						<div style="margin-top:5em;"></div>	
					</div>
					</div>
						<footer id="footer">
						<div class="inner">	
						<?php include('../inc/write.php');?>
							<?php include('../inc/contacts.php');?>
							<ul class="copyright">
								<li>&copy; Мастерская TOYS68, 2017-<?php echo date("Y");?></li>
							</ul>
						</div>
					</footer>	
			</div>
			<?php include('../inc/script.php');?>
			<?php include('../inc/all_footer.php');?>
	</body>
</html>