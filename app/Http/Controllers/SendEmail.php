<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Test;

class SendEmail extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['sended'=>$this->sendEmail("jojomasira@gmail.com")]);	
		//return response()->json(['sended'=>$this->($_POST))]);		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function sendEmail($correo){
		//$this->mailAccount=$correo;
		$to = $correo;
		$subject = 'correo de activacion';
		$headers='From: webmaster@Tweetgrphs.com' . "\r\n" .
		'Reply-To: webmaster@Tweetgrphs.com' . "\r\n".
		'Content-type:text/html;charset=UTF-8' . "\r\n".
		'X-Mailer: PHP/'.phpversion();
		//$this->url=self::URL."?hash".$this->hash;
		$message='This is my message';
		$sended=mail($to, $subject, $message, $headers);
		return $sended;
	}
	

}
