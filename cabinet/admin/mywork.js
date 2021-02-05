function writeMeSubmit(form){
	//создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
	
	var formData = new FormData(document.forms.form);
	var err=0;
	formData.append('quit', 'N');
	formData.append('key', 'pizdarulu');
	
	
	//проверка полей на заполнение
	
 if ( $('input#id').val()		=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#name').val()		=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#height').val()	=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#picf').val()		=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#picn').val()		=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#price').val()	=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#type').val()		=='') {formData.set('quit', 'Y'); err=1;}
 if ( $('input#secret').val()	=='') {formData.set('quit', 'Y'); err=1;}
 	
	//присоединяем наш файл
	if (err!=1) {
	jQuery.each($('#uploadfile')[0].files, function(i, file) {
		formData.append('uploadfile', file);
	});
	$('#message_form_base').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> отправка...</span>");
	}
	
	//отправляем через ajax
	$.ajax({
		url: "/myfunc/db.php",
		type: "POST",
		dataType : "json", 
		cache: false,
		contentType: false,
		processData: false,			
		data: formData, //указываем что отправляем
		success: function(data){
			if(data.ok == 'Y'){
				//если ок, выводим сообщение
				$('#message_form_base').html('<span style="color: green; text-align: left;">Запись успешно создана</span>');
				setTimeout(function() { $('#message_form_base').html(' '); }, 3000);
			
			$(form).trigger("reset");
			setTimeout(function() { location.reload(); }, 3000);
			
			} 
			if (data.ok=='N'){
				$('#message_form_base').html('<span style="color: red; text-align: left;"><uppercase>*</uppercase>-обязательные поля</span>');
				setTimeout(function() { $('#message_form_base').html(' '); }, 3000);					
			}
			
			if (data.ok=='NO_IMAGE'){
				$(form).trigger("reset");
				$('#message_form_base').html('<span style="color: green; text-align: left;">Данные добавлены<br>без загрузки фото</span>');
				setTimeout(function() { $('#message_form_base').html(' '); }, 3000);	
				setTimeout(function() { location.href='/cabinet/admin/'; }, 3000);
				
			}
			
			if (data.ok=='ERR_DIR'){
				
				$('#message_form_base').html('<span style="color: red; text-align: left;">НЕ добавлено<br>Папка отсутствует на сервере</span>');
				setTimeout(function() { $('#message_form_base').html(' '); }, 3000);					
			}
			
			
		} 
	});
	
	return false;
	
}


$(function(){
	
	

$('#makepage').on('submit',function(e){

		e.preventDefault();

				
				var formData = new FormData(document.forms.makepage); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
				formData.append('key', 'pizdarulu');
				
				
				//$('#result_mkdir').html("<i class='icon-spinner icon-spin icon-large'></i>");
	
	if ( $('input#pagename').val()!="" ) { 
	
	//$('#result_upload_spinner').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		
		//jQuery.each($('#avafile')[0].files, function(i, file) {
			//		formData.append('avafile', file);
				//});
		
		$.ajax({
					url: '/myfunc/makepage.php',
					type: 'POST',
					method: 'POST',
					cache: false,
					contentType: false,
					processData: false,		
					data: formData,
					success: function(result){
												var response=JSON.parse(result);
												
												if (response.status=='makepage_success') {
											
												$('#makepage').trigger("reset");
												//$('#result_upload_spinner').html("");
												$('#result_makepage').html("<span style='color:green;'>Создано успешно</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
												if (response.status=='makepage_error') {
											
												$('#result_makepage').html("<span style='color:red;'>Не создано</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												//$('#result_upload_spinner').html("");
												}
												
											} 

					}); 
		} else {
			$('#result_makepage').html("<span style='color:red;'>Путь не должен быть пустым</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
		
		}
});
	
	

$('#fs_func_upload').on('submit',function(e){

		e.preventDefault();

				
				var formData = new FormData(document.forms.fs_func_upload); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
				formData.append('key', 'pizdarulu');
				
				
				//$('#result_mkdir').html("<i class='icon-spinner icon-spin icon-large'></i>");
	
	if ( $('input#avaname').val()!="" ) { 
	
	$('#result_upload_spinner').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		
		jQuery.each($('#avafile')[0].files, function(i, file) {
					formData.append('avafile', file);
				});
		
		$.ajax({
					url: '/myfunc/upload.php',
					type: 'POST',
					method: 'POST',
					cache: false,
					contentType: false,
					processData: false,		
					data: formData,
					success: function(result){
												var response=JSON.parse(result);
												
												if (response.status=='upload_success') {
											
												$('#fs_func_upload').trigger("reset");
												$('#result_upload_spinner').html("");
												$('#result_upload').html("<span style='color:green;'>Загружено успешно</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
												if (response.status=='upload_error') {
											
												$('#result_upload').html("<span style='color:red;'>Не выбран файл</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												$('#result_upload_spinner').html("");
												}
												
											} 

					}); 
		} else {
			$('#result_upload').html("<span style='color:red;'>Путь не должен быть пустым</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
		
		}
});


$('#fs_func_mkdir').on('submit',function(e){

		e.preventDefault();

				
				var formData = new FormData(document.forms.fs_func_mkdir); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
				formData.append('key', 'pizdarulu');
				//jQuery.each($('#avafile')[0].files, function(i, file) {
					//formData.append('avafile', file);
				//});
	
		
		if ( $('input#mkdir').val()!="") { 
		
		$('#result_mkdir_spinner').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		$.ajax({
					url: '/myfunc/mkdir.php',
					type: 'POST',
					method: 'POST',
					cache: false,
					contentType: false,
					processData: false,		
					data: formData,
					success: function(result){
												var response=JSON.parse(result);
												
												if (response.status=='mkdir_success') {
											
												$("#fs_func_mkdir").trigger("reset");
												//$('#result_mkdir').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
												$('#result_mkdir_spinner').html("");
												$('#result_mkdir').html("<span style='color:green;'>Папка создана успешно</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
												if (response.status=='mkdir_error') {
											$('#result_mkdir_spinner').html("");
												$('#result_mkdir').html("<span style='color:red;'>Папка НЕ создана</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
											} 

					});
		} else 	$('#result_mkdir').html("<span style='color:red;'>Путь не должен быть пустым</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");				
});

$('#fs_func_rmdir').on('submit',function(e){

		e.preventDefault();

				
				var formData = new FormData(document.forms.fs_func_rmdir); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
				formData.append('key', 'pizdarulu');
				//jQuery.each($('#avafile')[0].files, function(i, file) {
					//formData.append('avafile', file);
				//});
	//$('#result_rmdir').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		if ( $('input#rmdir').val()!='') {
			$('#result_rmdir_spinner').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		$.ajax({
					url: '/myfunc/rmdir.php',
					type: 'POST',
					method: 'POST',
					cache: false,
					contentType: false,
					processData: false,		
					data: formData,
					success: function(result){
												var response=JSON.parse(result);
												
												if (response.status=='rmdir_success') {
											
												$("#fs_func_rmdir").trigger("reset");
												$('#result_rmdir_spinner').html("");
												$('#result_rmdir').html("<span style='color:green;'>Удалено успешно</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
												if (response.status=='rmdir_error') {
											$('#result_rmdir_spinner').html("");
												$('#result_rmdir').html("<span style='color:red;'>НЕ удалено</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
											} 

					}); 
			} else $('#result_rmdir').html("<span style='color:red;'>Путь не должен быть пустым</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
});


$('#fs_func_rmdir_toys').on('submit',function(e){

		e.preventDefault();

				
				var formData = new FormData(document.forms.fs_func_rmdir_toys); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
				formData.append('key', 'pizdarulu');
				//jQuery.each($('#avafile')[0].files, function(i, file) {
					//formData.append('avafile', file);
				//});
	//$('#result_rmdir').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		if ( $('input#rmdir_toys').val()!='') {
			$('#result_rmdir_toys_spinner').html("<i class='fa fa-spinner fa-spin'></i> <span style='font-size:0.9em;'> обработка...</span>");
		$.ajax({
					url: '/myfunc/rmdir.php',
					type: 'POST',
					method: 'POST',
					cache: false,
					contentType: false,
					processData: false,		
					data: formData,
					success: function(result){
												var response=JSON.parse(result);
												
												if (response.status=='rmdir_toys_success') {
											
												$("#fs_func_rmdir_toys").trigger("reset");
												$('#result_rmdir_toys_spinner').html("");
												$('#result_rmdir_toys').html("<span style='color:green;'>Удалено успешно</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
												if (response.status=='rmdir_toys_error') {
											$('#result_rmdir_toys_spinner').html("");
												$('#result_rmdir_toys').html("<span style='color:red;'>НЕ удалено</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
												}
												
											} 

					}); 
			} else $('#result_rmdir_toys').html("<span style='color:red;'>Путь не должен быть пустым</span>").hide().fadeIn(1000, function() {$(".message").append("");}).delay(3000).fadeOut("fast");
});


});
