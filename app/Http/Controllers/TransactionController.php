<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TransactionRepository;
use App\Repository\ProdukRepository;

class TransactionController extends Controller
{
    Public Function index()
    {
        $transactionRepo=new TransactionRepository;
        $transactions = $transactionRepo->GetTransactionList();
        // return json_encode($transactions);
        return view('transaction.index', compact('transactions'));
    }

    Public Function create()  //function untuk input item masuk 
    {
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->GetProdukList();
        return view('transaction.create', compact('produks'));
    }

    Public Function cari(Request $request)  //function cari kode item
    {
        $this->validate($request, [
            'kode' => 'required|string|max:10'
        ]);
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->GetProdukKode($request);
        return response()->json($produks);
    }

    Public function tambah(Request $request) //function input item masuk atau keluar
    {         
        $stress = $request->all();
        $idpro = $stress['produk'];
        $qty = $stress['qty'];
        $status = $stress['status'];
        $data = array();
        
        $index=0;
        foreach ($idpro as $key ) 
        {
            array_push($data, array(
                        'id'=>$key,
                        'qty'=>$qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                      ));
      
                $index++;
        }
        
        $transactionRepo=new TransactionRepository;
        $produks = $transactionRepo->createtransaction($data,$status);
        return redirect('transaction');
    }

    function ext()  //function untuk input item keluar
    {
        
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->GetProdukList();
        return view('transaction.ext', compact('produks')); 
    }   
}