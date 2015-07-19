<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';

    public function users(){
        return $this->belongsToMany('App\User', 'userproject', 'project_id', 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
