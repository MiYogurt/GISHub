<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Task;
use Validator;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		return view('admin.project',['projects'=>$projects]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.createproject');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$name         = $request->input('name');
		$description  = $request->input('description');
		$project_duty = $request->input('project_duty');
		$finish_time  = $request->input('finish');

		$v = \Validator::make([
            'name'         => $name,
            'description'  => $description,
            'project_duty' => $project_duty,
            'project_user' => $request->input('project_user'),
			'finish_time'  => $finish_time
        ], [
			'name' 			=> 'required',
            'description'   => 'required',
            'project_duty'  => 'required',
            'project_user'  => 'required',
			'finish_time'   => 'required'
        ],[
            'name.required' => '项目名称不能为空',
            'description.required' => '项目简介不能为空',
            'project_user.required' => '项目组员不能为空',
            'project_duty.required' => '项目负责人不能为空',
            'finish_time.required' => '项目完成时间不能为空'
        ]);
		$duty_id = \DB::table('users')->where('name',$project_duty)->first()->id;
		$destinationPath = 'public/project';
		$filename = $duty_id . md5(time()).'jpg';
		if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

		if (!User::where('name',$project_duty)) {
			return redirect()->back()->withErrors("没有找到".$project_duty."负责人")->withInput();
		}
		$project_user = explode('，',$request->input('project_user'));
		foreach ($project_user as $user) {
			if(!\DB::table('users')->where('name',$user)->first()){
				return redirect()->back()->withErrors("没有找到".$user."用户")->withInput();
			}
		}
		if ($request->file('img_face'))
		{
		    $request->file('img_face')->move($destinationPath, $fileName);
		}
		\DB::table('projects')->insertGetId([
			'name'       => $name,
			'img_path'   => $filename,
			'description'=> $description,
			'duty_id'    => $duty_id,
			'finish_time'=> $finish_time
		]);

		foreach ($project_user as $user) {
			\DB::table('userproject')->insertGetId([
				'user_id'    => \DB::table('users')->where('name',$user)->first()->id,
				'project_id' => \DB::table('projects')->where('name',$name)->first()->id
			]);
		}
		return redirect('hub/project');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);
		$user = $project->users()->get();
		$users = "";
		foreach ($user as $v) {
			$users = $users.$v->name. "   ";
		}
		$duty_name = \DB::table('users')->where('id',$project->duty_id)->first()->name;
		$task = \DB::table('tasks')->where('project_id',$id)->orderBy('id','desc')->get();
	    return view('admin.projectcate',['project'=>$project,'duty_name'=>$duty_name,'users'=>$users,'tasks'=>$task]);
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
