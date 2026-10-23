<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_barang_masuk');
            $table->foreignId('barang_id')->constrained('barang', 'id_barang');
            //constrained disini fungsinya ituu untuk bikin relasi + meringkas kode, hehe 
            $table->integer('stok_masuk');
            $table->dateTime('tanggal_masuk');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
