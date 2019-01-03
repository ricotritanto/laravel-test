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
}
	