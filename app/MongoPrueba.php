<?php namespace App;

use Jenssegers\MongoDB\Model as Eloquent;

class MongoPrueba extends Eloquent {

	protected $connection = 'mongodb';
    //protected $collection = 'bootcamp';
    
    $db = $connection->selectDB("bootcamp");
    $collections= %db->listCollections();
    
    
    static public function InsertTuit($hashtag,$tuit){
        //if($db.getCollection($hashtah)==false)
            $db->createCollection(
                $hashtag,
                array(
                'capped'=> false
                )
            );
		$collection->insert($tuit);
	}
    
    static public function AddTuitToHashtagCollection($hastag,$tuit){
          
    }
}

?>
