<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\transaction_detail;
use App\Model\transaction_status;

class transaction extends Model
{
	protected $guarded = [];

    public function transaction_details()
    {
        return $this->belongsTo(transaction_detail::class, 'transaction_id', 'id');
    }

    public function transaction_status()
    {
    	return $this->belongsTo(transaction_status::class, 'transaction_status_id','id');
    }
   
}
