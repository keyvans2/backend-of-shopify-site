<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['title', 'stock', 'image', 'type', 'star', 'color', 'size', 'details', 'secondcat_id', 'name', 'price','created_at','updated_at'];

    public function Cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function purchase()
    {
        return $this->belongsToMany(Purchase::class);
    }
}
