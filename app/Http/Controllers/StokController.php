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
        $stok = $transactionRepo->GetStokList();
        // return json_encode($stok);
        return view('stok.index', compact('stok')); // 3
    }
}