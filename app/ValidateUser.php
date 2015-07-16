<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class ValidateUser extends Model {

	protected $table = 'validate_users';

	static public function ValidationComplete($hash){
		$mail = DB::select('select mail from validate_users where hash = ?',array($hash));
		$mail = $mail[0]->mail;
		DB::delete('delete from validate_users where mail = ? and hash = ?',array($mail,$hash));
		return $mail;
	}
}
