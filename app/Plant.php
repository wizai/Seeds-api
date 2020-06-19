<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'title', 'category', 'image', 'sowed', 'planted', 'seedling_frequency', 'seedling_light', 'planting_frequency', 'planting_sprouting', 'description', 'localisation'
    ];

    public function garden()
    {
        return $this->belongsToMany('App\Garden');
    }
}
