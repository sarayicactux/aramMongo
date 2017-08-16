<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\c_death; 

use App\Models\Mongo;

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
		public static  function decsaveMongo($arr){
			$status = false;
			$c_d = new c_death;
			$db = Mongo::ConDB();
			$collection = $db->c_deaths;
			$where = array('_id' => new \MongoDB\BSON\ObjectID($arr['d_reason']));
			$c_d = $collection->findOne( $where );
			$regdateArr = Jdate::regDate(); 
			$regdate    = $regdateArr[1];
			$hregdate   = $regdateArr[2];
			$b_date    = explode('/',$arr['b_date']);
			$d_date    = explode('/',$arr['d_date']);
			$int_date  = explode('/',$arr['int_date']);
			
			$decedent = array(
			"gender"=> $arr['gender'],
			"name"=> $arr['name'],
			"family"=> $arr['family'],
			"f_name"=> $arr['f_name'],
			"m_name"=> $arr['m_name'],
			"nationality"=> $arr['nationality'],
			"n_code"=> $arr['n_code'],
			"b_num"=> $arr['b_num'],
			"b_location"=> $arr['b_location'],
			"sh_serial"=> $arr['sh_serial'],
			"sh_series"=> $arr['sh_series'],
			"b_date"=> $b_date[0].$b_date[1].$b_date[2],
			"age"=> $arr['age'],
			"job"=> $arr['job'],
			"tel"=> $arr['tel'],
			"mobile"=> $arr['mobile'],
			"addr"=> $arr['addr'],
			"zipcode"=> $arr['zipcode'],
			"d_date"=> $d_date[0].$d_date[1].$d_date[2],
			"d_date_status"=> $arr['d_date_status'],
			"int_date"=> intval($int_date[0].$int_date[1].$int_date[2]),
			"d_place"=> $arr['d_place'],
			"d_reason"=> $c_d->c_death,
			"death_id"=> $arr['d_reason'],
			"disease"=> $arr['disease'],
			"hos_dc"=> $arr['hos_dc'],
			"fridge_num"=> $arr['fridge_num'],
			"burial"=> $arr['burial'],
			"burial_p"=> $arr['burial_p'],
			"driver"=> $arr['driver'],
			"add_txt"=> $arr['add_txt'],
			"reg_num"=> $arr['reg_num'],
			"discription"=>$arr['discription'],
			"age_type"    => 1,
			"is_sh"       => 1,
			"hregdate"    => $hregdate,
			"regdate"     => intval($regdate),
			"user_id"     => (string)session('admin')->_id,
			);
			$collection = $db->decedents;
			$collection->insertOne( $decedent );
		
			return array(
					'status'   => $status,
					//'error'    => $decedent->getErrors(),	
			
			);
	}
		public static  function EditDecMongo($arr){
			$status = false;
			$c_d = new c_death;
			$db = Mongo::ConDB();
			$collection = $db->c_deaths;
			$where = array('_id' => new \MongoDB\BSON\ObjectID($arr['d_reason']));
			$c_d = $collection->findOne( $where );
			$regdateArr = Jdate::regDate(); 
			$regdate    = $regdateArr[1];
			$hregdate   = $regdateArr[2];
			$b_date    = explode('/',$arr['b_date']);
			$d_date    = explode('/',$arr['d_date']);
			$int_date  = explode('/',$arr['int_date']);
			
			$decedent = array(
			"gender"=> $arr['gender'],
			"name"=> $arr['name'],
			"family"=> $arr['family'],
			"f_name"=> $arr['f_name'],
			"m_name"=> $arr['m_name'],
			"nationality"=> $arr['nationality'],
			"n_code"=> $arr['n_code'],
			"b_num"=> $arr['b_num'],
			"b_location"=> $arr['b_location'],
			"sh_serial"=> $arr['sh_serial'],
			"sh_series"=> $arr['sh_series'],
			"b_date"=> $b_date[0].$b_date[1].$b_date[2],
			"age"=> $arr['age'],
			"job"=> $arr['job'],
			"tel"=> $arr['tel'],
			"mobile"=> $arr['mobile'],
			"addr"=> $arr['addr'],
			"zipcode"=> $arr['zipcode'],
			"d_date"=> $d_date[0].$d_date[1].$d_date[2],
			"d_date_status"=> $arr['d_date_status'],
			"int_date"=> intval($int_date[0].$int_date[1].$int_date[2]),
			"d_place"=> $arr['d_place'],
			"d_reason"=> $c_d->c_death,
			"death_id"=> $arr['d_reason'],
			"disease"=> $arr['disease'],
			"hos_dc"=> $arr['hos_dc'],
			"fridge_num"=> $arr['fridge_num'],
			"burial"=> $arr['burial'],
			"burial_p"=> $arr['burial_p'],
			"driver"=> $arr['driver'],
			"add_txt"=> $arr['add_txt'],
			"reg_num"=> $arr['reg_num'],
			"discription"=>$arr['discription'],
			"age_type"    => 1,
			"is_sh"       => 1,
			"hregdate"    => $hregdate,
			"regdate"     => intval($regdate),
			"user_id"     => (string)session('admin')->_id,
			);
			$collection = $db->decedents;
			$where = array('_id' => new \MongoDB\BSON\ObjectID($arr['id']));
			$update = array('$set'=>$decedent);
			$collection->updateOne( $where,$update );
		
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
