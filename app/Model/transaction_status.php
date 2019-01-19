<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\transaction_status;
use App\Model\transaction;

class transaction_status extends Model
{
    protected $guarded = [];

    public function transaction_statuse()
    {
    	return $this->hasOne(transaction::class, 'id','transaction_status_id');
    }

}
