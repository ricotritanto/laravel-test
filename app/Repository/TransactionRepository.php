<?php
namespace App\Repository;

use App\Model\produks;
use App\Model\kategori;
use App\Model\transaction_detail;
use App\Model\transaction;
use App\Model\transaction_status;

class TransactionRepository{

  Public Function GetTransactionList()
  {
      return transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')->orderBy('id_produk')->get();
  }

  Public Function createtransaction($data,$status) //function insert data transaction (berjalan bersama dengan function create_transaction)
  {
  		$transId=$this->create_transaction($status);
  		for($i=0;$i<count($data);$i++)
      {
  			$data[$i]['transaction_id']=$transId;
  			$data[$i]['id_produk']=$data[$i]['id'];
        $data[$i]['created_at'] =date('Y-m-d H:i:s');
        $data[$i]['updated_at'] = date('Y-m-d H:i:s');
  			unset($data[$i]['id']);
  		}
    	return transaction_detail::insert($data);
  }

  public Function create_transaction($status) //function create id status dan insert id + invoice number tersebut ke tabel DB transaction 
  {
      
  	$data = [
    		'transaction_status_id'=>$status,
    		'invoice_number'=>$this->generateRandomString(15),
    		'tracking_number'=>'-',
        'created_at' =>date('Y-m-d H:i:s'),
        'updated_at' =>date('Y-m-d H:i:s'),
    	];
    	$id = transaction::insertGetId($data);
    	return $id;
  } 

  private function generateRandomString($length = 10)  // function untuk create invoice number secara random
  {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

  public function GetStok() //query mengambil semua stok
  {
    return transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')->orderBy('created_at','DESC')->get();
  }

  function stokkeluar() // Query total stok keluar per item
  {
     $data = transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')
            ->join('transactions','transaction_details.transaction_id','=','transactions.id')
            ->join('transaction_statuses' ,'transactions.transaction_status_id','=','transaction_statuses.id')
            ->join('produks', 'transaction_details.id_produk','=','produks.id')
            ->Where('transaction_statuses.id',2)
            ->get();
    return $data;
  }

  function stokmasuk() // Query total stok masuk per item
  {
    $data = transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')
            ->join('transactions','transaction_details.transaction_id','=','transactions.id')
            ->join('transaction_statuses' ,'transactions.transaction_status_id','=','transaction_statuses.id')
            ->join('produks', 'transaction_details.id_produk','=','produks.id')
            ->Where('transaction_statuses.id',1)
            ->get();
    return $data;
  }


  // function totstok()
  // {
  //      //SELECT *,SUM(qty) FROM transaction_details LEFT JOIN transactions ON transaction_details.transaction_id=transactions.id LEFT JOIN transaction_statuses ON transactions.transaction_status_id=transaction_statuses.id WHERE transaction_statuses.id=2
  //     // SELECT *,SUM(qty) FROM transaction_details LEFT JOIN transactions ON transaction_details.transaction_id=transactions.id LEFT JOIN transaction_statuses ON transactions.transaction_status_id=transaction_statuses.id LEFT JOIN produks ON transaction_details.id_produk=produks.id WHERE transaction_statuses.id=2 AND produks.kode='A001'
  //     $data = transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')
  //           ->join('transactions','transaction_details.transaction_id','=','transactions.id')
  //           ->join('transaction_statuses' ,'transactions.transaction_status_id','=','transaction_statuses.id')
  //           ->join('produks', 'transaction_details.id_produk','=','produks.id')
  //           ->Where('transaction_statuses.id',2)
  //           ->select('id_produk',\DB::raw('sum(qty) as stok'))
  //           ->groupby('id_produk')
  //           ->get();        
  //  return $data;
  // }
  // function purchase()
  // {
  //      $data = transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')
  //           ->join('transactions','transaction_details.transaction_id','=','transactions.id')
  //           ->join('transaction_statuses' ,'transactions.transaction_status_id','=','transaction_statuses.id')
  //           ->join('produks', 'transaction_details.id_produk','=','produks.id')
  //           ->Where('transaction_statuses.id',1 )
  //           ->select('id_produk')
  //           ->groupby('id_produk')

  //           ->get();         
  //  return $data;
  // }

  //  public function hitungstok()
  // { 
  //   $data = transaction_detail::with('produks')->with('produks.kategoris')->with('transaction.transaction_status')
  //           ->join('transactions','transaction_details.transaction_id','=','transactions.id')
  //           ->join('transaction_statuses' ,'transactions.transaction_status_id','=','transaction_statuses.id')
  //           ->join('produks', 'transaction_details.id_produk','=','produks.id')
  //           ->Where('transaction_statuses.id',1)
  //           ->set('$masuk-$keluar')
  //           ->select('id_produk',\DB::RAW('sum(qty) as masuk'))
  //           ->groupby('id_produk')
  //           ->get();
  //         return $data;   
  // }

}