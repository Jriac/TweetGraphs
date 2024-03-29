<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MongoPrueba;
use Illuminate\Http\Request;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        
        return response()->json(
        [
        [
            'title'=>'verde',
            'desc'=>'item1 description',
            'tipo'=>1
        ],
              [
            'title'=>'azul',
            'desc'=>'item2 description',
            'tipo'=>2
        ],
              [
            'title'=>'amarillo',
            'desc'=>'item3 description',
            'tipo'=>2
        ]
        
        ]
        
        );
        
        
        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$test = new MongoPrueba;
		$test->nombre = "Xavier";
		$test->apellido = "Cervilla";
		$test->save();
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
