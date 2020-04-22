<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'table_product';
    public $timestamps = false;
    protected $fillable = ['barCode','name'];
}
