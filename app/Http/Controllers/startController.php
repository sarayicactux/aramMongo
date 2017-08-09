<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
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
		  		return view('layouts.gust');
				
		}
		
	
	}
	public function login(){
			
	        //بررسی نام کاربری و رمز عبور وارد شده توسط مدیر
			$c_login = false;
			$msg = 'نام کاربری و رمز عبور صحیح نیست<br /> یا کاربری شما غیر فعال شده';
		    $username = $_POST['username'];
			$password = $_POST['password'];
					$rows = users::where('username', '=', $username)->where('is_active', '=', 1)->limit('1')->get();
					if ( count($rows) != 0 ){
							if ($rows[0]['password'] == $password){
									 session ( [ 
                   						 'admin' => $rows[0]
         							   ] );
									$date = Jdate::medate();
									$user = users::find($rows[0]['id']);
									$user->lastlogin_date = $date['date4'];
									$user->lastlogin_time = date('G:i:s');
									$user->save();
									
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
