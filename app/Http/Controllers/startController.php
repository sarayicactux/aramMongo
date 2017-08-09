<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Mongo;
use Session;
class startController extends Controller
{
    public function index(){
	
	//	unset($_SESSION['admin']);
		//بررسی ورود اعضا 
		//Session::forget('admin');
		if ( Session::has('admin') ){
			$date = Jdate::medate();
			return view('layouts.admins',array('date'=>Jdate::fn($date['date4'])));
		}
		else {
		  		$client = new \MongoDB\Client("mongodb://localhost:27017");
				$db = $client->aramestan;
				$collection = $db->users;
				/*$doc = array(
						"name" => "محمد",
						"family" => "سرایی",
						"username" => 'admin',
						"password" => '123456',
						"mobile" => '09182861738',
						"role_id" => 0,
						"email" => 'sarayi@gmail.com',
						"is_active" => 1,
						"login" => array( "lastlogin_date " => '1', "lastlogin_time" => '1'),
					);
				$collection->insertOne( $doc );/*
				$update = array( '$set' => array('password' => "147258"));
				$where = array('username' => 'admin');
				$collection -> updateOne($where,$update);*/
		  		return view('layouts.gust');
				
				//return view('layouts.gust');
				
		}
		
	
	}
	public function login(){
			
	        //بررسی نام کاربری و رمز عبور وارد شده توسط مدیر
			$c_login = false;
			$msg = 'نام کاربری و رمز عبور صحیح نیست<br /> یا کاربری شما غیر فعال شده';
		    $username = $_POST['username'];
			$password = $_POST['password'];
			$db = Mongo::ConDB();
			$collection = $db->users;
			$where = array('username'=>$username);
			$rows = $collection->findOne( $where );
			
					if ( count($rows) != 0 ){
							if ($rows->password == $password){
									 session ( [ 
                   						 'admin' => $rows
         							   ] );
									$date = Jdate::medate();
									$id = (string)$rows->_id;
									$update = array( '$set' => array('login'=>array('lastlogin_date' => $date['date4'],'lastlogin_time' =>  date('G:i:s'))));
									$where = array('_id' => new \MongoDB\BSON\ObjectID($id));
									$collection -> updateOne($where,$update);
									
									
									$c_login = true;	
									$msg     = '';
									//html::regLogs('ورود به نرم افزار','ورود به نرم افزار',$date);
							}	
									
					}
			echo json_encode( array(
					'status'   => $c_login,
					'error'    => $msg			
			
			));			
	
	}
}
