$(function(){
$('#mailform').on('submit',function(e){	
e.preventDefault();
var formData = new FormData(document.forms.mailform);
var captcha=grecaptcha.getResponse();
var filesize=0;
var pattern=new RegExp(/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i);
if (document.getElementById("uploadfile").files.length) filesize=document.getElementById("uploadfile").files[0].size;
if(captcha && pattern.test($('input[name="email"]').val()) && filesize<=10485760 ){
$('#mail_success').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> Сообщение отправляется, пожалуйста, подождите</span>");
jQuery.each($('#uploadfile')[0].files,function(i,file){formData.append('uploadfile',file);});
formData.append('captcha',captcha);
$.ajax({
url: '/send.php',
type: 'POST',
//dataType : "json", 
method: 'POST',
cache: false,
contentType: false,
processData: false,
data: formData,
success:function(result){
var response=JSON.parse(result);
$('#mail_success').html("");
if(response.status=='success'){
$('#mailsend').bPopup({autoClose:5000});
yaCounter46186368.reachGoal('MES');
$("#mailform").trigger("reset");
$('#charscount').html("");
grecaptcha.reset();
}
if(response.status=='error'){
$('#mail_error').html("Ошибка при отправке").hide().fadeIn(1000,function(){$(".message").append("");}).delay(5000).fadeOut("fast");}
if(response.status=='srv_error'){
$('#mail_error').html("Ошибка на сервере. Попробуйте повторить позднее").hide().fadeIn(1000,function(){$(".message").append("");}).delay(5000).fadeOut("fast");}		
if(response.status=="robot"){
$('#mail_error').html(" Проверка \"Я не робот\" не пройдена").hide().fadeIn(1000,function(){$(".message").append("");}).delay(5000).fadeOut("fast");}
}
});
} 
else {
	if(!pattern.test($('input[name="email"]').val())) $('#mail_error').html("Email указан неверно").hide().fadeIn(1000,function(){$(".message").append("");}).delay(5000).fadeOut("fast");
	if(!captcha)$('#cap_error').html(" Проверка \"Я не робот\" не пройдена").hide().fadeIn(1000,function(){$(".message").append("");}).delay(5000).fadeOut("fast");
	if (filesize>10485760) $('#file_error').html("Файл слишком большой").hide().fadeIn(1000,function(){$(".message").append("");}).delay(5000).fadeOut("fast");
}
});
$('#message').keyup(function(){
var maxLength = $(this).attr('maxlength');
var curLength = $(this).val().length;
$(this).val($(this).val().substr(0, maxLength));
var remaning = maxLength - curLength;
if (remaning < 0) remaning = 0;
$('#charscount').html(curLength + ' / ' + maxLength);
});
$('#order_form').submit(function(e){
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
if ($('#toyscol').text()!='') {
var colt=Number.parseInt($('#toyscol').text());
$('#toyscol').text(colt+1);
} else {$('#toyscol').text('(1)');}
$('#add2cart').bPopup({
autoClose: 5000
});
//$("#order_form").trigger("reset");
//yaCounter46186368.reachGoal('ORDER');

}
if(response.status=='error')
{
$('#mail_error').html("Email указан неверно").hide().fadeIn(1000, function() {
                        $(".message").append("");
                        }).delay(5000).fadeOut("fast");
}
if(response.status=='srv_err')
{
$('#mail_error').html("Ошибка на сервере. Пожалуйста, повторите позднее.").hide().fadeIn(1000, function() {
                        $(".message").append("");
                        }).delay(5000).fadeOut("fast");
}
if(response.status=='exist')
{
$('#mail_error').html("Уже есть в вашей корзине").hide().fadeIn(1000, function() {
                        $(".message").append("");
                        }).delay(5000).fadeOut("fast");
} 
} 
});
});

$('#cart_form').submit(function(e){
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
yaCounter46186368.reachGoal('ORDER');
$('#order').bPopup({
autoClose: 5000
});
$("#cart_form").trigger("reset");
reloader = setTimeout(reload, 5000);
function reload(){
     window.location.reload();
};
//window.location.reload();
}
if(response.status=='error')
{
$('#mail_error').html("Email указан неверно").hide().fadeIn(1000, function() {
                        $(".message").append("");
                        }).delay(5000).fadeOut("fast");
}
if(response.status=='srv_err')
{
$('#mail_error').html("Ошибка на сервере. Пожалуйста, повторите позднее.").hide().fadeIn(1000, function() {
                        $(".message").append("");
                        }).delay(5000).fadeOut("fast");
}
if(response.status=='num_err')
{
$('#mail_error').html("\"Количество\" должно быть числом 1..3").hide().fadeIn(1000, function() {
                        $(".message").append("");
                        }).delay(5000).fadeOut("fast");
} 
} 
});
});


});	