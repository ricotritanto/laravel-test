<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProdukRepository;
use App\Repository\KategoriRepository;

class ProdukController extends Controller
{
    
    Public Function Index()
    {
    	$produkRepo=new ProdukRepository;
       	$produks = $produkRepo->GetProdukList();
    	return view('produks.index', compact('produks')); // 3
    }

    Public Function Create()
    {
    	$kategoryRepo=new KategoriRepository;
       	$kategoris = $kategoryRepo->getCategoryList();
    	return view('produks.create', compact('kategoris'));
    }

    Public Function save(Request $request)
    {
    	$aa = $request->all();
        $name = $aa['name'];
        $kode = $aa['kode'];
        $kategori = $aa['id_kategori'];
        $desc = $aa['description'];
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->createProduk($name, $kode, $kategori, $desc);
        if($produks) return redirect('/produks')->with(['success' => '<strong>' . $produks->name . '</strong> Telah disimpan']);
        else return redirect('/produk/new')->with(['error' => $e->getMessage()]); 
    }
}
	