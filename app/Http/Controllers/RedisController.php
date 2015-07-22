<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller {

    public function prueba()
    {
        require "predis/autoload.php";
        PredisAutoloader::register();
        try {
            $redis = new PredisClient();
            echo "Successfully connected to Redis";
            $redis->set('sitio', 'Codehero');
            $valor = $redis->get('sitio');
            dd($valor);
        } catch (Exception $e) {
            echo "Couldn't connected to Redis";
            echo $e->getMessage();
        }
    }

    public function getAllTrends()
    {
        $global = Redis::get('global');
        $madrid = Redis::get('madrid');
        $barcelona = Redis::get('barcelona');
        $sevilla = Redis::get('sevilla');
        $bilbao = Redis::get('bilbao');
        $donostia = Redis::get('donostia');
        $coruna = Redis::get('coruna');
        $leon = Redis::get('leon');
        $santander = Redis::get('santander');

        $trends = array_merge($global, $madrid, $barcelona, $sevilla, $bilbao, $donostia, $coruna, $leon, $santander);
        /*$trends = array('global' => $global, 'madrid' => $madrid, 'barcelona' => $barcelona, 'sevilla' => $sevilla,
            'bilbao' => $bilbao, 'donostia' => $donostia, 'coruna' => $coruna, 'leon' => $leon, 'santander' => $santander);*/
        //return json_encode($trends);
        return $trends;
    }

    public function setTrends($key, $value)
    {
        Redis::set($key, $value);
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
