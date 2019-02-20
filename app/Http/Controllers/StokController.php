<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TransactionRepository;
use App\Repository\ProdukRepository;

// use App\Repository\KategoriRepository;

class StokController extends Controller
{
    Public Function index()
    {
        $transactionRepo=new TransactionRepository;
        $stok = $transactionRepo->getstok();
        // $stok = $transactionRepo->totstok();
        // $stok = $transactionRepo->hitungstok();
        // return json_encode($stok);
        // foreach ($stok as $key ) 
        // {
        //     $data = ['kode' => $key->produks->kode,
        //              'kategoris' => $key->produks->kategoris->name,
        //              'produks' => $key->produks->name,
        //              'kode' => $key->produks->kode,];
        // }
        // $stok = $transactionRepo->totstok();
   //     
        // return json_encode($transactions);
        return view('stok.index', compact('stok')); // 3
    }

    Public Function purchase()
    {
    	$transactionRepo=new TransactionRepository;
        $stok = $transactionRepo->stokmasuk();
        return view('stok.purchase', compact('stok')); // 
        $stok = $transactionRepo->purchase();
   //     
        // return json_encode($transactions);
        return view('stok.purchase', compact('stok')); // 3
    }

    Public Function issuing()
    {
    	$transactionRepo=new TransactionRepository;
        $stok = $transactionRepo->stokkeluar();
        return view('stok.issuing', compact('stok'));
    }
}