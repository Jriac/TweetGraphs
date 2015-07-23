<?php namespace App\Http\Controllers;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use  Elasticsearch\Client as Es;
use Illuminate\Http\Request;
use Input;
class ElasticquerysController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//$trends="thankyou1dfor";
		$trends= $name = Input::get('trending');
      $phpArray = '{
  "aggs": {
    "tweets": {
      "filter": {
        "term": {
          "tweet.entities.hashtags.text": "'.$trends.'"
        }
      },
      "aggs": {
        "histotweets": {
          "histogram": {
            "field": "tweet.created_at",
            "interval": 360000
          }
        }
      }
    }
  },
  "size": 0
}';
      $searchParams['index'] = 'tweetindex';
      $searchParams['size'] = 0;
      $searchParams['body']= $phpArray;
      $es=new ES();
      $result = $es->search($searchParams);
    //  Storage::disk('local')->put('graphic.json',json_encode($result["aggregations"]['tweets']['histotweets']['buckets']));
return response()->json( $result["aggregations"]['tweets']['histotweets']['buckets']);






	}
	}
