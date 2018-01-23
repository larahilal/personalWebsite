<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function article()
    {
        return $this->belongsTo('App\article');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
