<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use Abraham\TwitterOAuth\TwitterOAuth;

define("CONSUMER_KEY","tLuTNOxqhuKTjNdRxWX5NCo1H");
define("CONSUMER_KEY_SECRET","91159vpI0X4GQk8vGhZS7YGdZ0QxOCqyLzOvp3C353N4D2siTy");
define("ACCES_TOKEN","454316202-8ccRxNhvOlRoLuShablwFNNNAKFM6u9vlxDs0p71");
define("ACCES_TOKEN_SECRET","Y5MQuNe5WlFoSWKi4T2mjKvX5Mnw3rnzzutlgUwDdvs8t");

class Trends extends Controller {

	private $connection;


	private function SaveTrends($WOEID,$setName){
		$trends = $this->connection->get("trends/place", array("id" => $WOEID));
		$trends = $trends[0]->trends;
		$trendsArray = array();
		foreach ($trends as $trend) {
			$trend = $trend->name;
			array_push($trendsArray, $trend);
		}
		return json_encode($trendsArray);
	}

	public function GetTrends(){
		$this->connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_KEY_SECRET, ACCES_TOKEN, ACCES_TOKEN_SECRET);
		$this->SaveTrends("1","Global"); //World Trends
		return $this->SaveTrends("753692","Barcelona"); //Barcelona Trends
		$this->SaveTrends("754542","Bilbao"); //Bilbao Trends
		$this->SaveTrends("766273","Madrid"); //Madrid Trends
		$this->SaveTrends("774508","Sevilla"); //Sevilla Trends
		$this->SaveTrends("773418","Donostia"); //Donostia Trends
		$this->SaveTrends("763246","A Corunha"); //A Corunha Trends
		$this->SaveTrends("765099","Leon"); //Leon Trends
		$this->SaveTrends("773964","Santander"); //Santander Trends*/

	}


}