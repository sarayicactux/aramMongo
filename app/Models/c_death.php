<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class c_death extends Model
{
    //
	public function decedent(){ 
			return $this->hasMany('app\models\decedent');
	}
	public function users(){
			return $this->belongsTo('app\models\users');
	}
}
