<script language="javascript">
  $('#b_date, #b_date').MdPersianDateTimePicker({TargetSelector: '#b_date'});
  $('#d_date, #d_date').MdPersianDateTimePicker({TargetSelector: '#d_date'});
  $('#int_date, #int_date').MdPersianDateTimePicker({TargetSelector: '#int_date'});
function checkLn(cval,txt)	{
cval = cval *1;
if ( cval < 1000000000 ){
		//$('#m_ch').html(' طول '+txt+' وارد شده،صحیح نیست ');
		
	}
else {
	$('#m_ch').html('');
}
}
</script>
<div class="container">
    <div class="panel panel-primary">
	  <div class="panel-heading">مشخصات فردی</div>

<div class="portlet-body form form-horizontal" style="padding:6px;">
		<br>
		<div class="form-body">
			<div class="form-section caption-subject font-red-sunglo" id="m_ch"></div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">جنسیت</label>
						<div class="col-md-8">
							<select  class="form-control input-sm" id="gender">
							<option value="1">مرد</option>
							<option value="2">زن</option>
							</select>
							<input type="hidden" id="frmCheck" value="0" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control input-sm"   maxlength="60" onkeypress="return NotNumberKey(event)" name="name"  id="name" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام خانوادگی<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="60" name="family"  onkeypress="return NotNumberKey(event)"  id="family" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام پدر<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="60"  name="f_name"  id="f_name" onkeypress="return NotNumberKey(event)" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام مادر</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="60" name="m_name"  onkeypress="return NotNumberKey(event)"  id="m_name" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px;">ملیت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control input-sm"   value="ایرانی"  onkeypress="return NotNumberKey(event)" name="nationality"  id="nationality" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره ملی / شناسه<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="10" name="n_code"  id="n_code" type="text"
							onkeypress="return isNumberKey(event)" style="font-family:Tahoma; text-align:left" onblur="
								var check = checkMelliCode(this.value); 
								if ( check ){
										ncode = this.value;
										$.post('index.php/decedent/checkMelicode', { 
														n_code     : ncode,
												   },
											 function(data){
												  if ( data.status ){ 
														 $('#m_ch').html('');
														 $('#frmCheck').val('1');
												  }
												  else {
												  $('#m_ch').html('کد ملی وارد شده تکراری و نامعتبر است');
												  $('#frmCheck').val('0');	
												  }
												 
												 }, 'json');
										
								}
								else {
										$('#m_ch').html('کد ملی وارد شده صحیح نیست');
										$('#frmCheck').val('0')		
								}
										
								
								"
							 />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4" style="padding:2px">شماره شناسنامه</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="11" name="b_num" onkeypress="return isNumberKey(event)" style="font-family:Tahoma; text-align:left" id="b_num" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">صادره از</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"   name="b_location" onkeypress="return NotNumberKey(event)"  id="b_location" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group" >
						<label class="control-label col-md-4"  style="padding:2px">سریال شناسنامه</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"   style="font-family:Tahoma" id="sh_serial" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">سری شناسنامه</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="10" name="sh_series" style="font-family:Tahoma" id="sh_series" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">تاریخ تولد<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  name="b_date" readonly="" style="font-family:Tahoma" onchange="if ( $('#d_date').val() != '' ) {
							  b_date = $('#b_date').val();
							  buff   = b_date.split('/'); 
							  bDate  = buff[0]*1;
							  d_date = $('#d_date').val();
							  buff   = d_date.split('/'); 
							  dDate  = buff[0]*1; 
							  age    = dDate - bDate;
							  $('#age').val(age) ;
							}"   id="b_date" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
		<div class="row">
				<div class="col-md-4">
					<div class="form-group" >
						<label class="control-label col-md-4"  style="padding:2px">سن</label>
						<div class="col-md-7">
							<input  class="form-control input-sm"  maxlength="3"  style="font-family:Tahoma; text-align:left" onkeypress="return isNumberKey(event)" id="age" type="text" />
						</div>سال
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شغل</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="100" onkeypress="return NotNumberKey(event)" name="job" id="job" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره تماس<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  name="tel" maxlength="11" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left" id="tel" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group" >
						<label class="control-label col-md-4"  style="padding:2px">تلفن همراه</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  maxlength="11"  onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left" id="mobile" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">کدپستی:</label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  maxlength="11" name="zipcode" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left"  id="zipcode" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">توضیحات:</label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  name="discription"  id="discription" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			<div class="row">
				
				
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نشانی:<span style="color:#FF0000">*</span></label>
						<div  class="col-md-8" style="width:800px" >
							<input   class="form-control input-sm"  size="300" name="addr"  id="addr" type="text" />
						</div>
					</div>
				</div>
				
			</div>
		</div>	
		</div>

</div>
</div>

<div class="container">
    <div class="panel panel-primary">
	  <div class="panel-heading">اطلاعات فوت</div>

<div class="portlet-body form form-horizontal" style="padding:6px;">
<br>
		<div class="form-body">
			<div class="form-section caption-subject font-red-sunglo" id="m_ch1"></div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">تاریخ فوت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  name="d_date" onchange="if ( $('#b_date').val() != '' ) {
							  b_date = $('#b_date').val();
							  buff   = b_date.split('/'); 
							  bDate  = buff[0]*1;
							  d_date = $('#d_date').val();
							  buff   = d_date.split('/'); 
							  dDate  = buff[0]*1; 
							  age    = dDate - bDate;
							  $('#age').val(age) ;
							}" readonly="" style="font-family:Tahoma"   id="d_date" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">تاریخ ثبت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  name="int_date" readonly="" style="font-family:Tahoma"   id="int_date" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">محل فوت</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  name="d_place"  id="d_place" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">علت فوت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<select  class="form-control input-sm"  id="d_reason">
							@for ($i = 0; $i < count($c_death); $i++)
							
							<option  value="{{ $c_death[$i]['id'] }}">{{ $c_death[$i]['c_code'].' : '.$c_death[$i]['c_death'] }}</option>
							@endfor
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">پزشک/بیمارستان</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  name="hos_dc"  id="hos_dc" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره سردخانه<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input   class="form-control input-sm"  name="fridge_num" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left"  id="fridge_num" type="text"  />
								<input type="hidden" id="regCheck" value="0" />
							
						</div>
					</div>
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره ثبت دفتری<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  name="reg_num" onkeypress="return isNumberKey(event)" 
						onblur="
						  if (this.value != ''){
						  
						  regNum(this.value);
						  }
						 "
						id="reg_num" type="text" />
						<input type="hidden" id="regOk" value="0" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label class="control-label col-md-4"  style="padding:2px">محل دفن</label>
						<div class="col-md-8">
						<select class="select2_category form-control input-sm" id="burial" onchange="
							if ( this.value == '1' ){
									$('#burial_pDiv').fadeOut(300);
							}
							else {
									$('#burial_pDiv').fadeIn(300);
							}
							">
							<option value="1">دفن در آرامستان اراک</option>
							<option value="2">انتقال به بیرون از آرامستان</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">متن الحاقی</label>
						<div class="col-md-8">
							<input  class="form-control input-sm"  name="add_txt"  id="add_txt" type="text" />
						</div>
					</div>
				</div>
				</div>
				
				<div class="row" id="burial_pDiv"  style="display:none">
				<div class="col-md-4" >
					<div class="form-group" >
					<label class="control-label col-md-4"  style="padding:2px">محل دفن</label>
						<div class="col-md-8">
						<input  class="form-control input-sm"  name="burial_p"  id="burial_p" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4"  >
					<div class="form-group" >
					<label class="control-label col-md-4"  style="padding:2px">نام راننده</label>
						<div class="col-md-8">
						
						<select  class="form-control input-sm"  id="driver">
							@for ( $i=0;$i < count($drivers);$i++ )
							<option  value="{{ $drivers[$i]['id']}}">{{ $drivers[$i]['name'].' '.$drivers[$i]['family']}}</option>
							@endfor
							</select>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-4" >
					<div class="form-group" >
					<label class="control-label col-md-4"  style="padding:2px">وضعیت تاریخ فوت</label>
						<div class="col-md-8">
						<select class="select2_category form-control input-sm" id="d_date_status" >
							<option value="0">تاریخ فوت مشخص </option>
							<option value="1">تاریخ دقیق فوت نا معلوم</option>
							</select>
						</div>
					</div>
				</div>
				</div>
				
			</div>
			
			
			
		</div>

</div>
</div>

<div  align="center">
					<button onclick="regDead();" class="btn btn-primary">ثبت اطلاعات</button>
				</div>
				<br>


</div>

<input  class="form-control input-sm"  name="disease"  id="disease" type="hidden" />