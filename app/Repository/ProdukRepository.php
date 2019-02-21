<?php
namespace App\Repository;

use App\Model\produks;
use App\Model\kategori;
use App\Model\transaction;
use App\Model\transaction_status;

class ProdukRepository{

    Public Function GetProdukList(){
        return produks::with('kategoris')->orderBy('created_at', 'DESC')->get();
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
    {
        return produks::findOrFail($id); 
    }   
  
    Public Function DeleteProduk($id)
    {
        return produks::find($id)->delete(); //QUERY KEDATABASE UNTUK MENGAMBIL DATA BERDASARKAN ID
    }

    Public Function GetProdukKode($request)
    {
        return produks::Where('kode', $request['kode'])->first();      

    }
}