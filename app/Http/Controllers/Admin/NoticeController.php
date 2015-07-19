<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use EndaEditor;

class NoticeController extends Controller {


    public function home()
    {
        $user = \DB::table('users')->count();
        $share = \DB::table('shares')->count();
        $project = \DB::table('projects')->count();
        $notice = \DB::table('notice')->find(1);
        $data = array(
            'user' => $user,
            'notice'=>EndaEditor::MarkDecode($notice->content),
            'share'=>$share,
            'project'=>$project,
        );
        return view('admin.home',['data'=>$data]);
    }

	public function edit($id)
	{
        $notice = \DB::table('notice')->find($id)->content;

        return view('admin.editnontice',['notice'=>$notice]);
	}

	public function update(Request $request,$id)
	{
        $notice = $request->input('notice');
        \DB::table('notice')->where('id', $id)->update(['content' => $notice]);
        return redirect('/hub');
	}

}
