<?php 
 

							$query = "SELECT * FROM toys WHERE picf='".$type."' ORDER BY id ";
							$result  =  mysqli_query( $base,$query);
									if ( !$result ) {echo "Произошла ошибка: "  .  mysqli_error(); exit();}
										else {
												
												$div_class1="col-6";
												$div_class2="col-4";													
													
													$counter=1;
													while ( $row = mysqli_fetch_assoc($result) ){
																			
													
echo "<div style='margin-top:2em;'></div>\n";
echo "<h1>".$row['name']."</h1>";
echo "<span style='font-size:0.7em;background-color: rgba(255, 105, 180,0.8);padding:8px;'><b>Есть в наличии</b></span>";
echo "<div class='box alt'>\n";
echo "<div class='row gtr-uniform'>\n";			
echo "<div class='".$div_class1."'><span class='image fit' style='text-align:center'><a href='/images/".$row['picf']."/".$row['picn'].".jpg' data-imagelightbox='b'>\n".
"<img class='fit' src='/images/".$row['picf']."/".$row['picn'].".jpg' alt='".$row['name']."'></a><span style='font-size:0.7em;'><i class='fa fa-arrows-alt' aria-hidden='true'></i> <!--noindex-->нажмите на фото, чтобы увеличить его<!--/noindex--></span></span></div>\n";						

echo "<div class='".$div_class1."' style='font-size:0.8em;'>\n";
echo "<strong>высота:</strong> ".$row['height']."см<br>\n";
echo "<strong>наполнитель:</strong> гипоаллергенный<br>\n";
echo "<strong>уход:</strong> бережная стирка<br>\n";
echo "<div style='margin-top:10px'></div><div style='font-size:1.3em;'>
	<span style='background-color: RGB(249, 201, 16);padding:8px;border:5px;border-radius:5px;'>Цена: 
	<span style='text-decoration:line-through;'>".$row['secret']."</span> ".$row['price']." <b>&#8381;</b></span>
	<!--noindex--><span style='font-size:0.6em;'><br>без учета стоимости доставки</span><br><span style='font-size:0.7em;'>Наш менеджер свяжется с вами по email<br>для уточнения деталей заказа, а также<br>сообщит стоимость доставки.</span><!--/noindex--></div>\n";
echo "\n";
			
echo "<script>
$(function(){
$('#mail_form$counter').submit(function(e){
e.preventDefault();
var m_method=$(this).attr('method');
var m_action=$(this).attr('action');
var m_data=$(this).serialize();
$.ajax({
type: m_method,
url: m_action,
data: m_data,
success: function(result){
var response=JSON.parse(result);
if (response.status=='success') 
{
$('#add2cart').bPopup({
autoClose: 2000
});
}
if(response.status=='exist')
{
$('#mail_error$counter').html('Уже есть в вашей корзине').hide().fadeIn(1000, function() {
                        $('.message').append('');
                        }).delay(5000).fadeOut('fast');
} 
} 
});
});
});
</script>";
			
echo "<form method='post' action='/order/add.php' id='mail_form".$counter."'>\n";
echo "<textarea name='id' style='display:none;'>".$row['id']."</textarea>\n";
echo "<input type='submit' value='Добавить в корзину' class='primary' />
<div id='mail_error$counter' class='mail_error' style='text-align:left;margin-top:1em;font-size:1.1em;'></div>\n";
echo "</form>\n</div></div></div>";																									
		
	
	}
}
//mysqli_close($base);
?>	
							