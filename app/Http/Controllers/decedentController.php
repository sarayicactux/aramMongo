<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\decedent;
use App\Models\c_death;
use App\Models\drivers;
use App\Models\attachs;
use App\Models\attachments;
use App\Models\Mongo;
use Illuminate\Support\Facades\DB;

class decedentController extends Controller
{
    //
	public function addDead(){
			
		 $date = Jdate::medate();
		 $staD = $date['ymd']['y'].'01'.'01';
		 $endD = $date['ymd']['y'].'12'.'30';
		 $db = Mongo::ConDB();
		 $collection = $db->drivers;
		 $where = array('status'=>1);
		 $buffer = $collection->find( $where );
		 $drivers = array();
		 $i = 0;
		foreach ($buffer as $diriver) {
			$drivers[$i]['name']   = $diriver->name;
			$drivers[$i]['family'] = $diriver->family;
			$drivers[$i]['id']     =(string)$diriver->_id;
			$i++;
		}
		

		
		 $collection = $db->decedents;
	     $where = array('regdate'=>array('$gt'=>$staD,'$lt'=>$endD));
		 $sort  = array('_id',-1);
		 $buffer = $collection->findOne( $where,$sort  );
		 $buffer = array();
			if (count($buffer) == 0 ){
			  $regNum	 = 1;
			}
			else {
			  $regNum = $buffer->reg_num + 1;
			}
		
		 $collection = $db->c_deaths;
		 $buffer = $collection->find();
		 $c_death = array();
		 $i = 0;
		foreach ($buffer as $cdeath) {
			$c_death[$i]['c_code']   = $cdeath->c_code;
			$c_death[$i]['c_death'] = $cdeath->c_death;
			$c_death[$i]['id']     =(string)$cdeath->_id;
			$i++;
		}
		
		 return view('decedent.addDead', compact('regNum', 'drivers', 'c_death' ));
		  
	}
	
	public function cregNum(){
			$date = Jdate::medate();
			$staD = $date['ymd']['y'].'01'.'01';
		 	$endD = $date['ymd']['y'].'12'.'30';
			$regNum = $_POST['regNum'];
			$where = array('$and'=>array(array('int_date'=>array('$gt'=>$staD,'$lt'=>$endD)),array('reg_num'=>$regNum)));
			$db = Mongo::ConDB();
		    $collection = $db->decedents;
			$inf = $collection->findOne($where);
			//print_r($inf);
			if ( count($inf) == 0 ){
					$msg =  '';
					$status = true;
			}
			else {
					$msg = 'شماره ثبت دفتری وارد شده تکراری است';
					$status = false;
			}
			echo json_encode(	array('status'=>$status,'msg'=>$msg)); 	
	}
	public function decsave()	{
		
		decedent::decsaveMongo($_POST);	
		
	}
	public function decList() 	{
			$db = Mongo::ConDB();
			$collection = $db->decedents;
			$where = array();
			$options = array('sort'=>array('_id'=> -1 ),'limit'=>150);
			//$options = ['sort' => ['_id' => -1], 'limit' => 150];
			$decedent = $collection->find($where,$options);
			$num = $collection->count();
			$listNum = $collection->count($where,$options);
			 return view('decedent.decList', compact('decedent','num','listNum'));
		
	}
	public function searchDec(){
		$db = Mongo::ConDB();
		$collection = $db->decedents;
		$num = $collection->count();
	  	$gender   = $_POST['gender'];
		$wcolumn  = $_POST['wcolumn'];
		$orderBy = explode('@',$_POST['orderBy']);
		$val = $orderBy[1];
		$sT = 1;
		if ($val == '2')$sT = -1;
		$options = array('sort'=>array($orderBy[0]=> $sT ),'limit'=>550);
		//print_r($options);exit;
		$verb     = $_POST['verb'];

	
				 $sverb =array($wcolumn => array('$regex'=>$verb));
			
		
		$decStart = $_POST['decStart'];
		$start = array("int_date"=> array('$gt'=>1));
		if ( $decStart != ''  ){
				$decStart  = explode('/',$decStart);
				$intD = $decStart[0].$decStart[1].$decStart[2];
				$intD = $intD*1;
				$start = array("int_date"=> array('$gt'=>$intD));
				
		}
		$decEnd = $_POST['decEnd'];
		$end = array("int_date"=> array('$lt'=>139601011));
		if ( $decEnd != ''  ){
				$decEnd  = explode('/',$decEnd);
				$intD = $decEnd[0].$decEnd[1].$decEnd[2];
				$intD = $intD*1;
				$end = array("int_date"=> array('$lt'=>$intD));
		}
	
		if ( $gender == '0' ){
			$where = array('$and'=>array($sverb,$start,$end));
			$decedent = $collection->find($where,$options);
			$listNum = $collection->count($where,$options);
			              
		
		}
		else  {
			
			$where = array('$and'=>array(array('gender'=>$gender),$sverb,$start,$end));
			$decedent = $collection->find($where,$options);
			$listNum = $collection->count($where,$options);
		
		}
		 return view('decedent.searchResult', compact('decedent','listNum'));
	}
	public function attachs(){
			$inf = decedent::find($_POST['tId']);
			$attachs = attachs::where('status', '=', 1)->get();
			
			$deaddoc = attachments::where('d_id', '=', $_POST['tId'])->get();
			
			return view('decedent.deadDoc', compact('inf', 'attachs', 'deaddoc' ));
	}
	public function SendDeadDoc(){
			
				attachments::saveAttachment($_POST);	
								
			
	}
	public function deleteAttach(){
			
			$deaddoc  = attachments::find($_POST['tId']);
			$filename = $deaddoc->f_url;
			$d_id     = $deaddoc->d_id;
			$deaddoc->delete();
			
		
			unlink ('file/'.$filename);
			
			$inf = decedent::find($d_id);
			$attachs = attachs::where('status', '=', 1)->get();
			
			$deaddoc = attachments::where('d_id', '=', $d_id)->get();
			
			return view('decedent.deadDoc', compact('inf', 'attachs', 'deaddoc' ));
			
	}
	public function edit(){ 
		$db = Mongo::ConDB();
		$collection = $db->decedents;
		$inf     =  $collection->findOne(array('_id'=> new \MongoDB\BSON\ObjectID($_POST['tId'])));
		
		 $collection = $db->drivers;
		 $where = array('status'=>1);
		 $buffer = $collection->find( $where );
		 $drivers = array();
		 $i = 0;
		foreach ($buffer as $diriver) {
			$drivers[$i]['name']   = $diriver->name;
			$drivers[$i]['family'] = $diriver->family;
			$drivers[$i]['id']     =(string)$diriver->_id;
			$i++;
		}
		
		 $collection = $db->c_deaths;
		 $buffer = $collection->find();
		 $c_death = array();
		 $i = 0;
		foreach ($buffer as $cdeath) {
			$c_death[$i]['c_code']   = $cdeath->c_code;
			$c_death[$i]['c_death'] = $cdeath->c_death;
			$c_death[$i]['id']     =(string)$cdeath->_id;
			$i++;
		}
		
		return view('decedent.editDec', compact('inf', 'drivers', 'c_death' ));
		
	 
	}
	public function decEdit()	{
		echo json_encode(	decedent::EditDec($_POST));	
		
	}
	public function decEditMongo()	{
		echo json_encode(	decedent::EditDecMongo($_POST));	
		
	}
	public function delete(){
				
				$db = Mongo::ConDB();
				$collection = $db->decedents;
				$inf     =  $collection->findOne(array('_id'=> new \MongoDB\BSON\ObjectID($_POST['tId'])));
				return view('decedent.decDel', compact('inf'));
			
	}
	public function deleteDec(){
			//$this->actionTombDelete();
			$db = Mongo::ConDB();
			$collection = $db->decedents;
			$collection->deleteOne(array('_id'=> new \MongoDB\BSON\ObjectID($_POST['id'])));
			
			
			
			

	}
}
