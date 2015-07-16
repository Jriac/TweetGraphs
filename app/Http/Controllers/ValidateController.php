<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ValidateUser;
use App\User;

class ValidateController extends Controller {

	static function MailSent($mail,$hash){
		$user = new ValidateUser;
		$user->mail = $mail;
		$user->hash = $hash;
		$user->save();
	}

	static function ValidarUser($hash){
		$mail = ValidateUser::ValidationComplete($hash);
		User::UpdateAsActive($mail);
	}

}
