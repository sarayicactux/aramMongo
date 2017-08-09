<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
	public function decedent(){ 
			return $this->hasMany('app\models\decedent');
	}
	public function drivers(){ 
			return $this->hasMany('app\models\drivers');
	}
	public function c_death(){ 
			return $this->hasMany('app\models\c_death');
	}
}
