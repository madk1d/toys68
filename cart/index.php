<?php 

	if (!empty($_COOKIE['id'])) 
{	
$id = explode(":", $_COOKIE['id']);
} else $id=0;
			
	if (isset($_GET['del'])&&!empty($_COOKIE['id']))
	
	{
		unset($id[$_GET['del']]);
		sort($id);
		$str="";
		for ($j=0;$j<count($id);$j++)
		{
			if ($j==count($id)-1) $str.=$id[$j]; else
			$str.=$id[$j].':';
	
		
		}
		
		setcookie("id", "", time()-60*60*60,"/");
		setcookie("id", $str, time()+60*60,"/");
		header("Location: /cart");	
	}
	
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
  
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta name="language" content="ru" />
<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow">
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
<meta name="description" content="" />
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
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />         
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="icon" sizes="192x192" href="/favicon-192.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<title>Мастерская TOYS68 | Корзина</title>
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
						
							<div style="font-size:3em;margin-bottom:1em;"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
<?php							

if ($id) {

			echo "<textarea name='counter' form='cart_form' style='display:none;'>".count($id)."</textarea>\n";
			echo "<table><thead><tr><th width='14%'>Фото</th><th width='36%'>Описание</th><th width='20%'>Цена</th><th width='20%'>Количество</th><th width='10%'></th></tr></thead><tbody>";

			for ($i=0;$i<count($id);$i++)
			{		
				$result  =  mysqli_query( $base,  "SELECT * FROM toys WHERE id='".$id[$i]."'");
				if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
				else {
						$row = mysqli_fetch_assoc($result);								
					 }			
				echo "<tr>";
				echo "<td style='vertical-align:middle;'><textarea name='id$i' form='cart_form' style='display:none;'>".$row['id']."</textarea>\n<img src='/images/".$row['picf']."/".$row['picn'].".jpg' width='150'></td>
				<td style='vertical-align:middle;'>".$row['name'].", <span style='font-size:0.8em;'>".$row['height']."см</span></td>
				<td style='vertical-align:middle;'><textarea form='cart_form' name='price$i'  style='display:none;'>".$row['price']."</textarea>".$row['price']." &#8381;</td>
				<td style='vertical-align:middle;'><select style='width:5.5em;' form='cart_form' name='col$i'><option value='1'>1 шт.</option><option value='2'>2 шт.</option><option value='3'>3 шт.</option></select></td>
				<td style='vertical-align:middle;text-align:center;'><a class='icon' href='?del=".$i."'><i style='font-size:2em;' class='fa fa-trash-o' aria-hidden='true'></i></a></td>\n";
				echo "</tr>";		
			}
	echo "</tbody><tfoot>	<tr>
		
		<td colspan='5'><strong>Итого:</strong>&nbsp;&nbsp;<span id='sum'></span> &#8381;<br><span style='font-size:0.7em;'>без учета стоимости доставки</span></td>	
		</tr>		
		</tfoot></table>	
			<div class='row aln-center'>			
			<form method='post' action='order.php' id='cart_form'>
					<div style='width:270px;text-align:center;'>
					<label>Имя</label><input type='text' name='name' id='name' placeholder='Введите ваше имя' required maxlength=50>
					</div>
					<div style='width:270px;margin-top:1em;text-align:center;'>
					<label>Email</label><input type='email' name='email' id='email' placeholder='Введите ваш email' required maxlength=50>
					</div>
					<div style='width:270px;margin-top:1em;text-align:center;'>
					<label>Телефон</label><input type='tel' name='phone' required id='phone' maxlength=12 pattern='(\+?\d[- .]*){7,13}' placeholder='+79991234567'>
					</div>
					<div style='width:270px;margin-top:1em;text-align:center;'>
					<label>Доставка</label>
					<select name='delivery' id='delivery'>
					<option value='Нужна'>Нужна</option>
					<option value='Не нужна'>Не нужна</option>	
					</select>
					</div>		
					<div id='mail_error' class='mail_error' style='text-align:center;margin-top:1em;margin-bottom:1em;'></div>				
					<div style='text-align:center;width:270px;margin-top:1em;'><input type='submit' value='Заказать' class='primary' /></div>
					</form></div>";
}	else {echo "Ваша корзина пуста<div style='margin-top:15em;'></div><br/><br/><br/><br/><br/>";}
	?>
	
	</div> <div style="margin-top:3em;"></div>
					</div>
						<footer id="footer">
						<div class="inner">	
						<?php include('../inc/write.php');?>
							<?php include('../inc/contacts.php');?>
							<ul class="copyright">
								<li>&copy; Мастерская TOYS68, 2017-<?php echo date("Y");?></li>
								<li><a href="/policy/">Политика обработки персональных данных</a></li>
							</ul>
						</div>
					</footer>	
			</div>
			<?php include('../inc/script.php');?>
					<script>
			$("select" ).change(function () {
			$.fn.serializeObject = function() {
				var o = {};
				var a = this.serializeArray();
				$.each(a, function() {
					if (o[this.name] !== undefined) {
					if (!o[this.name].push) {
						o[this.name] = [o[this.name]];
						}
						o[this.name].push(this.value || '');
					} else {
							o[this.name] = this.value || '';
							}
				});
			return o;
			};
	var values = $("#cart_form").serializeObject(); 
	var i,sum=0; 
for (i = 0; i < values['counter']; i++) {
  if (values['price'+i])
  sum=sum+values['price'+i]*values['col'+i];
}
$('#sum').html(sum);	 
	  })
					
    $.fn.serializeObject = function()
{
 var o = {};
 var a = this.serializeArray();
 $.each(a, function() {
     if (o[this.name] !== undefined) {
         if (!o[this.name].push) {
             o[this.name] = [o[this.name]];
         }
         o[this.name].push(this.value || '');
     } else {
         o[this.name] = this.value || '';
     }
 });
 return o;
};
var values = $("#cart_form").serializeObject();
var i,sum=0;
for (i = 0; i < values['counter']; i++) {
  if (values['price'+i])
  sum=sum+values['price'+i]*values['col'+i];
}
$('#sum').html(sum);
</script>
			<?php include('../inc/all_footer.php');?>
	</body>
</html>