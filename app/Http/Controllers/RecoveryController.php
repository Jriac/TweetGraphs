<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RecoveryController extends Controller {

	static function MailSent($mail,$hash){
		$recovery = new PasswordRecovery;
		$recovery->mail = $mail;
		$recovery->hash = $hash;
		$recovery->save();
	}

}
