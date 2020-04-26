<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
