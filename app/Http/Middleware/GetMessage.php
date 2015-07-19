<?php

namespace App\Http\Middleware;

use Closure;

class GetMessage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $new_messages = \DB::table('messages')->where('receive_user_id', \Auth::user()->id)->where('status','=',1)->get();
        foreach($new_messages as $msg){
            $msg->send_user_id  = \DB::table('users')->where('id',$msg->send_user_id)->first()->name;
            $msg->receive_user_id  = \DB::table('users')->where('id',$msg->receive_user_id)->first()->name;
            $msg->time = date('Y-m-d', $msg->time);
        }
        $messages = \DB::table('messages')->where('receive_user_id', \Auth::user()->id)->orderBy('id','aesc')->get();
        foreach($messages as $msg){
            $msg->send_user_id  = \DB::table('users')->where('id',$msg->send_user_id)->first()->name;
            $msg->receive_user_id  = \DB::table('users')->where('id',$msg->receive_user_id)->first()->name;
            $msg->time = date('Y-m-d', $msg->time);
        }

        view()->share('rec_new_message',$new_messages);
        view()->share('rec_message',$messages);

        return $next($request);
    }
}