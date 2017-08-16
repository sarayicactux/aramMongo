<?php $fn = new App\Http\Controllers\Jdate ?>
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
<td style="cursor:pointer"   data-toggle="modal" data-target="#modalLayer" onclick="ctrlAct('{{ (string)$dead->_id}}','decedent/attachs')">
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