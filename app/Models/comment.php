<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article()
    {
        return $this->belongsTo('App\article');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
