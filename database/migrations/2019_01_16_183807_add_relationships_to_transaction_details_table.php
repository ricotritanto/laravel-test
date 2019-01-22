<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {               
            // $table->integer('id_produk')->unsigned()->change();
            $table->foreign('id_produk')->references('id')->on('produks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->integer('transaction_id')->unsigned()->change();
            $table->foreign('transaction_id')->references('id')->on('transactions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        // Schema::table('transaction_details', function(Blueprint $table){
        //     $table->dropForeign('transaction_details_id_produk_foreign');
        // });
        // Schema::table('transaction_details', function(Blueprint $table){
        //     $table->dropIndex('transaction_details_id_produk_foreign');
        // });
        // Schema::table('transaction_details', function(Blueprint $table){
        //     $table->integer('id_produk')->change();
        // });

        // Schema::table('transaction_details', function(Blueprint $table){
        //     $table->dropForeign('transactions_transaction_id_foreign');
        // });
        // Schema::table('transaction_details', function(Blueprint $table){
        //     $table->dropIndex('transactions_transaction_id_foreign');
        // });
        // Schema::table('transaction_details', function(Blueprint $table){
        //     $table->integer('transaction_id')->change();
        // });
    }
}

 // SQLSTATE[42S21]: Column already exists: 1060 Duplicate column name 'transaction_id' (SQL: alter table `transaction_details` add `transaction_id` int unsigned not null)