<?php namespace App\Http\Controllers;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ValidateAccountEmail extends Controller {
    
    const URL = "http://bootcamp.incubio.com:8080/activate";
	const SEED = "ABCDEFGHIJKLMNOPQRSTVWYZ123456789";
    const URL ="http://bootcamp.incubio.com:8080/activate";
    private  $hash;
    private $mailAccount;
    private  $palabra;
    
    public function _construct(){ 
      $this->palabra = str_shuffle(self::SEED);   
    
    }
    
    

    public function sendEmail($mailAccount){
        $this->correo=$mailAccount;
        
        $to      = $this->correo;
        $subject = 'Correo de Activacion';
        $headers = 'From: webmaster@Tweetgrphs.com' . "\r\n" .
        'Reply-To: webmaster@Tweetgrphs.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n".
        'X-Mailer: PHP/' . phpversion();
        $this->hash = $this->makeHash();
        $this->url = self::URL."?hash=".$this->hash; 

    
        $message = '<div> Hola! , gracias por registrarte.
        Para terminar el registro y activar tu cuenta haz clic en el siguiente enlance
        <a href="'.$this->url.'">'.$this->url.'<a></div>';


        $sended=mail($to, $subject, $message, $headers);
        return $sended;
    }
    
    public function insertHash(){
        
        ValidateController::MailSent($this->correo, $this->hash);
    }
    
    private function makeHash(){
        

        $hash=crypt($this->correo,$this->palabra);

        return $hash;
    }
}
