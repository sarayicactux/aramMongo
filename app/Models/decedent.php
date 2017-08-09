<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\c_death; 

use App\Http\Controllers\Jdate;

class decedent extends Model
{
		public function drivers(){
				return $this->belongsTo('app\models\drivers');
		}
		public function c_death(){
				return $this->belongsTo('app\models\c_death');
		}
		public function users(){
				return $this->belongsTo('app\models\users');
		}
		public static  function decsave($arr){
			$status = false;
			$c_d = new c_death;
			$c_d = c_death::find($arr['d_reason']);
			$regdateArr = Jdate::regDate(); 
			$regdate    = $regdateArr[1];
			$hregdate   = $regdateArr[2];
			$b_date    = explode('/',$arr['b_date']);
			$d_date    = explode('/',$arr['d_date']);
			$int_date  = explode('/',$arr['int_date']);
			
			$decedent = new self;
			$decedent->gender      = $arr['gender'];
			$decedent->name        = $arr['name'];
			$decedent->family      = $arr['family'];
			$decedent->f_name      = $arr['f_name'];
			$decedent->m_name      = $arr['m_name'];
			$decedent->nationality = $arr['nationality'];
			$decedent->n_code      = $arr['n_code'];
			$decedent->b_num       = $arr['b_num'];
			$decedent->b_location  = $arr['b_location'];
			$decedent->sh_serial   = $arr['sh_serial'];
			$decedent->sh_series   = $arr['sh_series'];
			$decedent->b_date      = $b_date[0].$b_date[1].$b_date[2];
			$decedent->age         = $arr['age'];
			$decedent->job         = $arr['job'];
			$decedent->tel         = $arr['tel'];
			$decedent->mobile      = $arr['mobile'];
			$decedent->addr        = $arr['addr'];
			$decedent->zipcode     = $arr['zipcode'];
			$decedent->d_date      = $d_date[0].$d_date[1].$d_date[2];
			$decedent->d_date_status = $arr['d_date_status'];
			$decedent->int_date    = $int_date[0].$int_date[1].$int_date[2];
			$decedent->d_place     = $arr['d_place'];
			$decedent->d_reason    = $c_d->c_death;
			$decedent->death_id    = $arr['d_reason'];
			$decedent->disease     = $arr['disease'];
			$decedent->hos_dc      = $arr['hos_dc'];
			$decedent->fridge_num  = $arr['fridge_num'];
			$decedent->burial      = $arr['burial'];
			$decedent->burial_p    = $arr['burial_p'];
			$decedent->driver      = $arr['driver'];
			$decedent->add_txt     = $arr['add_txt'];
			$decedent->reg_num     = $arr['reg_num'];
			$decedent->discription = $arr['discription'];
			$decedent->age_type    = 1;
			$decedent->is_sh       = 1;
			$decedent->hregdate    = $hregdate;
			$decedent->regdate     = $regdate;
			$decedent->user_id     = session('admin')['id'];
			
			if ($decedent->save())$status = true;
			return array(
					'status'   => $status,
					//'error'    => $decedent->getErrors(),	
			
			);
	}
		public static  function EditDec($arr){
			$status = false;
			$c_d = new c_death;
			$c_d = c_death::find($arr['d_reason']);
			$regdateArr = Jdate::regDate(); 
			$regdate    = $regdateArr[1];
			$hregdate   = $regdateArr[2];
			$b_date    = explode('/',$arr['b_date']);
			$d_date    = explode('/',$arr['d_date']);
			$int_date  = explode('/',$arr['int_date']);
			
			$decedent = decedent::find($arr['id']);
			$decedent->gender      = $arr['gender'];
			$decedent->name        = $arr['name'];
			$decedent->family      = $arr['family'];
			$decedent->f_name      = $arr['f_name'];
			$decedent->m_name      = $arr['m_name'];
			$decedent->nationality = $arr['nationality'];
			$decedent->n_code      = $arr['n_code'];
			$decedent->b_num       = $arr['b_num'];
			$decedent->b_location  = $arr['b_location'];
			$decedent->sh_serial   = $arr['sh_serial'];
			$decedent->sh_series   = $arr['sh_series'];
			$decedent->b_date      = $b_date[0].$b_date[1].$b_date[2];
			$decedent->age         = $arr['age'];
			$decedent->job         = $arr['job'];
			$decedent->tel         = $arr['tel'];
			$decedent->mobile      = $arr['mobile'];
			$decedent->addr        = $arr['addr'];
			$decedent->zipcode     = $arr['zipcode'];
			$decedent->d_date      = $d_date[0].$d_date[1].$d_date[2];
			$decedent->d_date_status = $arr['d_date_status'];
			$decedent->int_date    = $int_date[0].$int_date[1].$int_date[2];
			$decedent->d_place     = $arr['d_place'];
			$decedent->d_reason    = $c_d->c_death;
			$decedent->death_id    = $arr['d_reason'];
			$decedent->disease     = $arr['disease'];
			$decedent->hos_dc      = $arr['hos_dc'];
			$decedent->fridge_num  = $arr['fridge_num'];
			$decedent->burial      = $arr['burial'];
			$decedent->burial_p    = $arr['burial_p'];
			$decedent->driver      = $arr['driver'];
			$decedent->add_txt     = $arr['add_txt'];
			$decedent->reg_num     = $arr['reg_num'];
			$decedent->discription = $arr['discription'];
			$decedent->age_type    = 1;
			$decedent->is_sh       = 1;
			$decedent->hregdate    = $hregdate;
			$decedent->regdate     = $regdate;
			$decedent->user_id     = session('admin')['id'];
			
			if ($decedent->save())$status = true;
			return array(
					'status'   => $status,
					//'error'    => $decedent->getErrors(),	
			
			);
	}	
    //
}
