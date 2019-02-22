<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TransactionRepository;
use App\Repository\ProdukRepository;


class StokController extends Controller
{
    Public Function index()
    {
        $transactionRepo=new TransactionRepository;
        $stok = $transactionRepo->getstok();
        return view('stok.index', compact('stok')); // 3
    }

    Public Function purchase() //function menampilkan stok barang masuk
    {
    	$transactionRepo=new TransactionRepository;
        $stok = $transactionRepo->stokmasuk();
        return view('stok.purchase', compact('stok')); // 
    }

    Public Function issuing() //function menampilkan stok barang keluar
    {
    	$transactionRepo=new TransactionRepository;
        $stok = $transactionRepo->stokkeluar();
        // return json_encode($stok);
        return view('stok.issuing', compact('stok'));
    }
}