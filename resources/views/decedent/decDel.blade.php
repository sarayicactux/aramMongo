<?php $fn = new App\Http\Controllers\Jdate ?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLayer">حذف اطلاعات متوفی</h4>
      </div>
	  <div style="padding:6px">
<div align="right" class="form" style="height:300px;overflow:auto;">
<legend class="form">مشخصات متوفی</legend>	
<table width="100%" dir="rtl">
<tr>
<td id="td3" width="10%">نام و نام خانوادگی</td>
<td class="td">{{$inf->name.' '.$inf->family  }}</td>
<td id="td3">شماره ثبت دفتری</td>
<td class="td">{{$fn->fn($inf->reg_num)  }}</td>
<td id="td3">نام پدر</td>
<td class="td">{{$inf->f_name  }}</td>
<td id="td3">شماره شناسنامه</td>
<td class="td">{{$fn->fn($inf->b_num)  }}</td>
<td id="td3">شماره ملی</td>
<td class="td">{{$fn->fn($inf->n_code)  }}</td>
</tr>
<tr>
<td id="td3">ملیت</td>
<td class="td">{{$fn->fn($inf->nationality)  }}</td>
<td id="td3">محل صدور شناسنامه</td>
<td class="td">{{$fn->fn($inf->b_location)  }}</td>
<td id="td3">شماره تماس</td>
<td class="td">{{$fn->fn($inf->tel)  }}</td>
<td id="td3">تلفن همراه</td>
<td class="td">{{$fn->fn($inf->mobile)  }}</td>
<td id="td3">کد پستی</td>
<td class="td">{{$fn->fn($inf->zipcode)  }}</td>
</tr>
</table>



<div dir="rtl" id="bank_fInfView" style="width:100%">
<div class="portlet box blue center_table" style="width:100%">
  <div class="portlet-title"> 
	   <div class="caption">
		تاییدیه حذف
		</div>
	</div>

<table align="center" dir="rtl"  class="table  table-striped table-condensed  table-hover">
		<tr>
		<td id="td3" align="center">
	<strong>
	آیا برای حذف متوفی با مشخصات بالا اطمینان دارید؟<br />
	در صورت حذف متوفی کلیه اطلاعات مربوط به متوفی حذف خواهد شد<br />
	</strong>
	
	</td></tr></table>

</div>
<div align="center" style="width:100%"><br />
<button onclick="deleteDec('{{$inf->id }}');" class="btn btn-primary">حذف اطلاعات متوفی</button>
</div>
</div>
</div>
<div class="form-section caption-subject font-red-sunglo" id="m_ch" style="color:#FF0000"></div>
</div>