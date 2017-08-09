<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Jdate;

class attachments extends Model
{
    public static  function saveAttachment($arr){
			$status = false;
			
			$regdateArr = Jdate::regDate(); 
			$regdate    = $regdateArr[1];
			$hregdate   = $regdateArr[2];
			
			
			$attachments = new self;
			$attachments->att_id      = $arr['att_id'];
			$attachments->d_id        = $arr['id'];
			$attachments->f_url       = $arr['fileName'];
			$attachments->hregdate    = $hregdate;
			$attachments->regdate     = $regdate;
			$attachments->user_id     = session('admin')['id'];
			
			if ($attachments->save())$status = true;
			return array(
					'status'   => $status,
					//'error'    => $attachments->getErrors(),	
			
			);
	}
}
