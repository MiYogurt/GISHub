<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Share;
use EndaEditor;

class ShareController extends Controller {


    public function jishu(){
        $shares = Share::where('cate', '=', 1)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares,'title'=>'技术']);
    }
    public function qinggan(){
        $shares = Share::where('cate', '=', 2)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares,'title'=>'情感']);
    }
    public function shenghuo(){
        $shares = Share::where('cate', '=', 3)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares,'title'=>'生活']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $shares = Share::where('cate', '=', 1)->orderBy('created_at')->get();
        return view('admin.sharelist',['shares'=>$shares,'title'=>'技术']);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.addshare')->with('share',null);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
//        var_dump($request->all());
        $title = $request->input('title');
        $cate = $request->input('cate');
        $content = $request->input('content');
        $v = \Validator::make([
          'title' => $title,
          'content' => $content,
        ], [
          'title' => 'required',
          'content' => 'required',
        ],[
          'title.required' => '文章标题不能为空',
          'content.required' => '文章内容不能为空',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        $share = new Share();

        $share->user_id = \Auth::user()->id;
        $share->title = $title;
        $share->cate = $cate;
        $share->content = $content;
        $share->created_at = date("Y-m-d h:i:s");
        $share->updated_at = date("Y-m-d h:i:s");
        if($share->save()){
            return redirect('/hub/share');
        }else{
            return redirect()->back()->withErrors("出错了")->withInput();
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
        $share = Share::find($id);
        $share->content = EndaEditor::MarkDecode($share->content);
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
        $share = Share::find($id);
        return view('admin.editshare')->withShare($share);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
        $title = $request->input('title');
        $cate = $request->input('cate');
        $content = $request->input('content');
        $v = \Validator::make([
            'title' => $title,
            'content' => $content,
        ], [
            'title' => 'required',
            'content' => 'required',
        ],[
            'title.required' => '文章标题不能为空',
            'content.required' => '文章内容不能为空',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $share = Share::find($id);
        $share->title = $title;
        $share->cate = $cate;
        $share->content = $content;
        $share->created_at = date("Y-m-d h:i:s");
        $share->updated_at = date("Y-m-d h:i:s");
        if($share->save()){
            return redirect('/hub/share');
        }else{
            return redirect()->back()->withErrors("出错了")->withInput();
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
        \DB::table('shares')->where('id','=', $id)->delete();
        return \Redirect::back();
	}

    public function upload(){

        $data = EndaEditor::uploadImgFile('uploads');

        echo json_encode($data);

    }

}
