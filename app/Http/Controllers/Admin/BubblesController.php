<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bubble;

class BubblesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bubbles = Bubble::orderBy('id','desc')->get();
        return view('admin.bubble',['bubbles'=>$bubbles,'bubble_one'=>'']);
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
        $content = $request->input('content');
        $bubble = new Bubble();
        $bubble->user_id = $request->user()->id;
        $bubble->content = $content;
        $bubble->created_at = date('Y-m-d', time());
        if ($bubble->save()) {
            return redirect('/hub/bubble');
        }else{
            return redirect()->back()->with('error','出错啦!');
        }
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
		$bubble_one = Bubble::find($id);
		$bubbles = Bubble::orderBy('id','desc')->get();
		return view('admin.bubble',['bubble_one'=>$bubble_one,'bubbles'=>$bubbles]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$bubble_one = Bubble::find($id);

		$bubble_one->content = $request->input('content');
		$bubble_one->created_at = date('Y-m-d', time());

		if ($bubble_one->save()) {
			return redirect('/hub/bubble');
		}else{
			return redirect()->back()->with('error','出错啦!');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bubble::find($id)->delete();
		return redirect('/hub/bubble');
	}

}
