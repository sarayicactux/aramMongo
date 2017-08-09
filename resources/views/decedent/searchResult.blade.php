<?php $fn = new App\Http\Controllers\Jdate ?>
<div class="portlet box blue">
  <div class="portlet-title"> 
	   <div class="caption">
		تعداد لیست : {{ $fn->fn(count($decedent))}} مورد
		</div>
	</div>	
  	
<div style="width:100%; height:300px; overflow:auto;background:#FFFFFF;">
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
@for ($i = 0; $i < count($decedent); $i++ )
<tr align="center">
<td >{{ $fn->fn($i+1)}}</td>
<td >@if( $decedent[$i]->gender == '1') مرد @else زن @endif</td>
<td >{{ $decedent[$i]->name.' '.$decedent[$i]->family}}</td>
<td >{{ $fn->fn($decedent[$i]->n_code)}}</td>
<td >{{ $fn->echo_date($decedent[$i]->d_date)}}</td>
<td >{{ $fn->fn($decedent[$i]->reg_num)}}</td>
<td >{{ $fn->echo_date($decedent[$i]->int_date)}}</td>
<td style="cursor:pointer"   data-toggle="modal" data-target="#modalLayer" onclick="ctrlAct('{{ $decedent[$i]->id}}','decedent/attachs')">
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
<td  style="cursor:pointer"  data-toggle="modal" data-target="#modalLayer" onclick="ctrlAct('{{ $decedent[$i]->id}}','decedent/edit')" >
<img src="{{ asset('images/1edit.png')}}" height="18" width="18" />
</td>
<td  style="cursor:pointer"  data-toggle="modal" data-target="#modalLayer" onclick="ctrlAct('{{ $decedent[$i]->id}}','decedent/delete')" >
<img src="{{ asset('images/delete_icon.png')}}" height="18" width="18" />

</td>
</tr>
@endfor
</table>
</div>
</div>