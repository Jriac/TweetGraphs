<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\ValidateUser;
use App\PasswordRecovery;
use Illuminate\Http\Request;
use Jenssegers\MongoDB\Model as Eloquent;

class MongoController extends Eloquent {
    
	protected $connection = 'mongodb';
    protected $dataBase = 'bootcamp';
    
    
    static public function InsertTuit($hashtag,$tuit){
        $db = $connection->selectDB($dataBase);
        $collection=$hashtag;
        
        $collectionExists = $db->collectionExists($collection);
        if (collectionExists == false) {
            db->createCollection($collection, null);
        }
		$collection->insert($tuit);
	}
    
}
?>
