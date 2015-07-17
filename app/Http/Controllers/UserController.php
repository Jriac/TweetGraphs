<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\ValidateUser;

use Illuminate\Http\Request;


class UserController extends Controller {

	private function AddToUsers($mail,$password,$name){

		$value = User::Exists($mail);

		if($value == -1){

			$user = new User;
			$user->mail = $mail;
			$user->password = $password;
			$user->name = $name;
			$user->save();
			$validate = new ValidateAccountEmail;
			$validate ->sendEmail($user->mail);
			return true;
		}

		else return false;
	}

	private function CryptPassword($password){
		if (defined('CRYPT_BLOWFISH') && CRYPT_BLOWFISH) {
            return crypt($password, '$2y$07$esteesuntextoaleatoreo$');
        }
	}

	private function RegisterResponse($res){
		if($res){
		   return ResponseController::CreateJSON("YES","ADDED","USER ADDED TO DB CORRECTLY");	
		}
		else return ResponseController::CreateJSON("NO","USER EXISTS","USER ALREADY EXISTS IN DB");	
	}


	public function RegisterUser(){

		$mail = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
/*        $password = $this->CryptPassword($password);
        $result = $this->AddToUsers($mail,$password,$name);*/
        $response = $this->RegisterResponse(false);

        return response()->json($response);

	}

	private function IsValidUser($mail,$password){
		$user_id = User::Exists($mail);

		if($user_id == -1){
			return false;
		}

		else{
			return User::CheckPassword($user_id,$password);
		}
	}

	private function LogInResponse($res){
		if($res){
		   return ResponseController::CreateJSON("YES","LOGGED IN","USER LOGGED IN CORRECTLY");	
		}
		else return ResponseController::CreateJSON("NO","ERROR","WRONG MAIL OR PASSWORD");	
	}

	public function LogIn(){
		$mail = $_POST['email'];
        $password = $_POST['password'];
        $password = $this->CryptPassword($password);
        $result = $this->IsValidUser($mail,$password);
        $response = $this->LogInResponse($result);

        return response()->json($response);
	}




}
