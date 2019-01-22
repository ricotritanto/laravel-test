<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    // protected $guarded = [];
    protected $fillable = ['id', 'name'];
    protected $table = 'kategoris';
    public $timestamps = true;
}
