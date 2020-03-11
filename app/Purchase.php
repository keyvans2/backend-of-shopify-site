<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['quantity', 'trackingCode', 'offCode'];
    protected $table = 'purchases';

//    public function product()
//    {
//        return $this->hasMany(Product::class);
//    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
