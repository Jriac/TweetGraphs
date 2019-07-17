<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PasswordRecovery extends Model {

	protected $table = 'password_recoveries';

	static public function RecoverUsed($hash){
		$mail = DB::select('select mail from password_recoveries where hash = ?',array($hash));
		$mail = $mail[0]->mail;
		DB::delete('delete from password_recoveries where mail = ?',array($mail));
		return $mail;
	}

}
