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
        Schema::create('penyesuaian', function (Blueprint $table) {
            $table->id('id_penyesuaian');
            $table->foreignId('barang_id')->constrained('barang', 'id_barang');
            $table->enum('penyesuaian', ['penambahan', 'pengurangan']);
            $table->integer('stok_penyesuaian');
            $table->dateTime('tanggal_penyesuaian');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->text('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyesuaian');
    }
};
