<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ResponseController extends Controller {

	static public function CreateJSON($success,$msg,$body){
		$JSON = array('header'=>array(array('success'=>$success,'msg'=>$msg)),'body'=>array($body));
			
		return $JSON;
	}

}
