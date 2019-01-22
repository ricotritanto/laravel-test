<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $fillable = ['id','id_produk','transaction_id', 'qty'];
    protected $table = 'transaction_details';

    public function transaction_detail()
    {
    	return $this->hasOne(produks::class, 'id','id_produk');
    }
    public function produks()
    {
    	return $this->hasOne(produks::class, 'id','id_produk');
    }
     public function kategoris()
    {
    	return $this->hasOne(Kategori::class, 'id','id_kategori');
    }

   

}
