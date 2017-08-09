// JavaScript Document
$(document).ready(function(){
	
		
		$('#mem_log_form').submit(function (event ){
											
									  
			var msg = '';
			if ( $('#username').val() == '' ){
				$('#username').focus();
				msg = 'نام کاربری وارد نشده';
			}
			else if ( $('#password').val() == '' ){
				$('#password').focus();
				msg = 'رمز عبور وارد نشده';
			}
			
			if ( msg != '' ){
					$('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												
												$('#alerts').fadeIn(200); 
												 });
					return false;
					
			}
			else { 
					
					

		$('#wait').fadeIn(100); $('#bg').fadeIn(100);	
			
		$.post("/Adlogin", { 
			  		username           : $('#username').val(),
					password         : $('#password').val(),
					_token           : $('#_token').val(),
			   },
		 function(data){ 
		 if ( data.status ){
			
			window.location = 'http://localhost:8000/';
			
			 
		 }//  2pm
		 else {
			 msg = data.error;
			  $('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
				return false;
			 }
			  $('#wait').fadeOut(100); //$('#bg').fadeOut(100);
		 }, "json");
			return false;								
									
			}
							

});
		$('#admin_log').click(function (){
									  
			var msg = '';
			if ( $('#username').val() == '' ){
				$('#username').focus();
				msg = 'نام کاربری وارد نشده';
			}
			else if ( $('#password').val() == '' ){
				$('#password').focus();
				msg = 'رمز عبور وارد نشده';
				
			}
			
			if ( msg != '' ){
					$('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												
												$('#alerts').fadeIn(200); 
												 });
					
			}
			else { 
					
					

		$('#wait').fadeIn(100); $('#bg').fadeIn(100);	
			
		$.post("/Adlogin", { 
			  		username           : $('#username').val(),
					password         : $('#password').val(),
					_token           : $('#_token').val(),
			   },
		 function(data){ 
		 if ( data.status ){
			
			window.location = 'http://localhost:8000/';
			 
		 }//  2pm
		 else {
			 msg = data.error;
			  $('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
			 }
			  $('#wait').fadeOut(100); //$('#bg').fadeOut(100);
		 }, "json");
											
									
			}
							
});
		
			  	
		});


