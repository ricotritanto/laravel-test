<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\transaction_detail;

class transaction extends Model
{
    public function detail()
    {
        return $this->hasMany(transaction_detail::class, 'transaction_id', 'id');
    }
}
