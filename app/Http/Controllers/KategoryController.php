<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\KategoriRepository;

class KategoryController extends Controller
{

     public function index()
    {
    	$kategoryRepo=new KategoriRepository;
       	$kategoris = $kategoryRepo->getCategoryList();
    	return view('kategori.index', compact('kategoris')); // 3
    }
   	
   	 public function create()
    {
        return view('kategori.create');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);
        $kategoryRepo=new KategoriRepository;
	}
    public function createCategory($name)
    {
       	$kategoris = $kategoryRepo->createCategory($name);
        if($kategoris) return redirect('/kategori')->with(['success' => '<strong>' . $kategori->name . '</strong> Telah disimpan']);
        else return redirect('/kategori/new')->with(['error' => $e->getMessage()]); 
    }
}
