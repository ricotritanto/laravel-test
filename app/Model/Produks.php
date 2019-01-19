<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\transaction_detail;
use App\Model\transaction_status;
use App\Model\transaction;

class Produks extends Model
{
    //
    protected $guarded = [];

    public function kategoris()
    {
    	// return $this->BelongsTo(Kategori::class);
    	return $this->hasOne(Kategori::class, 'id','id_kategori');
    }

   
     public function status()
    {
    	return $this->hasOne(transaction_status::class, 'id','status');
    }
}


