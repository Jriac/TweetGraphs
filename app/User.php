<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	static public function Exists($mail){
		$user_id = DB::select('select id from users where mail = ?',array($mail));
		if(count($user_id)== 0) return -1;
		else return $user_id[0]->id;
	}
	
	static public function UpdateAsActive($mail){
		DB::update('update users set status = ? where mail = ?',array('active',$mail));
		$user_id = DB::select('select id from users where mail = ?',array($mail));
		return $user_id;

	}

	static public function UpdatePassword($mail,$password){
		DB::update('update users set password = ? where mail = ?',array($password,$mail));
	}


	static public function CheckPassword($id,$password){
		$user = User::find($id);
		if(crypt($password, $user->password) == $user->password){
			return true;
		} 
		else return false;
		
	}
}
