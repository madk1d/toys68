<?php
function SiteVerify($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36");
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 
	if (isset($_POST['captcha'])) $recaptcha=$_POST['captcha']; else $recaptcha="";
	
	//$recaptcha="";
    
	/*if(!empty($recaptcha))
    {*/
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LfZZE0UAAAAABnihZQU4TgG8HCk28KvvbYO_eLT';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        $res=SiteVerify($url);
        $res= json_decode($res, true);
		//echo $res['success'];
        if($res['success'])
					{
			
						$user_name = $_POST['name'];
						$user_email = $_POST['email'];
						$to='torya68@mail.ru';
						$message="<!DOCTYPE HTML><html lang='ru'>".
						"<head><meta charset='utf-8'>".
						"<meta name='language' content='ru' />".
						"<title>Сообщение</title>".
						"</head>".
						"<body><p style='font-size:14pt;'>";
						
						$message.= nl2br(strip_tags($_POST['message']));
						$message.="</p></body></html>";
			//$message=wordwrap($message, 70, "\r\n");
					
						$user_name = "=?UTF-8?B?".base64_encode($user_name)."?=";
						$subject = "=?UTF-8?B?".base64_encode("Сообщение с сайта toys68.ru")."?=";
			
						$boundary = "--".md5(uniqid(time())); 
			
						$mailheaders = "MIME-Version: 1.0;\r\n". 
							"Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n".
							"From: ".$user_name." <noreply@toys68.ru>\r\n". 
							"Reply-To: ".$user_name." <".$user_email.">\r\n"; 


						$multipart = "--".$boundary."\r\n". 
						"Content-Type: text/html; charset=utf-8\r\n".
						"Content-Transfer-Encoding: base64\r\n".    
						"\r\n";

						$multipart .= chunk_split(base64_encode($message));
// первая часть само сообщение
 


				if (!empty($_FILES['uploadfile']['tmp_name'])) { 
	
													$filepath = 'upload/'.iconv("utf-8", "windows-1251", $_FILES['uploadfile']['name']); 
	
													if (copy($_FILES['uploadfile']['tmp_name'], $filepath)){ 
		
													$filename = iconv("utf-8", "windows-1251", $_FILES['uploadfile']['name']);
		
													$fp = fopen($filepath,"r"); 
															if (!$fp) 
																		{ 
																			$response_array['status'] = 'srv_error'; 
																			die(json_encode($response_array)); 
																		} 
													$file = fread($fp, filesize($filepath)); 
													fclose($fp); 

					$message_part = "\r\n--".$boundary."\r\n". 
				"Content-Type: application/octet-stream; name=\"".$filename."\"\r\n".
				"Content-Transfer-Encoding: base64\r\n". 
				"Content-Disposition: attachment; filename=\"".$filename."\"\r\n".
				"\r\n";
			$message_part .= chunk_split(base64_encode($file));
			$message_part .= "\r\n--".$boundary."--\r\n";
			// второй частью прикрепляем файл, можно прикрепить два и более файла

		$multipart .= $message_part;

		if (mail($to,$subject,$multipart,$mailheaders))
			{
				if (time_nanosleep(5, 0)) {
					unlink($filepath);
					}
				$response_array['status'] = 'success'; 
				die(json_encode($response_array)); 
	
			} else {
	
					$response_array['status'] = 'srv_error'; 
					die(json_encode($response_array)); 
				}
	
	}

		} else {
	
		if (mail($to,$subject,$multipart,$mailheaders))
			{
			$response_array['status'] = 'success'; 
			die(json_encode($response_array)); 
	
			} else {
	
				$response_array['status'] = 'srv_error'; 
				die(json_encode($response_array)); 
				}
		} 
 



        }
		//cap
			
		
   /*} */else  {
						$response_array['status'] = 'robot'; 
						die(json_encode($response_array));
					}

}		
?>