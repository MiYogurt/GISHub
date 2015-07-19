<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Validator;
class TaskController extends Controller {



	public function createNew($project)
	{
		return view('admin.createtask',['project_id'=>$project]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$name = $request->input('name');
        $content = $request->input('content');
        $time = $request->input('finish_time');
        $v = \Validator::make([
            'name' => $name,
            'content' =>  $content,
            'finish_time' =>  $time,
        ], [
			'name' =>  'required',
            'content' =>   'required',
            'finish_time' =>   'required',

        ],[
            'name.required' => '任务创建人不能空',
            'content.required' => '任务内容不能为空',
            'finish_time.required' => '限定完成时间不能为空',
        ]);

		\DB::table('tasks')->insertGetId(
                ['project_id' => $request->project_id,'content'=>$content, 'name' => $name,'finish_time'=>$time]
        );
		return redirect('hub/project/'.$request->project_id);
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
		$task = Task::find($id);
		$task->delete();
		return redirect()->back();
	}

}
