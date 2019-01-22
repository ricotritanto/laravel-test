<?php
namespace App\Repository;

use App\Model\produks;
use App\Model\kategori;
use App\Model\transaction;
use App\Model\transaction_status;

class ProdukRepository{

    Public Function GetProdukList(){
        return produks::with('kategoris')->orderBy('created_at', 'DESC')->get(); // 2 
        // $products = Product::with('category')->orderBy('created_at', 'DESC')->paginate(10);
    }

    Public Function GetTransactionList(){
        return produks::orderBy('created_at', 'DESC')->with('detail')->get(); // 2 
    }

    Public Function CreateProduk($name,  $kode, $kategori, $desc)
    {
         return produks::create(['name'=>$name,
                                 'kode'=>$kode,
                                 'id_kategori'=>$kategori,
                                 'description'=>$desc]);
    }

    Public Function UpdateProduk($id, $request)
    {
        return produks::Where('id', $id)->update(['name' => $request->name,
                                                  'description' => $request->description,
                                                  'kode' => $request->kode,
                                                  'id_kategori' => $request->id_kategori,]);
    } 

    Public Function GetProdukId($id)
    {return produks::findOrFail($id);
        
    }   
  
    Public Function DeleteProduk($id)
    {
        return produks::find($id)->delete(); //QUERY KEDATABASE UNTUK MENGAMBIL DATA BERDASARKAN ID
        // return kategori::delete();
    }

    Public Function GetProdukKode($request)
    {
        // return produks::Where('kode', $kode)->first();
         // return produks::Where('kode', $kode)->first();
        // print_r($status);exit();
        // $data = transaction_status::Where('id', $status)->first();
        return produks::Where('kode', $request['kode'])->first();
        


        // $data = produks::where('kode', $request['kode'])
        // ->join('kategory','kategory.product_id','=','product.id')
        // orwhere('id',12)->where('nama','jembut')->first();

        // SLECT FROM PRODUCT WHERE kode = qwqw OR id =12 AND nama='jembut'
        

    }
}