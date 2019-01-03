<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->integer('id_kategori')->unsigned()->change();
            $table->foreign('id_kategori')->references('id')->on('kategoris')
                ->onUpdate('cascade')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropForeign('producks_id_kategori_foreign');
        });
         Schema::table('produks', function(Blueprint $table) {
        $table->dropIndex('products_id_kategori_foreign');
    });
          Schema::table('produks', function(Blueprint $table) {
        $table->integer('id_kategori')->change();
    });
    }
}
