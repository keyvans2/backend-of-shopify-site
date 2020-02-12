<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secondcat extends Model
{
//    protected $with = ['products'];
    protected $fillable = ['title', 'first_id'];


    public function firstCat()
    {
        return $this->belongsTo(Firstcat::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
