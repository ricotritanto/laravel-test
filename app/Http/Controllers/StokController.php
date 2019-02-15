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
        // $stok = $transactionRepo->getstok();
        $stok = $transactionRepo->totstok();
   //     
        // return json_encode($transactions);
        return view('stok.index', compact('stok')); // 3
    }
}