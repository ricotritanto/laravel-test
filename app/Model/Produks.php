<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    //
    protected $guarded = [];

    public function kategoris()
    {
    	return $this->belongsTo(Kategori::class);
    }
}


