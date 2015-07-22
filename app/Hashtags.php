<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Hashtags extends Model {

	protected $table = 'hashtags';


	public static function Exists($hashtag){
		$hashtag_id = DB::select('select id from hashtags where hashtag = ?',array($hashtag));
		if(count($hashtag_id)== 0) return -1;
		else return $hashtag_id[0]->id;
	}

	public static function AddHashtag($hashtag){

			$newHashtag = new Hashtags;
			$newHashtag->hashtag = $hashtag;
			$newHashtag->save();
			$hashtag_id = $newHashtag->id;
			var_dump($hashtag_id);
			return $hashtag_id;
	}

	public static function DeleteHashtag($hashtagId){
	   DB::delete('delete from hashtags where id = ?',array($hashtagId));
		
	}

}
