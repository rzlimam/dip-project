<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSatuanBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuan_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_satuan')->unique();
            $table->string('nama_satuan');
            $table->boolean('isActive');
            $table->string('deletedBy')->nullable();
            $table->timestamp('deletedAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satuan_barang');
    }
}
