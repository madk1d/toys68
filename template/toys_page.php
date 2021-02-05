<?php 
$type=basename(__DIR__);

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
$result  =  mysqli_query( $base,  "SELECT type FROM toys WHERE picf='".$type."' LIMIT 0,1");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta name="language" content="ru" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
<meta name="description" content="Готовые варианты дизайна игрушек из серии &laquo;<?php echo $row['type'];?>&raquo;. 100% handmade из плюшевой пряжи высокого качества." />
<meta name="author" content="TOYS68.RU">
<meta name="organization" content="TOYS68.RU">
<meta name="copyright" content="2017-<?php echo date("Y");?> (с) TOYS68.RU">
<meta name="msapplication-config" content="/browserconfig.xml">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<link rel="canonical" href="http://toys68.ru<?php echo "/toys/$type/";?>"/>
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
<meta property="og:title" content="Мастерская игрушек ручной работы | <?php echo $row['type'];?>" />
<meta property="og:description" content="Эксклюзивные подарки с доставкой" />
<meta property="og:image" content="http://toys68.ru/opengraph.jpg" />
<meta property="og:type" content="website" />
<meta property="og:url" content= "http://toys68.ru" />
<meta name="google-site-verification" content="IjQOIaDPGTEqnrU6b6wZy6RIi2c4ixysxX7xkQvN5UM" />
<meta name="yandex-verification" content="1b5b715c9639178c" />
<meta name='wmail-verification' content='a3bc192d56c3720af4ffb068ca10260e' />
<title>Мастерская TOYS68 | Игрушки из серии &laquo;<?php echo $row['type'];?>&raquo;</title>
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
								echo '<li><a href="/cart/"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Корзина заказов ('.$num_order.')</a></li>';
								} else echo '<li><a href="/cart/"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Корзина заказов</a></li>';
									?>
						</ul>
					</nav>
					<div id="main">
						<div class="inner">
							<div class="toys_nav"><i class="fa fa-folder-open" aria-hidden="true"></i>
						<!--noindex--><a href="/toys/">Игрушки</a> <i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $row['type'];?>
						</div>
							<h1><?php echo $row['type'];?></h1>
							<p>
							Готовые варианты дизайна.<br>
							На каждую игрушку можно нанести имя, а так же приложить поздравительное сообщение.
							</p><!--/noindex-->
							<blockquote>При обсуждении заказа вы можете выбрать цвет пряжи, уточнить детали дизайна.</blockquote>
							<div class="box alt">
										<div class="row gtr-uniform">
<?php include('../../inc/toys_db.php');?>	
										</div>							
							</div>	
<?php include('../../inc/print_page.php');?>
	<div style="margin-top:3em;"></div>
					</div>
					</div>
					<footer id="footer">
						<div class="inner">
						<?php include('../../inc/write.php');?>
							<?php include('../../inc/contacts.php');?>
							<ul class="copyright">
								<li>&copy; Мастерская TOYS68, 2017-<?php echo date("Y");?></li>
							</ul>
						</div>
					</footer>
			</div>
			
			<?php include('../../inc/script.php');?>
			<?php include('../../inc/all_footer.php');?>
	</body>
</html>