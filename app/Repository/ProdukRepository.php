<?php
namespace App\Repository;

use App\Model\produks;
use App\Model\kategori;
use App\Model\transaction;

class ProdukRepository{

    Public Function GetProdukList(){
        return produks::with('kategoris')->orderBy('created_at', 'DESC')->paginate(10); // 2 
        // $products = Product::with('category')->orderBy('created_at', 'DESC')->paginate(10);
    }

    Public Function GetTransactionList(){
        return produks::orderBy('created_at', 'DESC')->with('detail')->get(); // 2 
    }

    Public Function CreateProduk($name){
         return produks::create(['name_produk'=>$name]);
    }

    Public Function UpdateProduk($id, $name)
    {
        return produks::Where('id', $id)->update(['name_produk'=>$name]);
    } 

    Public Function GetProdukId($id)
    {
        return produks::find($id);
    }
    Public Function DeleteProduk($id)
    {
        return produks::find($id)->delete(); //QUERY KEDATABASE UNTUK MENGAMBIL DATA BERDASARKAN ID
        // return kategori::delete();
    }
}
