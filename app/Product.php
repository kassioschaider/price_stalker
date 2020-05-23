<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['barCode', 'name', 'user_id'];

    public function analyses()
    {
        return $this->hasMany(Analyse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
