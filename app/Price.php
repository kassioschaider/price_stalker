<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function analyse()
    {
        return $this->belongsTo(Analyse::class);
    }
}
