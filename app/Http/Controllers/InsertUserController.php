<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InsertUserController extends Controller {

    /**
     * Creates a UserModel, and set his email and password.
     */
    public function registerUser()
    {
        $respuesta = array("header" => array("success" => "yes", "msg" => "mensaje error"), "body" => array("asas"));
        echo response()->json($respuesta);
        /*
        $user = new UserModel;
        $user->email = $_POST['email'];
        $password = $_POST['password'];

        $password = "1234";
        if (defined('CRYPT_BLOWFISH') && CRYPT_BLOWFISH) {
            $user->password = crypt($password, '$2y$07$esteesuntextoaleatoreo$');
        }

        if($user->AddToUsers()){
            $respuesta = array();
            return response()->json($respuesta);
            return view('registerJCN')->with('exists', true);
        }*/
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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

}
