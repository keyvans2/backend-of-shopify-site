<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firstcat extends Model
{
//    protected $with = ['secondcats'];
    protected $fillable = ['title'];

    public function secondcats()
    {
        return $this->hasMany(Secondcat::class);
    }
}
