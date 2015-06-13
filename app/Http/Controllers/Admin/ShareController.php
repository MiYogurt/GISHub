<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller {


    public function jishu(){
        $shares = Share::where('cate', '=', 1)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares]);
    }
    public function qinggan(){
        $shares = Share::where('cate', '=', 2)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares]);
    }
    public function shenghuo(){
        $shares = Share::where('cate', '=', 3)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

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
        $share = Share::find($id);
        return view('admin.share')->with('share', $share);
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
        \DB::table('shares')->where('id','=', $id)->delete();
        return Redirect::back();
	}

}
