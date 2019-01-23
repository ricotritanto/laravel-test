<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TransactionRepository;
use App\Repository\ProdukRepository;

// use App\Repository\KategoriRepository;

class TransactionController extends Controller
{
    Public Function index()
    {
        $transactionRepo=new TransactionRepository;
        $transactions = $transactionRepo->GetTransactionList();
        // return json_encode($transactions);
        return view('transaction.index', compact('transactions')); // 3
    }

    Public Function create()
    {
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->GetProdukList();
        return view('transaction.create', compact('produks')); // 3
    }

    Public Function cari(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string|max:10'
        ]);
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->GetProdukKode($request);
        // return json_encode($produks);
        return response()->json($produks);
        // return response(json_encode($produks))
        //     ->withHeaders([
        //         'Content-Type' => 'application/json',
        //         'X-Header-One' => 'Header Value',
        //         'X-Header-Two' => 'Header Value',
        //     ]);
    }

    Public function tambah(Request $request)
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

    function viewtransaction()
    {
        $transactionRepo=new TransactionRepository;
        $transactions = $transactionRepo->GetTransactionID();
        return view('transaction.index', compact('transactions')); // 3
    }

    function ext()
    {
        
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->GetProdukList();
        return view('transaction.ext', compact('produks')); 
    }

    
}