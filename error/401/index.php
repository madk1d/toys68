<?php
header("HTTP/1.1 401 Unauthorized");
header("Status: 401 Unauthorized");
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<title>401: Неавторизовано</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Numans" type="text/css" />
<link rel="stylesheet" href="/assets/css/404.min.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
</head>
<body>
<div id="wrapper">
<div style="text-align:center;">Неавторизованный доступ!</div>
<div style="text-align:center;margin-top:1em;"><a href="http://toys68.ru" class="c">Вернуться на главную</a></div>
<div id="error">
<img class="err" src="/images/404.jpg" alt="401: Unauthorized" />
</div> 
</div>
</body>
</html>