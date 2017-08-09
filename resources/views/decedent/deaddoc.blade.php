<?php $fn = new App\Http\Controllers\Jdate ?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLayer"> فایل های الصاقی</h4>
      </div>
	  <div style="padding:6px">
<legend class="form">مشخصات متوفی</legend>	
<table width="98%" dir="rtl"  class="table  table-striped table-condensed  table-hover">
<tr>
<td id="td3" width="10%">نام </td>
<td class="td">{{ $inf->name }}</td>
<td id="td3">نام خانوادگی</td>
<td class="td">{{ $inf->family}}</td>
<td id="td3">نام پدر</td>
<td class="td">{{ $inf->f_name}}</td>
<td id="td3">شماره شناسنامه</td>
<td class="td">{{ $fn->fn($inf->b_num)}}</td>
<td id="td3">شماره ملی</td>
<td class="td">{{ $fn->fn($inf->n_code)}}</td>
</tr>
<tr>
<td id="td3">ملیت</td>
<td class="td">{{ $fn->fn($inf->nationality)}}</td>
<td id="td3" width="15%">محل صدور شناسنامه</td>
<td class="td">{{ $fn->fn($inf->b_location)}}</td>
<td id="td3">شماره تماس</td>
<td class="td">{{ $fn->fn($inf->tel)}}</td>
<td id="td3">تلفن همراه</td>
<td class="td">{{ $fn->fn($inf->mobile)}}</td>
<td id="td3">شماره ثبت دفتری</td>
<td class="td">{{ $fn->fn($inf->reg_num)}}</td>
</tr>
</table>

<div dir="rtl" id="tombInfView" style="width:100%">
<table dir="rtl" width="95%">
<tr>
<td width="50%"><div class="portlet-title"> 
	   <div class="myTitle">
			لیست فایل های ارسال شده
		</div>
	</div>
	<table align="center" dir="rtl"  class="table  table-striped table-condensed  table-hover">
		<tr>
		<td id="td3" width="5%" >ردیف</td>
		<td id="td3" align="right" width="35%">نوع فایل</td>
		<td id="td3" align="right" width="50%">مشاهده</td>
		<td id="td3" align="center" width="5%">حذف</td>
		</tr>		
		@for ( $i = 0 ; $i < count($deaddoc); $i++ )
			<tr>
		<td id="td3" align="right">{{ $fn->fn($i+1) }}</td>
		<td class="td" align="right">
		{{
		App\Models\attachs::find($deaddoc[$i]['att_id'])->name }}
		</td>
		<td class="td" align="right">
		<a href="/file/{{ $deaddoc[$i]['f_url']}}" target="_blank"><img src="{{ asset('images/doc.png') }}" height="42" width="42" /></a>
		</td>
		<td style="cursor:pointer" onclick="ctrlAct('{{ $deaddoc[$i]['id']}}','decedent/deleteAttach')" >
<img src="{{ asset('images/delete_icon.png')}}" height="18" width="18" />
</td>
		</tr>	
		@endfor
		</table>
	</td>
<td width="35%" valign="middle">
<div align="center" style="width:100%" id="regButtonLayer">
					<table align="center" dir="rtl" >
<tr>
<td class="td">
<button class="btn btn-primary" onclick="
$('#deaddoc_id').val('0');
$('#att_id option[value=1]').attr('selected','selected');
$('#newFormLayer').slideDown(300);
$('#regButtonLayer').slideUp(300);
">ارسال فایل جدید</button>
</td></tr></table>

</div>


		
		<div align="center" class="form" id="newFormLayer" style="width:95%;display:none;">
		<div class="panel-body" id="replyDiv">
 			
			<fieldset>
                <legend><span>نوع فایل الصاقی</span></legend>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group" style="width:130px;">
						<select id="att_id"  class="select2_category form-control">
@for( $i = 0;$i < count($attachs);$i++ ) 

<option value="{{ $attachs[$i]['id'] }}">{{ $attachs[$i]['name'] }}</option>
@endfor
</select>
                           
                        </div>
                    </div>
                   
                </div>
            </fieldset>
			<fieldset>
                <legend><span>انتخاب فایل</span></legend>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group" style="width:130px;">
					<input id="image_file2"	onchange="ajaxFileUpload('{{ asset('doajaxfileupload2.php')}}' , 'image_file2' ,'msg_id2' , 'image_check2' )" type="file" size="30" name="image_file2" > 
					 <input type="hidden" value="0" id="image_check2" /><span id="msg_id2" style="color:red" class="span">
		<br />حداکثر حجم فایل 1000 کیلوبایت<br /></span>
		<label id="show_img2" style="color:red"></label>
                           
                        </div>
                    </div>
                   
                </div>
            </fieldset>
			
			         		
            
            <div align="left" style="padding-left:10px">
			<button class="btn btn-circle yellow"  onclick="

$('#editFormLayer').slideUp(300);
$('#newFormLayer').slideUp(300);
$('#regButtonLayer').slideDown(300);
">&nbsp;&nbsp;انصراف&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button"     class="btn btn-primary" onclick="sendDeadDoc($('#att_id').val(),'{{ $inf->id}}')">ثبت اطلاعات</button></div>
        </div>
			
		</div>
		


</td></tr></table>	

</div></div>
<input   name="fileName"  id="fileName" type="hidden" />










