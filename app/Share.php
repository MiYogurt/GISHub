<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model {

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
