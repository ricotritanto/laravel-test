<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // $table->integer('transaction_status_id')->unsigned()->change();
            $table->foreign('transaction_status_id')->references('id')->on('transaction_statuses')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('transactions', function (Blueprint $table) {
        //     $table->dropForeign('transactions_transaction_status_id_foreign');
        // });
        // Schema::table('transactions', function(Blueprint $table) {
        //     $table->dropIndex('transactions_transaction_status_id_foreign');
        // });
        // Schema::table('transactions', function(Blueprint $table) {
        //     $table->integer('transaction_status_id')->change();
        // });
    }
}
