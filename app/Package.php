<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['title', 'content', 'image', 'price'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
