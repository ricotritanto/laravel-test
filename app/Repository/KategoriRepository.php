<?php
namespace App\Repository;

use App\Model\kategori;
use App\Model\transaction;

class KategoriRepository{

    Public Function GetCategoryList(){
<<<<<<< HEAD
        return kategori::orderBy('name', 'ASC')->get(); // 2 
=======
        return kategori::orderBy('created_at', 'DESC')->get(); // 2 
>>>>>>> 64e885030f4366604f26dedba683a190b10c6d40
    }

    Public Function GetTransactionList(){
        return kategori::orderBy('created_at', 'DESC')->with('detail')->get(); // 2 
    }

    Public Function CreateCategory($name){
<<<<<<< HEAD
         return kategori::create(['name'=>$name]);
    }

    Public Function UpdateCategory($id, $name)
    {
        return kategori::Where('id', $id)->update(['name'=>$name]);
    } 

=======
         return kategori::create(['name'=>$name]);  
       
        
    }

>>>>>>> 64e885030f4366604f26dedba683a190b10c6d40
    Public Function GetCategoryId($id)
    {
        return kategori::find($id);
    }
    Public Function DeleteCategory($id)
    {
        return kategori::find($id)->delete(); //QUERY KEDATABASE UNTUK MENGAMBIL DATA BERDASARKAN ID
        // return kategori::delete();
    }
}
