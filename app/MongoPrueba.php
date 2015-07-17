<?php namespace App;

use Jenssegers\MongoDB\Model as Eloquent;

class MongoPrueba extends Eloquent {

	protected $collection = 'test';
	protected $connection = 'mongodb';

}
