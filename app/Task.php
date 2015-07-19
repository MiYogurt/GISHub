<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'tasks';

    public function projects()
    {
        return $this->belongsToMany('App\Project','userproject','task_id','project_id');
    }


}
