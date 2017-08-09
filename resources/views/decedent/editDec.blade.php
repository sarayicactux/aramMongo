<?php $fn = new App\Http\Controllers\Jdate ?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLayer"> ویرایش اطلاعات متوفی</h4>
      </div>
	  <div style="padding:6px">
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
<div align="right" class="form" style="height:480px;overflow:auto;">
<div class="guest_div col-md-12">
<div align="right" class="form">

<div class="portlet box blue"> 
	<div class="portlet-title"> 
	   <div class="caption">
			مشخصات فردی
		</div>
	</div>	
	<div class="portlet-body form">
		<div class="form-horizontal">
		<div class="form-body">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">جنسیت</label>
						<div class="col-md-8">
							<select class="form-control" id="gender_edit">
							<option value="1">مرد</option>
							<option value="2" @if ( $inf->gender == '2' ) selected="selected" @endif >زن</option>
							</select>
							<input type="hidden" id="frmCheck" value="1" />
							<input type="hidden" id="deadIdEd" value="{{ $inf->id  }}" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input class="form-control" value="{{ $inf->name  }}"  maxlength="60" onkeypress="return NotNumberKey(event)" name="name"  id="name" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام خانوادگی<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input class="form-control" value="{{ $inf->family  }}" maxlength="60" name="family"  onkeypress="return NotNumberKey(event)"  id="family" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام پدر<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input class="form-control" maxlength="60" value="{{ $inf->f_name  }}" name="f_name"  id="f_name" onkeypress="return NotNumberKey(event)" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نام مادر</label>
						<div class="col-md-8">
							<input class="form-control" maxlength="60" name="m_name" value="{{ $inf->m_name  }}"  onkeypress="return NotNumberKey(event)"  id="m_name" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">ملیت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input class="form-control"   value="{{ $inf->nationality  }}"  onkeypress="return NotNumberKey(event)" name="nationality"  id="nationality" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره ملی/شناسه<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input class="form-control" value="{{ $inf->n_code  }}" maxlength="10" name="n_code"  id="n_code" type="text"
							onkeypress="return isNumberKey(event)" style="font-family:Tahoma; text-align:left" 
								
							 />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4" style="padding:2px">شماره شناسنامه</label>
						<div class="col-md-8">
							<input class="form-control" maxlength="11" value="{{ $inf->b_num  }}" name="b_num" onkeypress="return isNumberKey(event)" style="font-family:Tahoma; text-align:left" id="b_num" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">صادره از</label>
						<div class="col-md-8">
							<input class="form-control"  name="b_location" value="{{ $inf->b_location  }}" onkeypress="return NotNumberKey(event)"  id="b_location" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group" >
						<label class="control-label col-md-4"  style="padding:2px">سریال شناسنامه</label>
						<div class="col-md-8">
							<input class="form-control" value="{{ $inf->sh_serial  }}" style="font-family:Tahoma" id="sh_serial" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">سری شناسنامه</label>
						<div class="col-md-8">
							<input class="form-control" maxlength="10" value="{{ $inf->sh_series  }}" name="sh_series" style="font-family:Tahoma" id="sh_series" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">تاریخ تولد<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control" name="b_date" value="{{ $fn->echo_date2($inf->b_date)  }}" onchange="if ( $('#d_date').val() != '' ) {
							  b_date = $('#b_date').val();
							  buff   = b_date.split('/'); 
							  bDate  = buff[0]*1;
							  d_date = $('#d_date').val();
							  buff   = d_date.split('/'); 
							  dDate  = buff[0]*1; 
							  age    = dDate - bDate;
							  $('#age').val(age) ;
							}" readonly="" style="font-family:Tahoma"   id="b_date" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			
		<div class="row">
				<div class="col-md-4">
					<div class="form-group" >
						<label class="control-label col-md-4"  style="padding:2px">سن</label>
						<div class="col-md-8">
							<input class="form-control" maxlength="3" value="{{ $inf->age  }}" style="font-family:Tahoma; text-align:left" onkeypress="return isNumberKey(event)" id="age" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شغل</label>
						<div class="col-md-8">
							<input class="form-control" maxlength="100" value="{{ $inf->job  }}" onkeypress="return NotNumberKey(event)" name="job" id="job" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره تماس<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control" maxlength="11" name="tel" value="{{ $inf->tel  }}" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left" id="tel" type="text" />
						</div>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group" >
						<label class="control-label col-md-4"  style="padding:2px">تلفن همراه</label>
						<div class="col-md-8">
							<input class="form-control" maxlength="11" value="{{ $inf->mobile  }}" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left" id="mobile" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">کد پستی</label>
						<div class="col-md-8">
							<input  class="form-control" maxlength="10" name="zipcode" value="{{ $inf->zipcode  }}" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left"  id="zipcode" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">توضیحات:</label>
						<div class="col-md-8">
							<input  class="form-control" name="discription" value="{{ $inf->discription  }}"  id="discription" type="text" />
						</div>
					</div>
				</div>
				
				
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">نشانی:<span style="color:#FF0000">*</span></label>
						<div  class="col-md-8"  >
							<input  class="form-control" size="300" name="addr"  value="{{ $inf->addr  }}" id="addr" type="text" />
						</div>
					</div>
				</div>
				
				
				
			</div>
			
		</div>	
		</div>
	</div>
</div>


<div class="portlet box blue"> 
	<div class="portlet-title"> 
	   <div class="caption">
			اطلاعات فوت
		</div>
	</div>	
	<div class="portlet-body form">
		<div class="form-horizontal">
		<div class="form-body">
			<div class="form-section caption-subject font-red-sunglo" id="m_ch1"></div>
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">تاریخ فوت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
				<input  class="form-control" name="d_date" onchange="if ( $('#b_date').val() != '' ) {
							  b_date = $('#b_date').val();
							  buff   = b_date.split('/'); 
							  bDate  = buff[0]*1;
							  d_date = $('#d_date').val();
							  buff   = d_date.split('/'); 
							  dDate  = buff[0]*1; 
							  age    = dDate - bDate;
							  $('#age').val(age) ;
							}" readonly="" value="{{ $fn->echo_date2($inf->d_date)  }}" style="font-family:Tahoma"   id="d_date" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">تاریخ ثبت<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
							<input  class="form-control" name="int_date" readonly="" value="{{ $fn->echo_date2($inf->int_date)  }}" style="font-family:Tahoma"   id="int_date" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">محل فوت</label>
						<div class="col-md-8">
							<input class="form-control" name="d_place"  id="d_place" value="{{ $inf->d_place  }}" type="text" />
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
							@for ( $i=0;$i< count($c_death);$i++ ) 
							<option @if( $inf->death_id ==  $c_death[$i]['id'] ) selected="selected" @endif   value="{{ $c_death[$i]['id']  }}">{{ $c_death[$i]['c_code'].' : '.$c_death[$i]['c_death']  }}</option>
							@endfor
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">پزشک/بیمارستان</label>
						<div class="col-md-8">
							<input class="form-control" name="hos_dc"  id="hos_dc" value="{{ $inf->hos_dc  }}" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره سردخانه<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
								<input  class="form-control" name="fridge_num" value="{{ $inf->fridge_num  }}" onkeypress="return isNumberKey(event)"  style="font-family:Tahoma; text-align:left"  id="fridge_num" type="text"   />
								<input type="hidden" id="regCheck" value="1" />
							
						</div>
					</div>
				</div>
				
			</div>
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">شماره ثبت دفتری<span style="color:#FF0000">*</span></label>
						<div class="col-md-8">
						<input class="form-control" name="reg_num"  value="{{ $inf->reg_num  }}"  id="reg_num" type="text" 
						onblur="
						  if (this.value != ''){
						  if ( this.value == '{{ $inf->reg_num  }}' ){
						  		$('#regOk').val('1');
						  }
						  else {
						   	 regNum(this.value);
						  }
						  
						  }
						 "
						
						 onkeyup="if (this.value != ''){
						  if ( this.value == '{{ $inf->reg_num  }}' ){
						  		$('#regOk').val('1');
						  }
						  else {
						  	$('#regOk').val('0');
						   	 regNum(this.value);
						  }
						  
						  }"
						
						/>
						<input type="hidden" id="regOk" value="1" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group"  >
					<label class="control-label col-md-4"  style="padding:2px">محل دفن</label>
						<div class="col-md-8">
						<select class="select2_category form-control" id="burial" onchange="
							if ( this.value == '1' ){
									$('#burial_pDiv').fadeOut(300);
							}
							else {
									$('#burial_pDiv').fadeIn(300);
							}
							">
							<option value="1">دفن در آرامستان اراک</option>
							<option value="2" @if ( $inf->burial == '2' ) echo 'selected="selected"'  @endif >انتقال به بیرون از آرامستان</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4"  style="padding:2px">متن الحاقی</label>
						<div class="col-md-8">
							<input class="form-control" name="add_txt"  value="{{ $inf->add_txt  }}" id="add_txt" type="text" />
						</div>
					</div>
				</div>
				</div>
				<div class="row" id="burial_pDiv"  @if ( $inf->burial == '1' ) style="display:none"  @endif>
				<div class="col-md-4">
					<div class="form-group"  >
					<label class="control-label col-md-4"  style="padding:2px">محل دفن</label>
						<div class="col-md-8">
						<input class="form-control" name="burial_p" value="{{ $inf->burial_p  }}"  id="burial_p" type="text" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" >
					<label class="control-label col-md-4"  style="padding:2px">نام راننده</label>
						<div class="col-md-8">
						<select class="form-control" id="driver">
							@for ( $i = 0; $i < count($drivers);$i++ )
							<option @if( ($drivers[$i]['id']) == $inf->driver ) selected="selected" @endif  value="{{ $drivers[$i]['id']  }}">{{ $drivers[$i]['name'].' '.$drivers[$i]['family']  }}</option>
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
						<select class="select2_category form-control" id="d_date_status" >
							<option value="0">تاریخ فوت مشخص </option>
							<option value="1" @if ( $inf->d_date_status == '1' ) selected="selected" @endif >تاریخ دقیق فوت نا معلوم</option>
							</select>
						</div>
					</div>
				</div>
				</div>
				
			</div>
			
			
			
		</div>	
		
		
		
		
		
		
		
		</div>
	</div><br />
	<div class="form-actions">
			<div class="row">
				<div  align="left">
					<button onclick="editDead();" class="btn btn-primary">ثبت اطلاعات</button>
				</div>
			</div>
		</div>
</div>
</div>
</div>
<div class="form-section caption-subject font-red-sunglo" id="m_ch" style="color:#FF0000"></div>
</div>
<input class="form-control" name="disease"  id="disease" type="hidden" />