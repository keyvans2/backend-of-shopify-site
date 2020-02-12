<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thirdcat extends Model
{
    protected $fillable=['title','secondcat_id'];
    // public function secondcat()
    // {
    //     return $this->belongsTo(Secondcat::class);
    // }
}
