<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\ValidateUser;
use App\PasswordRecovery;
use Illuminate\Http\Request;

use App\Hashtags;
use App\UserHashtags;
use Auth;
use Input;
use Mail;

class UserController extends Controller {

	public function ValidateUser(){
		$hash = $_GET['hash'];
		$user_id = ValidateController::ValidarUser($hash);
		Auth::loginUsingId($user_id);
		return redirect('home');
	}

	private function SendValidationMail($mail){
        $to      = $mail;
        $subject = 'Correo de Activacion';
        $headers = 'From: webmaster@tweetgraphs.com' . "\r\n" .
        'Reply-To: webmaster@tweetgraphs.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n".
        'X-Mailer: PHP/' . phpversion();
        $hash = $this->CryptData($mail);

        $hash = strtr($hash, array('.' => 'z'));

        $URL = "http://bootcamp.incubio.com:8080/v1/user/activate";

        $URL = $URL."?hash=".$hash; 

    
        $message = '<div> Hola! , gracias por registrarte.
        Para terminar el registro y activar tu cuenta haz clic en el siguiente enlace
        <a href="'.$URL.'">'.$URL.'<a></div>';

        ValidateController::MailSent($mail,$hash);

        mail($to, $subject, $message, $headers);
    }

	private function AddToUsers($mail,$password,$name){

		$value = User::Exists($mail);

		if($value == -1){

			$user = new User;
			$user->mail = $mail;
			$user->password = $password;
			$user->name = $name;
			$user->save();
			$this->SendValidationMail($mail);
			return true;
		}

		else return false;
	}

	private function CryptData($data){
		if (defined('CRYPT_BLOWFISH') && CRYPT_BLOWFISH) {
			$salt = substr(base64_encode(openssl_random_pseudo_bytes('22')), 0, 22);
			$salt = strtr($salt, array('+' => '.'));
			$encripted_data = crypt($data, '$2y$10$' . $salt);
            return $encripted_data;
        }
	}

	private function RegisterResponse($res){
		if($res){
		   return ResponseController::CreateJSON("YES","ADDED","USER ADDED TO DB CORRECTLY");	
		}
		else return ResponseController::CreateJSON("NO","USER EXISTS","USER ALREADY EXISTS IN DB");	
	}


	public function RegisterUser(){

		$mail = $_POST['mail'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $password = $this->CryptData($password);
        $result = $this->AddToUsers($mail,$password,$name);
        $response = $this->RegisterResponse($result);
        return response()->json($response);

	}

	private function IsValidUser($mail,$password){
		$user_id = User::Exists($mail);
		$user = User::find($user_id);
		if($user_id == -1 or ($user->status == 'unactive') ){
			return false;
		}

		else{
			return array($user_id,User::CheckPassword($user_id,$password));
		}
	}

	private function LogInResponse($res){
		if($res){
		   return ResponseController::CreateJSON("YES","LOGGED IN","USER LOGGED IN CORRECTLY");	
		}
		else return ResponseController::CreateJSON("NO","ERROR","WRONG MAIL OR PASSWORD / USER UNACTIVE");	
	}

	public function LogIn(){
		$mail = $_POST['mail'];
        
        $password = $_POST['password'];
        $result = $this->IsValidUser($mail,$password);
        if($result[1] == true){
        	Auth::loginUsingId($result[0]);
        }
        $response = $this->LogInResponse($result[1]);

        return response()->json($response);
	}

	private function SendRecoverResponse($res,$mail){
		if($res){
		   return ResponseController::CreateJSON("YES","MAIL SENT", "RECOVERY MAIL SENT TO" . $mail);	
		}
		else return ResponseController::CreateJSON("NO","ERROR","WRONG MAIL");	
	}

	private function NewPasswordResponse($res){
		if($res){
		   return ResponseController::CreateJSON("YES","PASSWORD CHANGED", "PASSWORD UPDATED");	
		}
		else return ResponseController::CreateJSON("NO","ERROR","ERROR UPDATING PASSWORD");	
	}

	public function NewPassword(){
		$user = Auth::user();
		$new_password = $_POST['password'];
		$new_password = $this->CryptData($new_password);
		$rows_affected = User::UpdatePassword($user->mail,$new_password);
		$response;
		if($rows_affected == 1){
			$response = $this->NewPasswordResponse(true);
		}
		else $response = $this->NewPasswordResponse(false);
		return response()->json($response);

		
	}

	public function RecoverySolicited(){
		$hash = $_GET['hash'];
		$mail = PasswordRecovery::RecoverUsed($hash);
		$user_id = User::Exists($mail);
		Auth::loginUsingId($user_id);
		return redirect('/v1/user/new_password');
	}

	private function SendRecoverMail($mail){
		$to      = $mail;
        $subject = 'Recuperación de Contraseña';
        $headers = 'From: webmaster@tweetgraphs.com' . "\r\n" .
        'Reply-To: webmaster@tweetgraphs.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n".
        'X-Mailer: PHP/' . phpversion();
        $hash = $this->CryptData($mail);

        $hash = strtr($hash, array('.' => 'z'));

        $URL = "http://bootcamp.incubio.com:8080/v1/user/change_password";

        $URL = $URL."?hash=".$hash; 

    
        $message = '<div> Para recuperar tu contraseña haz clic en el siguiente enlace
        <a href="'.$URL.'">'.$URL.'<a></div>';

        RecoveryController::MailSent($mail,$hash);

        mail($to, $subject, $message, $headers);
	}

	public function SendRecoverPassword(){
		$mail = $_POST['mail'];
		$value = User::Exists($mail);
		$respuesta;
		if($value == -1){
			$respuesta = $this->SendRecoverResponse(false,$mail);
		}
		else{
			$this->SendRecoverMail($mail);
			$respuesta = $this->SendRecoverResponse(true,$mail);
		}
		return response()->json($respuesta);
	}

	private function NewHashtags($originalHashtags,$modifiedHashtags){
		$nOriginal = count($originalHashtags);
		$user = Auth::user();
		$userId = $user->id;
		if($nOriginal == 0){
			foreach ($modifiedHashtags as $hashtag) {
				UserHashtags::AddUserHashtag($hashtag['text'],$userId);
			}
		}
		else{
			$i = 0;
			foreach ($modifiedHashtags as $hashtag) {
				$hashtag = $hashtag['text'];
				$yaExiste = false;
				while ( $i < $nOriginal and !$yaExiste) {
					$originalHashtag = $originalHashtags[$i]->text;
					if ($hashtag == $originalHashtag) {
						$yaExiste = true;
					}
					$i++;
				}
				if (!$yaExiste) {
					UserHashtags::AddUserHashtag($hashtag,$userId);
				}
				$i = 0;
			}
		}
	}

	private function OldHashtags($originalHashtags,$modifiedHashtags){
		$nModified = count($modifiedHashtags);
		$user = Auth::user();
		$userId = $user->id;
		if($nModified == 0){
			foreach ($originalHashtags as $hashtag) {
				UserHashtags::DeleteUserHashtag($hashtag->text,$userId);
			}
		}
		else{
			$i = 0;
			foreach ($originalHashtags as $hashtag) {
				$hashtag = $hashtag->text;
				$yaExiste = false;
				while ( $i < $nModified and !$yaExiste) {
					$modifiedHashtag = $modifiedHashtags[$i]['text'];
					if ($hashtag == $modifiedHashtag) {
						$yaExiste = true;
					}
					$i++;
				}
				if (!$yaExiste) {
					UserHashtags::DeleteUserHashtag($hashtag,$userId);
				}
				$i = 0;
			}
		}
	}

	public function ModifyUserHashtags(){
		$originalHashtags = $this->GetUserHashtags();
		$modifiedHashtags = Input::all();
		$originalHashtags = json_decode($originalHashtags);
		$this->NewHashtags($originalHashtags,$modifiedHashtags);
		$this->OldHashtags($originalHashtags,$modifiedHashtags);
	}

	public function GetUserHashtags(){
		$user = Auth::user();
		$userId = $user->id;
		$hashtagsId = UserHashtags::GetHashtagID($userId);
		$userHashtags = Hashtags::GetHashtags($hashtagsId);
		$return = array();
		foreach ($userHashtags as $hashtag) {
			$insert = array("text" => $hashtag);
			array_push($return, $insert);
		}
		return json_encode($return);
		//return response()->json($return);
	}


}
