<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class UserHashtags extends Model {

	protected $table = 'user_hashtags';

	public static function AddUserHashtag ($hashtag,$userId){
		$hashtagId = Hashtags::Exists($hashtag);
		if($hashtagId == -1){
			$hashtagId = Hashtags::AddHashtag($hashtag);
		}

		$newUserHashtag = new UserHashtags;
		$newUserHashtag->user_id = $userId;
		$newUserHashtag->hashtag_id = $hashtagId;
		$newUserHashtag->save();	
	}

	public static function DeleteUserHashtag ($hashtag,$userId){
		$hashtagId = Hashtags::Exists($hashtag);
		$numRefs = DB::select('select count(*) as count from user_hashtags where hashtag_id = ?', array($hashtagId));
		$numRefs = $numRefs[0]->count;
		if($numRefs == 1){
			Hashtags::DeleteHashtag($hashtagId);
		}

		DB::delete('delete from user_hashtags where user_id = ? and hashtag_id = ?',array($userId,$hashtagId));
	}

	public static function GetHashtagID($userId){
		$idArray = DB::select('select hashtag_id as id from user_hashtags where user_id = ?',array($userId));
		$long = count($idArray);
		for ($i=0; $i < $long ; $i++) { 
			$idArray[$i] = $idArray[$i]->id;
		}
		return $idArray;
	}


}
