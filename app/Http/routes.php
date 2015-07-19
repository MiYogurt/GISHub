<?php
use App\Bubble;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('home', function () {
    return redirect('hub');
});

/*
/======================
/ 登陆路由
/======================
/
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//主页
Route::get('/',function(){
		return view('index');
});


// 数据表测试路由
Route::get('/db',function(){
    // $user = \DB::table('users')->where('name','1')->first();
    var_dump(md5(time()));
});



//GITH GIStar创新团队中心
Route::group(['prefix' => 'hub','namespace' => 'Admin','middleware'=>['auth','msg']], function(){
    Route::post('/postUpload', 'ShareController@upload');

    Route::resource('/something', 'SomeThingController');
    Route::resource('/notice', 'NoticeController');
    Route::resource('/msg', 'MessageController');
    Route::get('noread', function () {
        return view('admin.reclistmessage');
    });

    Route::get('/', 'NoticeController@home');

    Route::get('/dido', function () {
        return view('admin.dido');
    });

    Route::get('/time', function () {
        return view('admin.time');
    });

//    冒泡
    Route::resource('/bubble','BubblesController');
//    成员
    Route::get('/user',function(){
        $users = User::all();
        return view('admin.user',['users'=>$users]);
    });
    Route::get('/adduser', function () {
        return view('admin.adduser');
    });
    Route::post('/adduser', function (Request $request) {
        if ($request->input('password') != $request->input('password_confirmation')) {
           return view('admin.adduser')->with('error','确认密码不一致，请重试');
        }else{
            \DB::table('users')->insertGetId(
                ['name' => $request->input('name'), 'email' => $request->input('email'),'tel'=>$request->input('tel'),
                 'password' => Hash::make($request->input('password'))]
            );
        }

        return redirect('hub/user');

    });
//    Route::post('/user/delete/{id}', function ($id) {
//        \DB::table('users')->where('id','=', $id)->delete();
//        return redirect('/hub/user');
//    });

    Route::resource('/project','ProjectController');
    Route::resource('/task','TaskController');
    Route::get('/{project}/task/create','TaskController@createNew')->where('project', '[0-9]+');


    Route::resource('/share', 'ShareController');
    Route::get('/jishu','ShareController@jishu');
    Route::get('/qinggan','ShareController@qinggan');
    Route::get('/shenghuo','ShareController@shenghuo');



//    其他（六项精进、学习指南、入团须知）
    Route::get('/heard',function(){
        return view('admin.studyheard');
    });
    Route::get('/howtostudy',function(){
        return view('admin.howtostudy');
    });
    Route::get('/mustknow',function(){
        return view('admin.mustknow');
    });
});
