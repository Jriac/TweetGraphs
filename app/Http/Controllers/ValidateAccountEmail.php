<?php namespace App\Http\Controllers;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ValidateAccountEmail extends Controller {
    
    
	const SEED = "ABCDEFGHIJKLMNOPQRSTVWYZ123456789";
    const URL ="http://bootcamp.incubio.com:8080/activate";
    private  $hash;
    private $mailAccount;
    private  $palabra;
    
    public function _construct(){ 
      
      $this->url=$url;
      $this->palabra = str_shuffle(self::SEED);   
    
    }
    
    
    public function sendEmail($correo){
        $this->mailAccount=$correo;
        $to      = $correo;
        $subject = 'Correo de Activacion';
        $headers = 'From: webmaster@Tweetgrphs.com' . "\r\n" .
        'Reply-To: webmaster@Tweetgrphs.com' . "\r\n" .
        'Content-type:text/html;charset=UTF-8' . "\r\n".
        'X-Mailer: PHP/' . phpversion();
        $this->hash = $this->makeHash();
        $this->url = self::URL."?hash=".$this->hash; 
        $message = '<div> Hola! , gracias por registrarte. Para terminar el registro y activar tu cuenta haz clic en el siguiente enlance
        <a  href="'.$this->url.'"><a>'.$this->url.'</div>';
        $sended=mail($to, $subject, $message, $headers);
        return $sended;
    }
    
    public function insertHash(){
        
        
    }
    
    private function makeHash(){
        
        $hash=crypt($this->mailAccount, $this->palabra);
        return $hash;
    }
}
