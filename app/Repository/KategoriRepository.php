<?php
namespace App\Repository;

use App\Model\kategori;
use App\Model\transaction;

class KategoriRepository{

    public function getCategoryList(){
        return kategori::orderBy('created_at', 'DESC')->get(); // 2 
    }

    public function getTransactionList(){
        return kategori::orderBy('created_at', 'DESC')->with('detail')->get(); // 2 
    }

    public function createCategory($name){
        return kategori::create(['name'=>$name]);
    }
}
