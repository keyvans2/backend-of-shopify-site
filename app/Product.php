<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'price'];

    public function Cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function purchase()
    {
        return $this->belongsToMany(Purchase::class);
    }
}
