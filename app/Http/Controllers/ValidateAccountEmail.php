<?php namespace App\Http\Controllers;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ValidateAccountEmail extends Controller {
    
    
	const SEED = "ABCDEFGHIJKLMNOPQRSTVWYZ123456789";
    private  $hash;
    private  $correo;
    private  $url;
    private  $palabra;
    
    public function _construct($email,$url){ 
      $this->correo=$email;
      $this->url=$url;
      $this->palabra = str_shuffle(self::SEED);   
    
    }
    
    
    public function sendEmail(){
        $to      = $this->correo;
        $subject = 'Correo de Activacion';
        $headers = 'From: webmaster@Tweetgrphs.com' . "\r\n" .
        'Reply-To: webmaster@Tweetgrphs.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();


        
        
        $this->hash = $this->makeHash();
        $this->url = $this->url."?hash=".$this->hash; 
    
        $message = '<div> Hola! , gracias por registrarte. Para terminar el registro y activar tu cuenta haz clic en el siguiente enlance
        <a  href="'.$this->url.'"><a>'.$this->url.'</div>';

        $sended=mail($to, $subject, $message, $headers);
        
        return $sended;
    }
    
    public function insertHash(){
        
        
    }
    
    private function makeHash(){
        
        $hash=sha1($this->palabra);
        return $hash;
        
        
        
    }
}
