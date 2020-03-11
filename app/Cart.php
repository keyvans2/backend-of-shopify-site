<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $with = ['product'];
    protected $fillable = ['quantity'];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
