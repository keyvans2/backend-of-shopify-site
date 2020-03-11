<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['title', 'stock', 'image', 'type', 'details', 'secondcat_id', 'name', 'price'];

    public function Cart()
    {
        return $this->belongsToMany(Cart::class);
    }

//    public function purchase()
//    {
//        return $this->hasMany(Purchase::class);
//    }

    public function secondcat()
    {
        return $this->belongsTo(Secondcat::class);
    }
}
