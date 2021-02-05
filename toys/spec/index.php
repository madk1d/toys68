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
<meta name="description" content="Есть свои идеи подарка? Здесь можно заказать мягкие игрушки по своему дизайну. Мы с радостью рассмотрим ваш вариант и обсудим все подробности." />
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
<link rel="canonical" href="http://toys68.ru/toys/spec/"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />         
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="icon" sizes="192x192" href="/favicon-192.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta property="og:title" content="Игрушки ручной работы по вашему дизайну и только для Вас!" />
<meta property="og:description" content="Эксклюзивные подарки с доставкой" />
<meta property="og:image" content="http://toys68.ru/spec.jpg" />
<meta property="og:type" content="website" />
<meta property="og:url" content= "http://toys68.ru/toys/spec/" />
<meta name="google-site-verification" content="IjQOIaDPGTEqnrU6b6wZy6RIi2c4ixysxX7xkQvN5UM" />
<meta name="yandex-verification" content="1b5b715c9639178c" />
<meta name='wmail-verification' content='a3bc192d56c3720af4ffb068ca10260e' />
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<title>Мастерская TOYS68 | Индивидуальный дизайн</title>
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
						<!--noindex--><a href="/toys/">Игрушки</a> <i class="fa fa-arrow-right" aria-hidden="true"></i> Индивидуальный дизайн<!--/noindex-->
						</div>
							<h1>Игрушки по индивидуальному дизайну</h1>
							<div style="margin-top:3em;"></div>
							<div class="box alt">
							<div class="row gtr-uniform aln-center">
							<p><img style="float:left;margin:0px 10px 10px 0px;" width="80" src="/images/spec.png" alt="Дизайн" />Если вы не нашли необходимые игрушки или у вас есть свои идеи подарка - напишите нам! 
							В кратчайшее время мы рассмотрим ваши пожелания, уточним все подробности и дадим ответ. 
							Например, можем изготовить как отдельную игрушку, так и подарочные корзинки, которые будут собраны индивидуально. Пишите, звоните нам и мы поможем воплотить в жизнь любое ваше пожелание. Это не будет дорого - это будет доступно.</p>					
							
							<?php
							$div_class="col-6";
							echo '<div class="'.$div_class.'"><span class="image fit" style="text-align:center;font-size:0.8em;"><a href="/images/spec_muglu.jpg" data-imagelightbox="b"><img src="/images/spec_muglu.jpg" alt="Муглу"></a>Пример: игрушка "Муглу" по фото от заказчика</span></div>';
							echo '<div class="'.$div_class.'"><span class="image fit" style="text-align:center;font-size:0.8em;"><a href="/images/spec_basket.jpg" data-imagelightbox="b"><img src="/images/spec_basket.jpg" alt="Корзинка для новорожденного"></a>Пример: подарочная корзинка для новорожденного</span></div>';
							?>
							</div></div>
							<div style="margin-top:3em;"></div>
							<hr>
								<div style="text-align:center;"><h2>Напишите нам</h2></div>
								<div class="box alt">	
			<div class="row gtr-uniform aln-center">
			<div class="col-8">
								<form id="mailform" name="mailform" enctype="multipart/form-data" action="/send.php">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Имя" required maxlength="50">
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" required maxlength="50">
										</div>
										<div class="field">
											<textarea name="message" id="message" placeholder="Сообщение" required maxlength="1000"></textarea>
											<div id="charscount" style="font-size:0.63em;"></div>
											<div style="margin-top:1em;margin-bottom:0.9em;"><span style="font-size:0.85em;">Прикрепить файл<br></span>
											<input style='font-size:0.7em;' type='file' name='uploadfile' id='uploadfile'>
											<div style="margin-top:-0.5em;"><span style='font-size:0.7em;'>(размер не более 10 Мб)</span></div>
											</div>
										<div style="transform:scale(0.8); transform-origin:0;"  class="g-recaptcha" data-sitekey="6LfZZE0UAAAAAK69WLEJybfhFnbTE7bHm1wBXOr6"></div>	
										<div id="mail_error" class="mail_error"></div>
										<div id="cap_error" class="mail_error"></div>
										<div id="file_error" class="mail_error"></div>
										<div id="mail_success" class="mail_success"></div>
										</div>
										<div style="margin-top:-1.2em;"></div>
									<div class="field" style="text-align:center;"><input type="submit" value="Отправить" class="primary" /></div>
										</div>
									
								</form>
							</div></div></div>
							<div style="margin-top:3em;"><br></div>
						</div>
					</div>
					<footer id="footer">
						<div class="inner">
						<?php include('../../inc/write.php');?>
							<?php include('../../inc/contacts.php');?>
							<ul class="copyright">
								<li>&copy; Мастерская TOYS68, 2017-<?php echo date("Y");?></li>
								<li><a href="/policy/">Политика обработки персональных данных</a></li>
							</ul>
						</div>
					</footer>
			</div>
						<?php include('../../inc/script.php');?>
			<?php include('../../inc/all_footer.php');?>
	</body>
</html>