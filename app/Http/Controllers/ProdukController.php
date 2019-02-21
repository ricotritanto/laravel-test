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
    	return view('produks.index', compact('produks'));
    }

    Public Function Create()
    {
    	$kategoryRepo=new KategoriRepository;
       	$kategoris = $kategoryRepo->getCategoryList();
    	return view('produks.create', compact('kategoris'));
    }

    Public Function save(Request $request) //function save produks
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

    Public Function Edit($id) //function menampilkan produks by id untuk update
    {
        $produkRepo=new ProdukRepository;
        $kategoryRepo=new KategoriRepository;
        $produks = $produkRepo->GetProdukId($id);
        $kategoris = $kategoryRepo->getCategoryList();
        return view('produks.edit', compact('produks','kategoris'));
    }

    Public Function Update(Request $request, $id) //function update produks
    {
        $this->validate($request, [
        'kode' => 'required|string|max:10',
        'name' => 'required|string|max:100',
        'description' => 'nullable|string|max:255',
        'id_kategori' => 'required'
        ]);
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->UpdateProduk($id, $request);
        if($produks) return redirect('/produks')->with(['success' => '<strong>' . 'Data' . '</strong> berhasil diupdate']);
        else return redirect('/produks')->with(['error' => $e->getMessage()]); 
    }

    Public Function Delete($id) //function delete produks
    {
        $produkRepo=new ProdukRepository;
        $produks = $produkRepo->DeleteProduk($id);
        if($produks) return redirect('/produks')->with(['success' =>  'Data Berhasil dihapus']);
    }
}
	