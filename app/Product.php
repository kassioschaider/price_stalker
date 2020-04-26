<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['barCode','name'];

    public function analyses()
    {
        return $this->hasMany(Analyse::class);
    }
}
