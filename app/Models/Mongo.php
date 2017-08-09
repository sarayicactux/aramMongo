<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mongo extends Model
{
    public static function ConDB(){
			$client = new \MongoDB\Client("mongodb://localhost:27017");
			$db = $client->aramestan;
			return $db;
	}
}
