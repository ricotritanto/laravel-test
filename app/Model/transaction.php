<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\transaction_detail;
use App\Model\transaction_status;

class transaction extends Model
{
	protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(transaction_detail::class, 'transaction_id', 'id');
    }

    public function status()
    {
    	return $this->hasOne(transaction_status::class, 'id','status');
    }
   
}
