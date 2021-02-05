<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
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
										$response_array['status'] = 'srv_err'; 
										die(json_encode($response_array));
									}
		
		$user_name = $_POST['name'];
						$user_email = $_POST['email'];
						$to='torya68@mail.ru';
						$message="<!DOCTYPE HTML><html lang='ru'>".
						"<head><meta charset='utf-8'>".
						"<meta name='language' content='ru' />".
						"<title>Сообщение</title>".
						"<style>body{font-size:10pt;}</style></head>".
						"<body>";
			
			$frac		= explode('.',sprintf('%.4f',microtime()));
			$id			= date("m").$frac[1];
			$date_today = date("d.m.y"); 
			$time 		= date("H:i:s"); 	
		
		$message.=  "<p style='font-weight:bold;'>Заказ № ".$id." на сайте <a href='http://toys68.ru'>toys68.ru</a></p>".
						"<p style='font-size:8pt;'>Дата заказа: ".$date_today."</p>".
						"<p style='font-size:8pt;'>Время заказа: ".$time." (Москва, UTC+3)</p>".
					"<p>Имя заказчика: ".$_POST['name']."</p>".
					"<p>Email: <a href='mailto:".$_POST['email']."'>".$_POST['email']."</a></p>".
					"<p>Телефон: ".$_POST['phone']."</p>".
					"<p>Доставка: ".$_POST['delivery']."</p>".
					"<br><br><hr><p style='text-align:center;'>Детали заказа</p><hr><br><br><table width='100%' border='0' cellpadding='5'><thead><tr><th align=center>Фото</th><th align=center>Описание</th><th align=center>Цена</th><th align=center>Кол-во</th></tr></thead><tbody>";
			
		$sum=0;
		for ($t=0;$t<$_POST['counter'];$t++)
		{
		
			$result  =  mysqli_query( $base,  "SELECT * FROM toys WHERE id='".$_POST['id'.$t]."'");
			$row = mysqli_fetch_assoc($result);	
											
			$message.="<tr><td style='veartical-allign:middle;text-align:center;' width='150px'><img width='150' height='112' src='http://toys68.ru/images/".$row['picf']."/".$row['picn'].".jpg'></td>".
					"<td style='veartical-allign:middle;text-align:center;'>".$row['name']."</td>".
					"<td style='veartical-allign:middle;text-align:center;'>".$row['price']." руб.</td>".
					"<td style='veartical-allign:middle;text-align:center;'>".$_POST['col'.$t]." шт.</td></tr>";
					$sum+=$row['price']*$_POST['col'.$t];					
			
		}
			
			$message.="</tbody></table><hr><p><b>Сумма</b> <span style='font-size:8pt;'>(без учета стоимости доставки)</span>: $sum руб.</p><br><br><p style='color:#1E90FF;'><i>Это письмо создано автоматически, пожалуйста, не отвечайте на него!</i></p></body></html>";
			
			$subject = "=?UTF-8?B?".base64_encode("Заказ № ".$id)."?=";
			$user_name = "=?UTF-8?B?".base64_encode($user_name)."?=";
						
						$boundary = "--".md5(uniqid(time())); 
						$mailheaders = "MIME-Version: 1.0;\r\n". 
							"Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n".
							"From: ".$user_name." <order@toys68.ru>\r\n". 
							"Reply-To: ".$user_name." <".$user_email.">\r\n"; 

						$multipart = "--".$boundary."\r\n". 
						"Content-Type: text/html; charset=utf-8\r\n".
						"Content-Transfer-Encoding: base64\r\n".    
						"\r\n";

						$multipart .= chunk_split(base64_encode($message));
						
						$response_array['status']='';
			   
							if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $user_email)){		 
									$response_array['status'] = 'error'; 
									
									mysqli_close($base);
									die(json_encode($response_array));
									
								} else {
											
					for ($t=0;$t<$_POST['counter'];$t++)
		{
		$result  =  mysqli_query( $base,  "SELECT * FROM toys WHERE id='".$_POST['id'.$t]."'");
			$row = mysqli_fetch_assoc($result);	
		$query = "INSERT INTO orders (name, email,date,item_n,picn,picf,item_p,num,id,status) VALUE ('".$_POST['name']."','".$_POST['email']."','".$date_today."','".$row['name']."','".$row['picn']."','".$row['picf']."','".$row['price']."','".$_POST['col'.$t]."','".$id."','"."В процессе'".")";
		mysqli_query($base, $query);
		}
					
					mail($to,$subject,$multipart,$mailheaders);
					$to=$user_email;
					$mailheaders = "MIME-Version: 1.0;\r\n". 
							"Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n".
							"From: TOYS68 <order@toys68.ru>\r\n". 
							"Reply-To: noreply <order@toys68.ru>\r\n"; 

					mail($to,$subject,$multipart,$mailheaders);
																		
													$response_array['status'] = 'success';
													mysqli_close($base);
													setcookie("id","",time()-60*60*60,"/");
													die(json_encode($response_array));
												
												} 			
										}
            	
		
?>