<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Mongo;
use Session;
class startController extends Controller
{
    public function index(){
	
		//بررسی ورود اعضا 
		//Session::forget('admin');
		if ( Session::has('admin') ){
				$date = Jdate::medate();
			   /* $id = (string)session('admin')->_id;

		  		$db = Mongo::ConDB();
				$collection = $db->attachs;
				
				$id = (string)session('admin')->_id;
				
				$doc2 = array(
						"status" => 1,
						"att_des" => "تصویر شناسنامه",
						"name" => 'تصویر شناسنامه',
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$doc3 = array(
						"status" => 1,
						"att_des" => "تصویر گواهی فوت",
						"name" => 'تصویر گواهی فوت',
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$doc4 = array(
						"status" => 1,
						"att_des" => "تصویر نامه پزشکی قانونی",
						"name" => 'تصویر نامه پزشکی قانونی',
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$collection->insertMany( [$doc2,$doc3,$doc4] );
				
				$collection = $db->c_deaths;
				
				$doc1 = array(
						"c_death" => "ضربه جسم سخت به سر 	",
						"c_code" => 10,
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$doc2 = array(
						"c_death" => "بیماری سرطان",
						"c_code" => 11,
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$collection->insertMany( [$doc1,$doc2] );
				
				$collection = $db->drivers;
				$doc1 = array(
						"name" => "رحمن",
						"family" => "نجفی",
						"n_code" => '0621217719',
						"tel" => '9181629054',
						"status" => 1,
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$doc2 = array(
						"name" => "حسن",
						"family" => "اکبری",
						"n_code" => '06223417719',
						"tel" => '9181635054',
						"status" => 1,
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$doc3 = array(
						"name" => "سعید",
						"family" => "درویشی",
						"n_code" => '0628577719',
						"tel" => '9181602554',
						"status" => 1,
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
				$doc4 = array(
						"name" => "فرهاد",
						"family" => "زارعی",
						"n_code" => '0531217459',
						"tel" => '9102149054',
						"status" => 1,
						"user_id" => new \MongoDB\BSON\ObjectID($id),
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
					);
					
				$collection->insertMany( [$doc1,$doc2,$doc3,$doc4] );*/
			return view('layouts.admins',array('date'=>Jdate::fn($date['date4'])));
		}
		else {
				/*$date = Jdate::medate();
				
		  		$db = Mongo::ConDB();
				$collection = $db->users;
				$doc1 = array(
						"status" => 1,
						"att_des" => "تصویر کارت ملی",
						"name" => 'تصویر کارت ملی',
						"user_id" => '123456',
						"regdate" =>  date('G:i:s'),
						"hregdate" => $date['date4'],
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
	public function logOut(){
			Session::forget('admin');
			return redirect(action('startController@index'));
	}
}
