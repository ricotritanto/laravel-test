<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $fillable = ['id','id_produk','transaction_id', 'qty'];
    protected $table = 'transaction_details';

    public function produks()
    {
    	return $this->hasOne(produks::class, 'id','id_produk');
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class, 'id','transaction_id');
    }
     public function transaction_detail()
    {
        return $this->hasMany(transaction_detail::class, 'id','transaction_id');
    }

   

}
