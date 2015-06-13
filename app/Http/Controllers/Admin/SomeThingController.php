<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SomeThingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $somes = \DB::table('somethings')->get();
        return view('Admin.something')->with('somes',$somes);
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
	public function store(Request $request)
	{
        \DB::table('somethings')->insertGetId(
            ['name' => $request->input('name'),
                'email' => $request->input('email'),
                'description'=>$request->input('description'),
                'message'=>$request->input('message')
            ]
        );
        return view('index')->with('message',"后台已经接受，我们会在工作日，以最快的时间回复您。");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $some = \DB::table('somethings')->where('id', $id)->first();

        return view('admin.somethingcate',['some'=>$some]);
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
        \DB::table('somethings')->where('id','=', $id)->delete();
        return redirect('/hub/something');
	}

}
