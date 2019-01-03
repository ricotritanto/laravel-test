<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    // protected $guarded = [];
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
    protected $table = 'kategoris';
    public $timestamps = true;
}
