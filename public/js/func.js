// JavaScript Document
function isNumberKey(evt){

var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 47 || charCode > 57))
return false;

return true;}
function NotNumberKey(evt){

var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 47 || charCode > 57))
return true;
if ( charCode == 8 ){
	return true;
}
return false;}
function validate(address) {
 
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  
   if(reg.test(address) == false) {
 
      return false;
   }
   else {
	   return true;  
   }}
function checkMelliCode(meli_code) {


    if (meli_code.length == 10) {
        if (meli_code == '1111111111' ||
            meli_code == '0000000000' ||
            meli_code == '2222222222' ||
            meli_code == '3333333333' ||
            meli_code == '4444444444' ||
            meli_code == '5555555555' ||
            meli_code == '6666666666' ||
            meli_code == '7777777777' ||
            meli_code == '8888888888' ||
            meli_code == '9999999999') {
            
           
            return false;
        }
        c = parseInt(meli_code.charAt(9));
        n = parseInt(meli_code.charAt(0)) * 10 +
            parseInt(meli_code.charAt(1)) * 9 +
            parseInt(meli_code.charAt(2)) * 8 +
            parseInt(meli_code.charAt(3)) * 7 +
            parseInt(meli_code.charAt(4)) * 6 +
            parseInt(meli_code.charAt(5)) * 5 +
            parseInt(meli_code.charAt(6)) * 4 +
            parseInt(meli_code.charAt(7)) * 3 +
            parseInt(meli_code.charAt(8)) * 2;
        r = n - parseInt(n / 11) * 11;
        if ((r == 0 && r == c) || (r == 1 && c == 1) || (r > 1 && c == 11 - r)) {
			
            return true;
        } else {
            
            
            return false;
        }
    } else {
		 
        return false;
    }}
function ajaxFileUpload(source , file_el_id ,msg_id , check_id ){
		
		
		
				var file_data = $('#'+file_el_id).prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data);
				$.ajax({
							url: source, // point to server-side PHP script 
							dataType: 'text',  // what to expect back from the PHP script, if anything
							cache: false,
							contentType: false,
							processData: false,
							data: form_data,                         
							type: 'post',
							success: function(data){
								data = JSON.parse(data);
										if(data.err != '1')
										{
											document.getElementById(msg_id).innerHTML = data.err ;
											$('#'+check_id).val('1');
											$('#fileName').val(data.fileName);
										}else
										{
											
											document.getElementById(msg_id).innerHTML = 'حجم فایل بیشتر از حد مجاز است' ;
											$('#'+check_id).val('0');
											
										}
									
				
							}
				 });
	
	}
function postMenus(url){
	$('html, body').animate({ scrollTop: 0 }, 1000);
	$('#bg').fadeIn(100);
	$('#wait').fadeIn(100);
	$.post(url, { 
		   _token           : $('#_token').val(),
			   },
		 function(data){ 
		
		 if ( data ){
			 $('#AdminDiv').html(data);
			 $('#bg').fadeOut(100);
	  		 $('#wait').fadeOut(100);
			 }//  2pm
		 });	
}
function changeAdPass(){
	 		var msg = '';
			if ( $('#user_pass_old').val() == '' ){
				$('#user_pass_old').focus();
				msg = 'رمز عبور قبلی وارد نشده';
			}
			else if ( $('#user_pass').val() == '' ){
				$('#user_pass').focus();
				msg = 'رمز عبور جدید وارد نشده';
			}
			else if ( $('#user_pass1').val() == '' ){
				$('#user_pass1').focus();
				msg = 'تکرار رمز عبور وارد نشده';
			}
			else if ( $('#user_pass1').val() != $('#user_pass').val() ){
				msg = 'رمز عبور و تکرار رمز عبور یکسان نیست';
			}
			if ( msg != '' ){
					$('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
					
			}
			else { 
					
					

		
			
		$.post("index.php/admin/changeAdPass", { 
			  		username    : $('#username').val(),
					old_pass    : $('#user_pass_old').val(),
					password    : $('#user_pass').val()
			   },
		 function(data){ 
		 if ( data.status ){
			$('#changeMemP').html('<div class="rt_msg"><label class="required"><div align="center" >با تشکر<br />رمز عبور شما در پایگاه داده ها به روز رسانی شد.</label></div>');
			 
		 }//  2pm
		 else {
			 msg = data.error;
			  $('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
			 }
		 }, "json");
											
									
	  
		}	
}

function regNum(regNum) {

  	
			$.post("decedent/cregNum", { 
					  		regNum     : regNum,
							_token     : $('#_token').val(),
					   },
				 function(data){
					 $('#m_ch1').html(data.msg);
					  if ( data.status ){ 
							 $('#regOk').val('1');
					  }
					  else {
					    	 $('#regOk').val('0');	
					  }
			  		 }, "json");		
	
}

function ctrlAct(id,ctrlAct){
			$('#wait').fadeIn(100);
			$('#LayerDiv').html('');
			$.post("index.php/"+ctrlAct, { 
				   tId     : id,
				   _token  : $('#_token').val(),
			   },
					 function(data){ 
					
					 if ( data ){
						 $('#LayerDiv').html(data);
				  		 $('#wait').fadeOut(100);
						 }//  2pm
					 });
			}


function regDead() {
			var msg = '';
			d_date = $('#d_date').val();
			ddate = d_date.split('/'); 
			int_date = $('#int_date').val();
			intdate = int_date.split('/'); 
			if ( $('#name').val() == '' ){
				$('#name').focus();
				msg = 'نام وارد نشده';
			}
			else if ( $('#family').val() == '' ){
				$('#family').focus();
				msg = 'نام خانوادگی وارد نشده';
			}
			else if ( $('#f_name').val() == '' ){
				$('#f_name').focus();
				msg = 'نام پدر وارد نشده';
			}
			else if ( $('#nationality').val() == '' ){
				$('#nationality').focus();
				msg = 'ملیت وارد نشده';
			}			
			/*else if ( $('#m_name').val() == '' ){
				$('#m_name').focus();
				msg = 'نام مادر وارد نشده';
			}
			
			
			else if ( $('#b_num').val() == '' ){
				$('#b_num').focus();
				msg = 'شماره شناسنامه وارد نشده';
			}
			else if ( $('#b_location').val() == '' ){
				$('#b_location').focus();
				msg = 'محل صدور وارد نشده';
			}*/
			else if ( $('#n_code').val() == '' ){
				$('#n_code').focus();
				msg = 'شماره ملی وارد نشده';
			}/*
			else if ( $('#frmCheck').val() == '0' ){
						msg = 'شماره ملی وارد شده، صحیح نبوده یا تکراری است';
			}*/
			else if ( $('#b_date').val() == '' ){
				$('#b_date').focus();
				msg = 'تاریخ تولد وارد نشده';
			}
			
			else if ( $('#addr').val() == '' ){
				$('#addr').focus();
				msg = 'نشانی وارد نشده';
			}
			/*else if ( $('#age').val() == '' ){
				$('#age').focus();
				msg = 'سن وارد نشده';
			}
			else if ( $('#tel').val() == '' ){
				$('#tel').focus();
				msg = 'شماره تماس وارد نشده';
			}
			else if ( $('#tel').val() < 02199999999 ){
				$('#tel').focus();
				msg = 'شماره تماس وارد شده صحیح نیست';
			}*/
			/*else if ( $('#city').val() == '' ){
				$('#city').focus();
				msg = 'شهر محل سکونت وارد نشده';
			}
			else if ( $('#zipcode').val() == '' ){
				$('#zipcode').focus();
				msg = 'کدپستی وارد نشده';
			}*/
			else if ( $('#d_date').val() == '' ){
				$('#d_date').focus();
				msg = 'تاریخ فوت وارد نشده';
			}
			
			else if ( $('#int_date').val() == '' ){
				$('#int_date').focus();
				msg = 'تاریخ ثبت وارد نشده';
			}
			else if ( intdate < ddate ){
				$('#int_date').focus();
				msg = 'تاریخ ثبت و تاریخ فوت، صحیح نیست';
			}
			else if ( $('#d_reason').val() == '' ){
				$('#d_reason').focus();
				msg = 'علت فوت وارد نشده';
			}
			else if ( $('#fridge_num').val() == '' ){
				$('#fridge_num').focus();
				msg = 'شماره سردخانه وارد نشده';
			}
			else if ( $('#reg_num').val() == '' ){
				$('#reg_num').focus();
				$('#regOk').val('0');
				msg = 'شماره ثبت دفتری وارد نشده';
			}
			else if ( $('#regOk').val() == '0' ){
				$('#reg_num').focus();
				msg = 'شماره ثبت دفتری وارد شده، تکراری و نامعتبر است';
			}
			/*
			else if ( $('#regCheck').val() == '0' ){
						msg = 'شماره سردخانه وارد شده تکراری و نامعتبر است';
			}*/
			
			if ( msg != '' ){
					$('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
					
			}
			else {
				 
				$('#bg').fadeIn(100);
			$('#wait').fadeIn(100);
		      $.post("decedent/decsave", { 
					gender       : $('#gender').val(),
					name         : $('#name').val(),
			  		family       : $('#family').val(),
					f_name       : $('#f_name').val(),
					m_name       : $('#m_name').val(),
					nationality  : $('#nationality').val(),
					n_code       : $('#n_code').val(),
					b_num        : $('#b_num').val(),
					b_location   : $('#b_location').val(),
					sh_serial    : $('#sh_serial').val(),
					sh_series    : $('#sh_series').val(),
					b_date       : $('#b_date').val(),
					addr         : $('#addr').val(),
					age          : $('#age').val(),
					job          : $('#job').val(),
					tel          : $('#tel').val(),
					mobile       : $('#mobile').val(),
					zipcode      : $('#zipcode').val(),
					d_date       : $('#d_date').val(),
					d_date_status: $('#d_date_status').val(),
					int_date     : $('#int_date').val(),
					d_place      : $('#d_place').val(),
					d_reason     : $('#d_reason').val(),
					disease      : $('#disease').val(),
					hos_dc       : $('#hos_dc').val(),
					fridge_num   : $('#fridge_num').val(),
					burial       : $('#burial').val(),
					burial_p     : $('#burial_p').val(),
					driver       : $('#driver').val(),
					add_txt      : $('#add_txt').val(),
					reg_num      : $('#reg_num').val(),
					discription  : $('#discription').val(),
					_token       : $('#_token').val(),
					
									
					
			   },
		 function(data){  
			  alert('متوفی جدید با موفقیت ثبت شد');
			 $("body").removeClass("modal-open");
			 $('.modal-backdrop').fadeOut(100);
			 postMenus('decedent/decList');
		
		
		 });
											
									
	  
		
			}
}
function searchDec(){
  			$('#bg').fadeIn(100);
			$('#wait').fadeIn(100);
			$.post("decedent/searchDec", { 
					  		gender   :  $('#gender').val(),
							wcolumn  :  $('#wcolumn').val(),
							orderBy  :  $('#orderBy').val(),
							verb     :  $('#verb').val(),
							decStart :  $('#decStart').val(),
							decEnd   :  $('#decEnd').val(),
							_token       : $('#_token').val(),
					   },
				 function(data){
					 $('#searchResult').html(data);
					 $('#bg').fadeOut(100);
			  		 $('#wait').fadeOut(100);});	
}
function sendDeadDoc(att_id,id){
	var msg = '';
			
			if ( $('#image_check2').val() == '0' ){
				$('#image_file2').focus();
				msg = 'فایل ارسال نشده یا حجم آن مناسب نیست';alert(msg);
			}
			if ( msg != '' ){
				$('#msgch').html(msg);
			}
			else {
			$('#wait').fadeIn(100);	
			$.post("decedent/sendDeadDoc", { 
				   att_id    : att_id,
				   id        : id,
				   fileName  : $('#fileName').val(),
				   _token    : $('#_token').val(),
			   },
					 function(data){ 
					
					
						 
						ctrlAct(id,'decedent/attachs');
						 
					 });
	}
}

function editDead() {
			var msg = '';
			d_date = $('#d_date').val();
			ddate = d_date.split('/'); 
			int_date = $('#int_date').val();
			intdate = int_date.split('/'); 
			if ( $('#name').val() == '' ){
				$('#name').focus();
				msg = 'نام وارد نشده';
			}
			else if ( $('#family').val() == '' ){
				$('#family').focus();
				msg = 'نام خانوادگی وارد نشده';
			}
			else if ( $('#f_name').val() == '' ){
				$('#f_name').focus();
				msg = 'نام پدر وارد نشده';
			}			
			/*else if ( $('#m_name').val() == '' ){
				$('#m_name').focus();
				msg = 'نام مادر وارد نشده';
			}*/
			else if ( $('#nationality').val() == '' ){
				$('#nationality').focus();
				msg = 'ملیت شغل وارد نشده';
			}
			else if ( $('#n_code').val() == '' ){
				$('#n_code').focus();
				msg = 'شماره ملی وارد نشده';
			}/*
			else if ( $('#frmCheck').val() == '0' ){
						msg = 'شماره ملی وارد شده، صحیح نبوده یا تکراری است';
			}
			else if ( $('#b_num').val() == '' ){
				$('#b_num').focus();
				msg = 'شماره شناسنامه وارد نشده';
			}
			else if ( $('#b_location').val() == '' ){
				$('#b_location').focus();
				msg = 'محل صدور وارد نشده';
			}*/
			else if ( $('#b_date').val() == '' ){
				$('#b_date').focus();
				msg = 'تاریخ تولد وارد نشده';
			}
			/*else if ( $('#age').val() == '' ){
				$('#age').focus();
				msg = 'سن وارد نشده';
			}
			else if ( $('#tel').val() == '' ){
				$('#tel').focus();
				msg = 'شماره تماس وارد نشده';
			}
			else if ( $('#tel').val() < 02199999999 ){
				$('#tel').focus();
				msg = 'شماره تماس وارد شده صحیح نیست';
			}
			/*else if ( $('#city').val() == '' ){
				$('#city').focus();
				msg = 'شهر محل سکونت وارد نشده';
			}
			else if ( $('#zipcode').val() == '' ){
				$('#zipcode').focus();
				msg = 'کدپستی وارد نشده';
			}*/
			else if ( $('#d_date').val() == '' ){
				$('#d_date').focus();
				msg = 'تاریخ فوت وارد نشده';
			}
			else if ( $('#int_date').val() == '' ){
				$('#int_date').focus();
				msg = 'تاریخ ثبت وارد نشده';
			}
			else if ( intdate < ddate ){
				$('#int_date').focus();
				msg = 'تاریخ ثبت و تاریخ فوت، صحیح نیست';
			}
			/*else if ( $('#d_reason').val() == '' ){
				$('#d_reason').focus();
				msg = 'علت فوت وارد نشده';
			}*/
			else if ( $('#fridge_num').val() == '' ){
				msg = 'شماره سردخانه وارد نشده';
			}
			else if ( $('#reg_num').val() == '' ){
				$('#reg_num').focus();
				msg = 'شماره ثبت دفتری وارد نشده';
			}
			else if ( $('#regOk').val() == '0' ){
				$('#reg_num').focus();
				msg = 'شماره ثبت دفتری وارد شده، تکراری و نامعتبر است';
			}
			/*else if ( $('#regCheck').val() == '0' ){
						msg = 'شماره سردخانه وارد شده تکراری و نامعتبر است';
			}*/
			
			if ( msg != '' ){
					$('#err_msg').html(msg);
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
					
			}
			else {
				 
			$('#wait').fadeIn(100);
		      $.post("decedent/decEdit", { 
					gender       : $('#gender_edit').val(),
					name         : $('#name').val(),
			  		family       : $('#family').val(),
					f_name       : $('#f_name').val(),
					m_name       : $('#m_name').val(),
					nationality  : $('#nationality').val(),
					n_code       : $('#n_code').val(),
					b_num        : $('#b_num').val(),
					b_location   : $('#b_location').val(),
					sh_serial    : $('#sh_serial').val(),
					sh_series    : $('#sh_series').val(),
					b_date       : $('#b_date').val(),
					age          : $('#age').val(),
					job          : $('#job').val(),
					tel          : $('#tel').val(),
					mobile       : $('#mobile').val(),
					addr         : $('#addr').val(),
					zipcode      : $('#zipcode').val(),
					d_date       : $('#d_date').val(),
					d_date_status: $('#d_date_status').val(),
					int_date     : $('#int_date').val(),
					d_place      : $('#d_place').val(),
					d_reason     : $('#d_reason').val(),
					disease      : $('#disease').val(),
					hos_dc       : $('#hos_dc').val(),
					fridge_num   : $('#fridge_num').val(),
					burial       : $('#burial').val(),
					burial_p     : $('#burial_p').val(),
					driver       : $('#driver').val(),
					add_txt      : $('#add_txt').val(),
					reg_num      : $('#reg_num').val(),
					discription  : $('#discription').val(),
					id           : $('#deadIdEd').val(),
					_token       : $('#_token').val(),
					
									
					
			   },
		 function(data){  
		 
			
			$('#err_msg').html('اطلاعات متوفی با موفقیت به روز رسانی شد');
			
					$('#bg').fadeIn(100,function(){
												$('#alerts').fadeIn(200); 
												 });
						 
		 
			  $('#wait').fadeOut(100);
			   $("body").removeClass("modal-open");
			 $('.modal-backdrop').fadeOut(100);
			  postMenus('decedent/decList');
		
		
		 });
											
									
	  
		
			}
}
function deleteDec(id){
		
				 
			$('#wait').fadeIn(100);
		      $.post("decedent/deleteDec", { 
					id      : id,
					_token  : $('#_token').val(),
			   },
		 function(data){
			 postMenus('decedent/decList');
			 $("body").removeClass("modal-open");
			 $('.modal-backdrop').fadeOut(100);
			 	
			
	  		 $('#wait').fadeOut(100);
			 });
		
}