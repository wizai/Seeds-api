<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    protected $fillable = [
        'title', 'user_id'
    ];

    public function plants()
    {
        return $this->belongsToMany('App\Plant');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
