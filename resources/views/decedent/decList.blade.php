<?php $fn = new App\Http\Controllers\Jdate; ?>

<div class="container">
    <div class="panel panel-primary">
	  <div class="panel-heading">لیست متوفیان - تعداد کل ثبت شده ها: {{ $fn->fn($num) }} مورد<button onclick="postMenus('decedent');" type="button" data-toggle="modal" data-target="#newFLayer" class="btn btn-sm btn-success pull-left"><span class="glyphicon glyphicon-plus"></span>ثبت متوفی جدید</button></div>
        <div class="panel-body" id="compLs">
		<div class="form-body">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label col-md-6">جنسیت</label>
				<div class="col-md-9">
					<select class="select2_category form-control  input-sm" id="gender" onchange="
					if ( this.value == '0' ) {
							$('#male1').css('display','block');
							$('#female1').css('display','block');

					}
					else if (this.value == '1'){
							$('#male1').css('display','block');
							$('#female1').css('display','none');
					}
					else {
							$('#male1').css('display','none');
							$('#female1').css('display','block');
					}
					">
					<option value="0" selected="selected">هر دو</option>
					<option value="1" >مرد</option>
					<option value="2" >زن</option>
					</select>
					
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label col-md-4" style="padding:1px">جستجو بر حسب</label>
				<div class="col-md-9">
					<select id='wcolumn' class="select2_category form-control input-sm">
						<option value='name'>نام</option>
						<option value='family' id="fa">نام خانوادگی</option>
						<option value='f_name'>نام پدر</option>
						<option value='n_code'>کد ملی</option>
						<option value='reg_num'>شماره ثبت دفتری</option>
					</select>
					
				</div>
			</div>
		</div>
		
		
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label col-md-4" style="padding:1px">عبارت جستجو</label>
				<div class="col-md-9">
					<input  class="form-control input-sm"  maxlength="60" name="verb"  id="verb" type="text" placeholder="عبارت مورد نظر" />
					<span class="help-block">عبارت مورد جستجو را در اين كادر بنويسيد. </span>
				</div>
			</div>
		</div>
		
		</div>
		
		<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label col-md-4" style="padding:1px">مرتب سازی</label>
				<div class="col-md-9">
					<select id="orderBy" class="select2_category form-control input-sm">
					<option value="_id@2">جدید ترین ها</option>
					<option value="_id@1">قدیمی ترین ها</option>
					<option value="reg_num@2">شماره ثبت نزولی</option>
					<option value="reg_num@1">شماره ثبت صعودی</option>
					<option value="d_date@2">تاریخ فوت نزولی</option>
					<option value="d_date@1">تاریخ فوت صعودی</option>
					<option value="b_date@2">تاریخ تولد نزولی</option>
					<option value="b_date@1">تاریخ تولد صعودی</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label col-md-4" style="padding:1px">بازه زمانی ثبت از</label>
				<div class="col-md-9">
				  <input  class="form-control input-sm"  size="8" readonly="" name="decStart"  style="font-family:Tahoma; text-align:left"   id="decStart" type="text" />
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label col-md-4" style="padding:1px">تا</label>
				<div class="col-md-9">					
					<input  class="form-control input-sm"  size="8" readonly="" name="decEnd"  style="font-family:Tahoma; text-align:left"   id="decEnd" type="text" />
					
				</div>
			</div>
		</div>
		
		
		
	</div>
</div>
<div align="left" style="padding-left:10px"><button onclick="searchDec();" class="btn btn-primary">جستجو</button></div>
<br />
	<span id="searchResult">
<div class="portlet box blue">
  <div class="portlet-title"> 
	   <div class="caption">
		تعداد لیست : {{ $fn->fn($listNum)}} مورد
		</div>
	</div>	
  	
<div style="width:100%; height:300px; overflow:auto;background:#FFFFFF;">
<span style="display:none">{{ $i = 1 }}</span>
<table align="center"  dir="rtl" class="table  table-striped table-condensed  table-hover">
<tr align="center">
<td>ردیف</td>
<td>جنسیت</td>
<td>نام و نام خانوادگی</td>
<td>کد ملی</td>
<td>تاریخ فوت</td>
<td>شماره ثبت</td>
<td>تاریخ ثبت</td>
<td>الصاقیات</td>
<td>اطلاعیه فوت</td>
<td>خدمات</td>
<td>اطلاعات دفن</td>
<td>تخفیفات</td>
<td>اطلاعات پرداخت</td>
<td>رسید خدمات</td>
<td>مشاهده</td>
<td>ویرایش</td>
<td>حذف</td>
</tr>

@foreach ($decedent as $dead)
<tr align="center">
<td >{{ $fn->fn($i)}}</td>
<td >@if( $dead->gender == '1') مرد @else زن @endif</td>
<td >{{ $dead->name.' '.$dead->family}}</td>
<td >{{ $fn->fn($dead->n_code)}}</td>
<td >{{ $fn->echo_date($dead->d_date)}}</td>
<td >{{ $fn->fn($dead->reg_num)}}</td>
<td >{{ $fn->echo_date($dead->int_date)}}</td>
<td style="cursor:pointer"  >
<img src="{{ asset('images/paperclip4_black.png')}}" height="18" width="18" />
</td>
<td >
<img src="{{ asset('images/printer2.png')}}" height="18" width="18" />
</td>
<td >
<img src="{{ asset('images/serv.png')}}" height="18" width="18" />
</td>
<td  ><img src="{{ asset('images/Cancel-2-icon.png')}}" height="20"  alt="دسترسی غیر مجاز" title="دسترسی غیر مجاز"  width="20" />

</td>
<td >
<img src="{{ asset('images/percent.png')}}" height="18" width="18" />

</td>
<td  >
<img src="{{ asset('images/bank.png')}}" height="18" width="18" />

</td>
<td  >
<img src="{{ asset('images/pray.png')}}" height="18" width="18" />

</td>
<td >
<img src="{{ asset('images/eye.png')}}" height="18" width="18" />

</td>
<td  style="cursor:pointer"  data-toggle="modal" data-target="#modalLayer" onclick="ctrlAct('{{ (string)$dead->_id}}','decedent/edit')" >
<img src="{{ asset('images/1edit.png')}}" height="18" width="18" />
</td>
<td  style="cursor:pointer"  data-toggle="modal" data-target="#modalLayer" onclick="ctrlAct('{{ (string)$dead->_id}}','decedent/delete')" >
<img src="{{ asset('images/delete_icon.png')}}" height="18" width="18" />
<span style="display:none">{{ $i++ }}</span>
</td>
</tr>

@endforeach
</table>

</div>
</div>
</span>
</div></div></div>


<div class="modal fade" id="modalLayer" tabindex="-1" role="dialog" aria-labelledby="modalLayer">

  <div class="modal-dialog modal-sm" role="document" style="width:1000px">
    <div class="modal-content" id="LayerDiv">
      
    </div>
  </div>
</div>






<script language="javascript">
  $('#decStart, #decStart').MdPersianDateTimePicker({TargetSelector: '#decStart'});
  $('#decEnd, #decEnd').MdPersianDateTimePicker({TargetSelector: '#decEnd'});
	
</script>
